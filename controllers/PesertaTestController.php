<?php

namespace app\controllers;

use Yii;
use app\models\PesertaTest;
use app\models\Users;
use app\models\PesertaTestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\Helper;

/**
 * PesertaTestController implements the CRUD actions for PesertaTest model.
 */
class PesertaTestController extends Controller
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
     * Lists all PesertaTest models.
     * @return mixed
     */
    public function actionIndex($idUjian)
    {
        $searchModel = new PesertaTestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['id_ujian' => $idUjian]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idUjian' => $idUjian
        ]);
    }

    /**
     * Displays a single PesertaTest model.
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
     * Creates a new PesertaTest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idUjian)
    {
        $model = new PesertaTest();

        if ($model->load(Yii::$app->request->post())) {
            $user = Users::findByEmail($model->email);
            // die(var_dump($user));
            if(null == $user){
                $user = new Users();
                $user->email = $model->email;
                $user->save();
                $user->refresh();
            }
            $model->password = Helper::makePassword(date("Y-m-d H:i:s"));
            $model->id_user = $user->id;
            $model->token = Helper::makeTokenUjian($model->password);
            $model->statusUjian = $PesertaTest::STATUS_UJIAN_NOT_STARTED;
            if($model->save()){
                return $this->redirect(['index', 'idUjian' => $model->id_ujian]);
            }
        }

        $model->id_ujian = $idUjian;
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PesertaTest model.
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
     * Deletes an existing PesertaTest model.
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
     * Finds the PesertaTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PesertaTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PesertaTest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
