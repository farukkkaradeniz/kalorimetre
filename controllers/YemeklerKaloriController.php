<?php

namespace farukkkaradeniz\kalorimetre\controllers;

use Yii;
use farukkkaradeniz\kalorimetre\models\Yemekler;
use farukkkaradeniz\kalorimetre\models\YemeklerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use farukkkaradeniz\kalorimetre\models\Kaloritable;

/**
 * YemeklerKaloriController implements the CRUD actions for Yemekler model.
 */
class YemeklerKaloriController extends Controller
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
     * Lists all Yemekler models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YemeklerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Yemekler model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Yemekler model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Yemekler();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Yemekler model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Yemekler model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($ogun){
        
        $countOguns = Yemekler::find()->where(['ogunid'=>$ogun])->count();
        $oguns = Yemekler::find()->where(['ogunid'=>$ogun])->all();
        if($countOguns > 0){
            foreach ($oguns as $meal){
                echo "<option value='".$meal->yemekName."'>".$meal->yemekName."</option>";
            }
        }else
            echo "<option>-</option>";
    }

    public function actionKalori($yemekName){
        
        $countOguns = Yemekler::find()->where(['yemekName'=>$yemekName])->count();
        $oguns = Yemekler::find()->where(['yemekName'=>$yemekName])->one();
        if($countOguns > 0){
                echo "<option value='".$oguns->kalori."'>".$oguns->kalori."</option>";
        }else
            echo "<option>-</option>";
    }
    
     public function actionSabah(){
        
       $name=Yii::$app->user->identity->username;
        $oguns =Yii::$app->db->createCommand("SELECT SUM(kalori) FROM `kaloritable` WHERE Tarih=CURDATE() AND meal='sabah' AND userid='$name'")->queryOne();
       foreach($oguns as $result) {
        //echo "<option value='".$result."'>".$result."</option>";
                return $result;

    }
    } 
    
   public function actionOgle(){
        $name=Yii::$app->user->identity->username;
        $oguns =Yii::$app->db->createCommand("SELECT SUM(kalori) FROM `kaloritable` WHERE Tarih=CURDATE() AND meal='öğle' AND userid='$name'")->queryOne();
       foreach($oguns as $result) {
        //echo "<option value='".$result."'>".$result."</option>";
                return $result;

}
   }


    public function actionAksam(){
       // $oguns=0;
        $name=Yii::$app->user->identity->username;
        $oguns =Yii::$app->db->createCommand("SELECT SUM(kalori) FROM `kaloritable` WHERE Tarih=CURDATE() AND meal='akşam' AND userid='$name'")->queryOne();
       foreach($oguns as $result) {
        //echo "<option value='".$result."'>".$result."</option>";
        return $result;
}
}


    /**
     * Finds the Yemekler model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Yemekler the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Yemekler::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
