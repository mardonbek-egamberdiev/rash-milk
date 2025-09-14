<?php

use common\models\Products;
use common\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Mahsulotlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">


    <p>
        <?= Html::a(Yii::t('app', 'Mahsulot qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <style>
        .product-thumb {
            width: 100px;
            height: 100px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .product-thumb:hover {
            transform: scale(2.5);
            z-index: 9999;
            position: relative;
        }
    </style>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // IMAGE ustuni
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {
                    $frontendBase = Yii::getAlias('@frontendUrl'); // aliasni ishlatamiz
                    if ($model->image && file_exists(Yii::getAlias('@frontend/web/products/' . $model->image))) {
                        $imgUrl = $frontendBase . '/products/' . $model->image;
                        return Html::img($imgUrl, ['class' => 'product-thumb']);
                    }
                    return Html::tag('span', Yii::t('app', 'No image'), ['class' => 'text-muted']);
                },
                'contentOptions' => ['style' => 'text-align:center; width:120px;'],
            ],

            // CATEGORY nomi
            [
                'attribute' => 'category_id',
                'label' => Yii::t('app', 'Category'),
                'value' => function ($model) {
                    return $model->category ? $model->category->name_uz : null;
                },
                'filter' => ArrayHelper::map(Categories::find()->all(), 'id', 'name_uz'),
            ],

            'name_uz',
            'name_ru',
            'name_en',
            //'sort_order',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge bg-success">'.Yii::t('app', 'Sotuvda').'</span>';
                    } else {
                        return '<span class="badge bg-danger">'.Yii::t('app', 'Sotuvda emas').'</span>';
                    }
                },
                'contentOptions' => ['class' => 'text-center'],
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
