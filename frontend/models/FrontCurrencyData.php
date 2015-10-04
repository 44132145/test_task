<?php
namespace frontend\models;

use common\models\CurrencyData;
use yii;
use yii\validators\DateValidator;

class FrontCurrencyData extends CurrencyData
{
    /*
     * Get gata from currency table and return as Array
     * */
    public function getData($date = null)
    {
        $dateValidator = new DateValidator();
        $dateValidator->format = Yii::$app->params['DateFormat'];

        $getDT = CurrencyData::find()->select(['letter_code','currencyRU','currencyUA']);
        if (($date !== null) && (!empty($date)) && $dateValidator->validate($date))
            $getDT->where(['source_date' => Yii::$app->formatter->asDate($date, Yii::$app->params['DbFormat'])]);

        $allDataArr = $getDT->asArray()->all();

        if ((empty($allDataArr)) && ($date !== null) && (!empty($date))){
            return [];
        }

        return $allDataArr; #return array[data] || empty array[]
    }
}
?>