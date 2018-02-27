<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\auth\Auth;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Auth::behaviors([
            'deny' => function ($rule, $action) {
                $this->redirect(['site/login']);
            },
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = Auth::getRole();
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = Auth::getRole();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = Auth::getRole();
        $model = new User();

        $data = Yii::$app->request->post();
        $model->foto = UploadedFile::getInstance($model, 'foto');
        if ($model->foto != NULL) $data['User']['foto'] = $model->foto;
        $model->tanggal_pendaftaran = date('Y-m-d H:i:s');
        if ($model->load($data) && $model->save()) {
            $model->foto->saveAs(Yii::$app->basePath . "/web/foto/" . $model->foto->name);
            return $this->redirect([
                'view', 'id' => $model->userID,
            ]);
        }
        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $this->layout = Auth::getRole();
        $model = $this->findModel($id);
        $data = Yii::$app->request->post();
        $model->foto = UploadedFile::getInstance($model, 'foto');
        if ($model->foto != null) {
            $data['User']['foto'] = $model->foto;
        }
//        echo '<pre>';
//        print_r($data);
//        die();
        if ($model->load($data)) {
            if ($data['User']['foto'] != "") {
                $model->foto->saveAs(Yii::$app->basePath . "/web/foto/" .
                    $model->foto->name);
                $model->save();

            }

            return $this->redirect([
                'view',
                'id' => $model->userID,
            ]);
        }
        $model = $this->findModel($id);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = "admin";
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
