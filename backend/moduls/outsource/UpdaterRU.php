<?php
namespace backend\moduls\outsource;

use backend\moduls\outsource\common\ModulesInterface;
use backend\moduls\outsource\common\outsourceModule;


class UpdaterRU extends outsourceModule implements ModulesInterface
{
    private $type = 'RU';

    public function ParseResponseError($XMLstr = false)
    {
        /** some problem with xml and XmlParser cant parse response 2 array
         * it s function for alternative Parser for this submodule
         */
        die ('all good');
        return false;
    }

    public function getSimpleArray($allArray = false)
    {
        if ($allArray === false)
            $this->OutDataArray = (isset($this->OutDataArray['Valute']))? $this->OutDataArray['Valute']: [];
        else
            $this->OutDataArray = (isset($allArray['Valute']))? $allArray['Valute']: [];

        return $this->OutDataArray;
    }

    public function AddUpdateData($dataArray = [])
    {
        if(empty($dataArray))
            $dataArray = $this->OutDataArray;

        if ($this->GetLastError() === false){
            for($i = 0; $i<count($dataArray); $i++)
            {
                if (!empty($dataArray[$i])){
                    parent::AddUpdateData([
                        'digital_code' => intval($dataArray[$i]['NumCode']),
                        'letter_code' => $dataArray[$i]['CharCode'],
                        'currencyRU' =>  (floatval($dataArray[$i]['Value'])/floatval($dataArray[$i]['Nominal'])),
                        'currency_name_RU' => $dataArray[$i]['Name']
                    ]);
                }
            }
        }
        else
            return false;
    }

    public function GetUpdaterType()
    {
        return $this->type;
    }
}
?>