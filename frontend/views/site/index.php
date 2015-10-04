<?php
use common\widgets\Wcalendar\calendar;
use yii\grid\GridView;
?>

<?=calendar::widget();?>

<?php
if (!empty($currData))
    print   GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $currData,
            'pagination' => [
                'pageSize' => 50,
            ],
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   'attribute' => 'letter_code',   'label' => Yii::t('app', 'letter_code')],
            [   'attribute' => 'currencyRU',
                'label' => Yii::t('app', 'currencyRU'),
                'value' => function ($data) { return number_format(round($data['currencyRU'], 4),4,',','');},
            ],
            [   'attribute' => 'currencyUA',
                'label' => Yii::t('app', 'currencyUA'),
                'value' => function ($data) { return number_format(round($data['currencyUA'], 4),4,',','');},
            ],
        ],
    ]);
else
    print "<h3>".Yii::t('app', 'No currency data')."</h3>";
?>

