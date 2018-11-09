<?php

namespace wscvua\faq\controllers;

use wscvua\faq\Module;
use wscvua\faq\models\Faq;
use wscvua\faq\controllers\SearchFaqController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $langs = $this->getLanguages();

        $dataProviders = [];
        foreach ($langs as $lang){
            $dataProviders[$lang] = new ActiveDataProvider([
                'query' => Faq::find()
                    ->where(['lang' => $lang])
                    ->orderBy('position')
            ]);
        }

        return $this->render('index', [
            'dataProviders' => $dataProviders,
            'languages' => $langs
        ]);
    }

    /**
     * Displays a single Faq model.
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
     * Creates a new Faq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($lang)
    {
        $langs = $this->getLanguages();
        if (!in_array($lang, $langs)){
            throw new HttpException(400, 'Lang is undefined');
        }

        $model = new Faq([
            'lang' => $lang,
            'active' => 1
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Faq model.
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
     * Deletes an existing Faq model.
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
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faq::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getLanguages()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('faq');
        if ($module){
            return $module->languages;
        }
        return [];
    }

    public function actionUp($id)
    {
        $modelCurrent = $this->findModel($id);

        $modelSecond = Faq::find()
            ->where(['position' => $modelCurrent->position - 1])
            ->one();

        if ($modelSecond){
            $modelCurrent->position--;
            $modelCurrent->save();

            $modelSecond->position++;
            $modelSecond->save();
        }

        return $this->redirect(['index']);
    }

    public function actionDown($id)
    {
        $modelCurrent = $this->findModel($id);

        $modelSecond = Faq::find()
            ->where(['position' => $modelCurrent->position + 1])
            ->one();

        if ($modelSecond){
            $modelCurrent->position++;
            $modelCurrent->save();

            $modelSecond->position--;
            $modelSecond->save();
        }

        return $this->redirect(['index']);
    }
}
