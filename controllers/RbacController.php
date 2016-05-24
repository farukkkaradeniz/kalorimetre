<?php

namespace farukkkaradeniz\kalorimetre\controllers;

use Yii;
use farukkkaradeniz\kalorimetre\models\AuthItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionAssigment() {
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    public function actionCreate_role() {

        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $index = $auth->createPermission('admin/yemekler/index');
        // add "updatePost" permission
        $create = $auth->createPermission('admin/yemekler/create');
        $view = $auth->createPermission('admin/yemekler/view');
        $update = $auth->createPermission('admin/yemekler/update');
        $delete = $auth->createPermission('admin/yemekler/delete');
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $index);
        $auth->addChild($author, $create);
        $auth->addChild($author, $view);
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $delete);
    }

    public function actionCreate_permission() {

        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $index = $auth->createPermission('admin/yemekler/index');
        $index->description = 'Create a index';
        $auth->add($index);

        // add "updatePost" permission
        $create = $auth->createPermission('admin/yemekler/create');
        $create->description = 'create post';
        $auth->add($create);

        $view = $auth->createPermission('admin/yemekler/view');
        $view->description = 'view post';
        $auth->add($view);

        $update = $auth->createPermission('admin/yemekler/update');
        $update->description = 'Update post';
        $auth->add($update);



        $delete = $auth->createPermission('admin/yemekler/delete');
        $delete->description = 'delete post';
        $auth->add($delete);
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
