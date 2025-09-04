<?php

namespace app\controllers;

use app\models\Produto;
use app\models\ProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        $this->layout = 'adm'; // Set the layout for this controller

        if (\Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);
        }
        
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param int $pro_id Pro ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pro_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pro_id),
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Produto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                $model->foto = UploadedFile::getInstances($model, 'foto');
                $model->upload(); // Call the upload method to handle file saving
                
                return $this->redirect(['view', 'pro_id' => $model->pro_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pro_id Pro ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pro_id)
    {
        $model = $this->findModel($pro_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
echo "<pre>";
           
                $model->foto = UploadedFile::getInstances($model, 'foto');
                 var_dump($model); die;
                $model->upload(); // Call the upload method to handle file saving
            return $this->redirect(['view', 'pro_id' => $model->pro_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pro_id Pro ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pro_id)
    {
        $this->findModel($pro_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pro_id Pro ID
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pro_id)
    {
        if (($model = Produto::findOne(['pro_id' => $pro_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
