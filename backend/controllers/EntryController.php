<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class EntryController extends Controller
{
    /**
     * @inheritdoc
     */
    public  $defaultAction = 'index';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','login2'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','login2'],
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
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('sys/dashboard');
        }
        $model = new LoginForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            if(!$model->validate())
            {
                foreach($model->getErrors() as $errors)
                {
                    foreach($errors as $error)
                    {
                        return [
                            'msg'=>$error,
                            'status'=>1
                        ];
                    }
                }
            }else{
                $model->login();
                return [
                    'msg' => '登陆成功',
                    'status' => 0
                ];
            }
        }
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
