<?php
namespace backend\moduls\outsource\common;

use yii;
use backend\models\CurrSource;
use backend\moduls\outsource\common\AbstractModule;
use yii\validators\UrlValidator;
use light\yii2\XmlParser;

use common\models\CurrencyData;

class outsourceModule extends AbstractModule
{
    private $UserDate = null;
    private $InputDate = null;
    private $outURL = null;
    private $outData = null;
    private $dbConnection = null;

    protected $OutSourceCNF = [
                                'URL' => false,
                                'DateMask' => '',
                ];

    protected $OutDataArray = [];
    protected $errorArray   = [];

    public function __construct($date = null)
    {
        $this->init($date);

        if (($this->GetLastError() === false) && (($outData = $this->GetOutXMLData()) !== false))
            $outData = $this->ParseResponse($outData);

        if ($outData === false)
            $this->SetError(105, "Error XML response data!!!");
    }

    public function init($date = null)
    {
        $this->SetOutSourceConfig($this->GetUpdaterType());

        $this->SetUserDate($date);

        $this->PrepareUrl();

        $this->dbConnection = Yii::$app->db;
    }

    protected function SetOutSourceConfig($initType = false)
    {
        if ($initType !== false){
            $CSobj = CurrSource::find();
            $confArr = $CSobj->where(['cs_code' => $initType])->asArray()->one();

            if (!empty($confArr)){
                $this->OutSourceCNF['URL'] = $confArr['cs_url'];
                $this->OutSourceCNF['DateMask'] = $confArr['cs_DateMask'];

                unset ($confArr);
                return true;
            }
            else
                $this->SetError( 101, 'Undefined config');
        }
        else
            $this->SetError( 100, 'Undefined type');

        return false;
    }

    protected function GetOutXMLData($ReturnAsArray = true)
    {
        if ($this->outURL !== null){
            $this->outData = file_get_contents($this->outURL);
            if (($this->outData !== null) && ($this->outData !== false) && (!empty($this->outData))){
                if (!$ReturnAsArray)
                    return  $this->outData;
                elseif ($this->XML2Array())
                        return $this->getSimpleArray($this->OutDataArray);
                    else{
                        $this->SetError(104, 'Cant parse XML to array');
                        return $this->outData;
                    }
            }
            else
                $this->SetError(103, 'Undefined out data');
        }
        else
            $this->SetError(102, 'Cant send request, outURL is null');

        return false;
    }

    protected function ParseResponse($XMLstr = false)
    {
        if (is_array($XMLstr))
            return $this->OutDataArray;
        else
            $this->ParseResponseError($XMLstr);
    }

    protected function PrepareUrl($URLstr = false, $mask = false, $date = null)
    {
        $urlValidator = new UrlValidator();

        if (!$urlValidator->validate($URLstr))
            $URLstr = $this->OutSourceCNF['URL'];

        if ($mask === false)
            $mask = $this->OutSourceCNF['DateMask'];

        if ($date === null)
            $date = $this->UserDate;

        $this->outURL = str_replace($mask, $date, $URLstr);

        return true;
    }

    protected function XML2Array()
    {
        $XML = new XmlParser();

        try{
            $this->OutDataArray = $XML->parse($this->outData,'');
            return true;
        }catch (\Exception $e) {
            return false;
        }
    }

    protected function SetUserDate($date = null)
    {

        if (($date === null) || (empty($date)))
            $date = date(Yii::$app->params['PHPDateFormat']);
        $this->InputDate = $date;

        $this->UserDate = Yii::$app->formatter->asDate($date, $this->Mask2FormatterStandart($this->OutSourceCNF['DateMask']));

        return true;
    }

    protected function AddUpdateData($data4add = false)
    {
        if ($data4add === false)
            return false;

        if (($id = $this->CheckData($data4add['digital_code'])) === true)
            $this->dbConnection->createCommand()->insert('currency', array_merge($data4add,['source_date' => Yii::$app->formatter->asDate($this->InputDate, Yii::$app->params['DbFormat'])]))->execute();
        else{
            unset($data4add['digital_code'], $data4add['letter_code']);
            $this->dbConnection->createCommand()->update('currency', $data4add, ['id' => $id])->execute();
        }
    }

    /** true - insert  false - update */
    private function CheckData($code)
    {
        $chDATA = CurrencyData::find()->where([
            'digital_code' => $code,
            'source_date' => Yii::$app->formatter->asDate($this->InputDate, Yii::$app->params['DbFormat'])
        ])->asArray()->one();

        if (empty($chDATA))
            return true;
        else
            return $chDATA['id'];
    }

    protected function SetError($code = null, $text = '')
    {
        /** hear can bee require logs writer */

        if (($code === null) || (!preg_match('/[\w]{+}/im', $text)))
            $this->errorArray = array_merge($this->errorArray, $this->defaultError);
        else
            $this->errorArray = array_merge($this->errorArray, [$code => $text]);
    }

    protected function GetLastError()
    {
        if (empty($this->errorArray))
            return false;
        else
            return each($this->errorArray);
    }
    /** formatter not understand mm as month must be MM */
    private function Mask2FormatterStandart($mask)
    {
        $mask = str_replace(Yii::$app->params[__FUNCTION__]['needle'], Yii::$app->params[__FUNCTION__]['replace'], $mask);
        return $mask;
    }

    public function __destruct()
    {
        $this->dbConnection->createCommand(Yii::$app->params['currDiffUpdate'])->execute();
    }
}
?>