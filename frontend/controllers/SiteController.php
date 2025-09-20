<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use common\models\Contact;
use common\models\News;
use common\models\Vacancies;
use common\models\Applicants;
use yii\web\UploadedFile;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $latestNews = News::find()
        ->where(['status' => 1 ])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(3)
        ->all();
        $categories = \common\models\Categories::find()
            ->where(['status' => 1 ])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        $products = \common\models\Products::find()
            ->where(['status' => 1 ])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        $partners = \common\models\Partners::find()
        ->where(['status' => 1])
        ->orderBy(['sort_order' => SORT_ASC])
        ->all();
        
        return $this->render('index', [
            'categories' => $categories,
            'products' => $products,
            'latestNews' => $latestNews,
            'partners' => $partners,
        ]);
    }


    
    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new \common\models\Contact();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->status = 0;
            if ($model->save()) {
                Yii::$app->session->setFlash('success',
                    'Murojaat qoldirganingiz uchun tashakkur. Murojaatingizni tez orada ko‘rib chiqamiz!');
                return $this->refresh();
            } else {
                Yii::error($model->errors, __METHOD__); // errorlarni logga yozib qo‘yish
            }
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $partners = \common\models\Partners::find()
        ->where(['status' => 1])
        ->orderBy(['sort_order' => SORT_ASC])
        ->all();
        return $this->render('about',[
            'partners' => $partners,
        ]);
    }

   
    
    public function actionNewsopen($id)
    {
        $news = News::find()->where(['id' => $id, 'status' => 1 ])->one();
        if ($news === null) {
            throw new \yii\web\NotFoundHttpException("Yangilik topilmadi.");
        }

        // Oxirgi yuklangan 6 ta post
        $recentPosts = News::find()
            ->where(['status' => 1 ])   
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(6)
            ->all();

        return $this->render('newsopen', [
            'news' => $news,
            'recentPosts' => $recentPosts,
        ]);
    }
    public function actionNews()
    {
        $news = \common\models\News::find()
            ->where(['status' => 1 ])  
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(24)
            ->all();

        return $this->render('news', [
            'news' => $news,
        ]);
    }
    public function actionProducts()
    { 
        $categories = \common\models\Categories::find()
            ->where(['status' => 1 ])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        $products = \common\models\Products::find()
            ->where(['status' => 1 ])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('products', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function actionProductDetail($id)
    {
        $product = \common\models\Products::findOne($id);

        if (!$product) {
            throw new \yii\web\NotFoundHttpException("Product not found");
        }

        // Shu kategoriyadagi boshqa mahsulotlarni olish (o‘zi kiritilgan mahsulotdan tashqari)
        $relatedProducts = \common\models\Products::find()
            ->where(['category_id' => $product->category_id])
            ->andWhere(['<>', 'id', $product->id])
            ->all();

        return $this->render('product_detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }


    public function actionVacancies()
    {
        $vacancies = Vacancies::find()->where(['status' => 1])->orderBy(['sort_order' => SORT_ASC])->all();

        $applicant = new Applicants();

        if ($applicant->load(Yii::$app->request->post())) {
            $applicant->created_at = time();
            $applicant->status = 0; // default holatda kutilmoqda

            $file = UploadedFile::getInstance($applicant, 'imageFile');
            if ($file) {
                $fileName = uniqid() . '.' . $file->extension;
                $uploadPath = Yii::getAlias('@frontend/web/applicants/') . $fileName;
                if ($file->saveAs($uploadPath)) {
                    $applicant->image = $fileName;
                }
            }

            if ($applicant->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Your application has been submitted!'));
                return $this->refresh();
            }
        }

        return $this->render('vacancies', [
            'vacancies' => $vacancies,
            'applicant' => $applicant,
        ]);
    }




}
