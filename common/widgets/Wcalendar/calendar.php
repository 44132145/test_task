<?php
namespace common\widgets\Wcalendar;

use yii\base\Widget;
use common\models\DateForm;
use Yii;

class calendar extends Widget
{
    public function run()
    {
        $dtForm = new DateForm;
        $dtForm->load(Yii::$app->request->post());

        return $this->render('vcalendar',[
                                            'model' => $dtForm,
                                            'date'  => (!empty($dtForm->startdate)? $dtForm->startdate: date('d-m-Y')),
                                        ]);
    }
}
?>