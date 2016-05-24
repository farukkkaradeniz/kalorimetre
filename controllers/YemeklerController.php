<?php

namespace farukkkaradeniz\kalorimetre\controllers;

use Yii;
use farukkkaradeniz\kalorimetre\models\KaloriTable;
use farukkkaradeniz\kalorimetre\models\KaloriTableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YemeklerController implements the CRUD actions for KaloriTable model.
 */
class YemeklerController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors['access'] = [
        'class' => \yii\filters\AccessControl::className(),
        'rules' => [
        [
        'allow' => true,
        'roles' => ['@'],
        'matchCallback' => function ($rule, $action){
        $module = Yii::$app->controller->module->id;
        $action = Yii::$app->controller->action->id;
        $controller = Yii::$app->controller->id;
        $route = "$module/$controller/$action";
        $post = Yii::$app->request->post();
        if(\Yii::$app->user->can($route))
            return true;
        }
        ],
        ],
        ];

return $behaviors;
/*
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];*/
    }

    /**
     * Lists all KaloriTable models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new KaloriTableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KaloriTable model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KaloriTable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new KaloriTable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KaloriTable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KaloriTable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KaloriTable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KaloriTable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = KaloriTable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
