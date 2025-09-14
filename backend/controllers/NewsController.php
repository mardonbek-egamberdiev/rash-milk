<?php

namespace backend\controllers;
use Yii;
use common\models\News;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
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
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile) {
                $fileName = time() . '_' . uniqid() . '.' . $model->imageFile->extension;
                $path = Yii::getAlias('@frontend/web/news/' . $fileName);

                if ($model->imageFile->saveAs($path)) {
                    $model->image = $fileName;
                }
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Yangilik muvaffaqiyatli qo‘shildi!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = News::findOne($id);
        $oldImage = $model->image; // eski rasm nomini saqlab olamiz

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile) {
                // Eski rasmni o‘chirish
                if ($oldImage && file_exists(Yii::getAlias('@frontend/web/news/' . $oldImage))) {
                    unlink(Yii::getAlias('@frontend/web/news/' . $oldImage));
                }

                // Yangi rasmni yuklash
                $fileName = time() . '_' . uniqid() . '.' . $model->imageFile->extension;
                $path = Yii::getAlias('@frontend/web/news/' . $fileName);

                if ($model->imageFile->saveAs($path)) {
                    $model->image = $fileName;
                }
            } else {
                // Rasm yuklanmasa, eski rasmni saqlab qolamiz
                $model->image = $oldImage;
            }

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Yangilik muvaffaqiyatli yangilandi!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
