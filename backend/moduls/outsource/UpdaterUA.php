<?php
namespace backend\moduls\outsource;

use backend\moduls\outsource\common\ModulesInterface;
use backend\moduls\outsource\common\outsourceModule;

class UpdaterUA extends outsourceModule implements ModulesInterface
{
    private $type = 'UA';

    public function ParseResponseError($XMLstr = false)
    {
        /** some problem with xml and XmlParser cant parse response 2 array
         * it s function for alternative Parser for this submodule
         */
        return false;
    }

    public function getSimpleArray($allArray = false)
    {
        if ($allArray === false)
            $this->OutDataArray = (isset($this->OutDataArray['currency']))? $this->OutDataArray['currency']: [];
        else
            $this->OutDataArray = (isset($allArray['currency']))? $allArray['currency']: [];

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
                        'digital_code' => intval($dataArray[$i]['digital_code']),
                        'letter_code' => $dataArray[$i]['letter_code'],
                        'currencyUA' =>  (floatval($dataArray[$i]['exchange_rate'])/floatval($dataArray[$i]['number_of_units'])),
                        'currency_name_UA' => $dataArray[$i]['сurrency_name']
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