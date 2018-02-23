<?php

namespace app\controllers;

use Yii;
use app\models\Ujian;
use app\models\UjianSearch;
use app\models\PesertaTest;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * UjianController implements the CRUD actions for Ujian model.
 */
class UjianController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ujian models.
     * @return mixed
     */
    public function actionIndex()
    {
        // throw new ForbiddenHttpException('Waktu Habis');
        $searchModel = new UjianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ujian model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ujian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ujian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ujian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ujian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ujian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ujian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ujian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionStart($token)
    {
        $peserta = PesertaTest::find()->where(['email' => Yii::$app->user->identity->email, 'token' => $token])->one();
            if(null == $peserta){
                throw new NotFoundHttpException("Test Not found");
            }


            switch ($peserta->statusUjian) {

                case PesertaTest::STATUS_UJIAN_NOT_STARTED:
                    // $cookies  = Yii::$app->response->cookies;
                    // $namaCookieUjian = 'ujian' . $peserta->token;
                    // $cookies->add(new \yii\web\Cookie([
                    //     $namaCookieUjian => 0,
                    // ]));
                    // $peserta->statusUjian = PesertaTest::STATUS_UJIAN_INSTRUKSI;
                    // $peserta->save();
                    return $this->redirect(['instruksi', 'token' => $token]);
                    break;

                case PesertaTest::STATUS_UJIAN_INSTRUKSI:
                    return $this->redirect(['instruksi', 'token' => $token]);

                case PesertaTest::STATUS_UJIAN_ON_GOING:
                    return $this->redirect(['exam', 'token' => $token]);

                default:
                    return $this->redirect(['instruksi', 'token' => $token]);
                    break;
            }
    }

    public function actionInstruksi($token)
    {
        $user = Yii::$app->user->identity;
        $peserta = PesertaTest::findByIdUserToken($user->id, $token);
        $ujian = Ujian::findOne($peserta->id_ujian);
        return $this->render('instruksi', ['ujian' => $ujian, 'token' => $token]);
        // TODO check minute cookie

        $peserta = PesertaTest::find()->where(['email' => $user->email, 'token' => $token])->one();
        if( (60*3) > $cookie->get($namaCookieUjian) ) {
            return $this->redirect(['exam', 'token' => $token]);
            if(null == $ujian){
                throw new NotFoundHttpException("Test tidak ditemukan", 1);
            }
            
        }
    }

    public function actionExam($token)
    {
        // TODO check minute cookie
        $user = Yii::$app->user->identity;
        $peserta = PesertaTest::findByIdUserToken($user->id, $token);
        $ujian = Ujian::findOne($peserta->id_ujian); 
        // echo "<pre>";
        // print_r($ujian->soalUjians);
        // echo "</pre>";
        // die();
        return $this->render('exam', ['soalUjian' => $ujian->soalUjians]);
        $peserta = PesertaTest::find()->where(['email' => Yii::$app->user->identity->email, 'token' => $token])->one();
        if((60 * $ujian->durasi_test) < $cookies->get($namaCookieUjian)){

        }

    }
}
