<?php
use common\widgets\Wcalendar\calendar;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = Yii::t('backend', 'Admin Index');
?>

<div class="site-index">

    <?= calendar::widget();?>

    <?
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
                            [   'attribute' => 'digital_code',
                                'label' => Yii::t('backend', 'digital_code'),
                                'value' => function ($data) { return sprintf('%03s', $data['digital_code']);},
                            ],
                            [   'attribute' => 'letter_code',   'label' => Yii::t('app', 'letter_code')],
                            [   'attribute' => 'currencyRU',
                                'label' => Yii::t('app', 'currencyRU'),
                                'value' => function ($data) { return number_format(round($data['currencyRU'], 4),4,',','');},
                            ],
                            [   'attribute' => 'currencyUA',
                                'label' => Yii::t('app', 'currencyUA'),
                                'value' => function ($data) { return number_format(round($data['currencyUA'], 4),4,',','');},
                            ],
                            [   'attribute' => 'currDiff',
                                'label' => Yii::t('backend', 'currDiff'),
                                'value' => function ($data) { return round($data['currDiff'], 4);},
                            ],
                            [   'attribute' => 'currency_name_RU',   'label' => Yii::t('backend', 'currency_name_RU')],
                            [   'attribute' => 'currency_name_UA',   'label' => Yii::t('backend', 'currency_name_UA')],
                            [   'attribute' => 'source_date',   'label' => Yii::t('backend', 'source_date')],

                        ],
                    ]);
        else
            print "<h3>".Yii::t('app', 'No currency data')."</h3>";
    ?>
</div>
