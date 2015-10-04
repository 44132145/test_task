<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use yii\filters\VerbFilter;
use common\models\LoginForm;

use yii\web\Response;
use common\models\DateForm;
use yii\widgets\ActiveForm;
use backend\models\BackCurrencyData;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'validate_date'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $dtForm = new DateForm;
        $dtForm->load(Yii::$app->request->post());

        $CurrData = new BackCurrencyData();

        return $this->render('index',[
                                        'model' => $dtForm,
                                        'date'  => (!empty($dtForm->startdate)? $dtForm->startdate: date('d-m-Y')),
                                        'currData' => $CurrData->getData($dtForm->startdate),
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionValidate_date()
    {
        if (Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $dtFobj = new DateForm();
            $dtFobj->load(Yii::$app->request->post());

            die(print json_encode(ActiveForm::validate($dtFobj)));
        }
        else
            return $this->goHome();
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
