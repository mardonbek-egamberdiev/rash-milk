<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'clear-cache' ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
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
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

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
    public function actionClearCache()
    {
        // Barcha kechani tozalaydi
        Yii::$app->cache->flush();

        // Runtime va assets papkalarini ham tozalash (ixtiyoriy)
        $runtimePath = Yii::getAlias('@app/runtime/cache');
        $assetsPath = Yii::getAlias('@webroot/assets');

        $this->removeDir($runtimePath);
        $this->removeDir($assetsPath);

        Yii::$app->session->setFlash('success', 'Kesh muvaffaqiyatli tozalandi ✅');
        return $this->redirect(Yii::$app->request->referrer ?: ['site/index']);
    }

    // Yordamchi metod (papkalarni tozalash uchun)
    private function removeDir($path)
    {
        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $fullPath = $path . DIRECTORY_SEPARATOR . $file;
                    if (is_dir($fullPath)) {
                        $this->removeDir($fullPath);
                    } else {
                        @unlink($fullPath);
                    }
                }
            }
        }
    }

}
