<?php
namespace backend\models;

use common\models\CurrencyData;
use yii;
use yii\validators\DateValidator;
use backend\moduls\outsource\FullUpdater;

class BackCurrencyData extends CurrencyData
{
    /*
     * Get gata from currency table and return as Array
     * */
    public function getData($date = null)
    {
        $dateValidator = new DateValidator();
        $dateValidator->format = Yii::$app->params['DateFormat'];

        $getDT = CurrencyData::find();
        if (($date !== null) && (!empty($date)) && $dateValidator->validate($date))
            $getDT->where(['source_date' => Yii::$app->formatter->asDate($date, Yii::$app->params['DbFormat'])]);

        $allDataArr = $getDT->asArray()->all();
        //new FullUpdater($date);
        if ((empty($allDataArr)) && ($date !== null) && (!empty($date))){
            new FullUpdater($date);// 'do update'
            return $this->getData($date);
        }

        return $allDataArr; #return array[data] || empty array[]
    }
}
?>