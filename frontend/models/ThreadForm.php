<?php
namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\validators\NumberValidator;
use yii\validators\RequiredValidato;

class ThreadForm extends Model
{
    public $number;

    public function rules()
    {
        return [['number', 'number', 'integerOnly' => TRUE, 'min' => '1', 'message' => Yii::t('app', 'more then zero')],
                ['number', 'required', 'message' => Yii::t('app', 'must bee not empty')],
        ];
    }

}
?>