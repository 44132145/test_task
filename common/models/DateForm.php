<?php
namespace common\models;

use yii\base\Model;
use Yii;
use yii\validators\DateValidator;
use yii\validators\RequiredValidato;

class DateForm extends Model
{
    public $startdate = null;

    public function rules()
    {
        return [
                ['startdate', 'date', 'format' =>  Yii::$app->params['DateFormat'], 'message' => Yii::t('app', 'error data format')],//'max'=>date(Yii::$app->params['PHPDateFormat'],strtotime("+1 days")),
                ['startdate', 'required', 'message' => Yii::t('app', 'must bee not empty')],
        ];
    }

}
?>