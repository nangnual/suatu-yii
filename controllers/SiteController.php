<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PesertaTest;
use app\models\Users;
use yii\web\NotFoundHttpException;

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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if($model->load(Yii::$app->request->post())){
            $postValues = Yii::$app->request->post('LoginForm');
            $user = Users::findByEmail($postValues['email']);
            if(null != $user){
                $bolehLogin = $user->login($user, $postValues['password'], $user->isAdmin);
                if($bolehLogin){
                    Yii::$app->user->login($user, 3600*24*30);
                    if($user->isAdmin){
                        $this->redirect(['/ujian/index']);
                    }else{
                        // return "user bukanadmin login";
                        $peserta = PesertaTest::find()->where(['id_user' => $user->id, 'password' => $postValues['password']])->one();
                        $redirectLink = $peserta->getTestLink();
                        $this->redirect(['/ujian/start', 'token' => $peserta->token ]);
                    }
                }
            }
            // $model->addError('password', 'incorrect');
            $model->addError('password', 'combination incorrect');
        }

        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     // return $this->goBack();
        //     $loggedUser = Yii::$app->user->identity;
        //     if(!$loggedUser->isAdmin){
        //         $peserta = PesertaTest::find()->where(['email' => $loggedUser->email, 'password' => Yii::$app->request->post('LoginForm[password]')])->one();

        //         if(null != $peserta){
        //             if($peserta->)
        //         }

        //     }
        // }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
