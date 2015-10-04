<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div id="date_widget">
<?php
$form = ActiveForm::begin([
    'validationUrl' => Url::toRoute('site/validate_date'),
    'enableAjaxValidation' => true,
    'validateOnSubmit' => true,

    'layout' => 'horizontal'
]);
?>

<div class="form-group">
    <?
    print $form->field($model, 'startdate')->widget(DatePicker::className(),[
        'name' => 'start_date',
        'language' => Yii::$app->language,
        'readonly' => true,
        'removeButton' => false,

        'options' => [
            'value' => $date,
            'size'  => 10,
        ],

        'pluginOptions' => [
            'format' => Yii::$app->params['DateFormat'],
            'todayHighlight' => true,
        ]
    ])->label( Yii::t('app','startdate'));
    ?>


    <div id="submit_button">
        <?= Html::submitButton(Yii::t('app','submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<? ActiveForm::end();?>
</div>