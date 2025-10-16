<?php

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Yangiliklar');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .product-thumb {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }
</style>
<div class="news-index">

    <p>
        <?= Html::a(Yii::t('app', 'Yangilik qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {
                    $frontendBase = Yii::getAlias('@frontendUrl'); 
                    if ($model->image && file_exists(Yii::getAlias('@frontend/web/news/' . $model->image))) {
                        $imgUrl = $frontendBase . '.uz/news/' . $model->image;
                        return Html::img($imgUrl, [
                            'style' => 'width:80px; height:60px; object-fit:cover; border-radius:6px;'
                        ]);
                    }
                    return Html::tag('span', Yii::t('app', 'No image'), ['class' => 'text-muted']);
                },
                'contentOptions' => ['style' => 'text-align:center; width:120px;'],
            ],
            'title_uz',
            'subtitle_uz',

            
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('d.m.Y H:i', strtotime($model->created_at));
                },
                'filter' => false,
            ],

            'owner',

            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status == 1
                        ? '<span class="badge bg-success">Faol</span>'
                        : '<span class="badge bg-danger">Nofaol</span>';
                },
                'filter' => [1 => 'Faol', 0 => 'Nofaol'],
            ],

            [
                'class' => ActionColumn::class,
                'header' => 'Amallar',
                'contentOptions' => ['style' => 'width:120px; text-align:center;'],
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>



</div>
