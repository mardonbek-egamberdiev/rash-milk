<?php

use common\models\Vacancies;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\VacanciesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Vakansiyalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-index">



    <p>
        <?= Html::a(Yii::t('app', 'Vakansiya yaratish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => ['class' => 'table table-bordered table-striped table-hover align-middle shadow-sm'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        

        [
            'attribute' => 'title_uz',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::tag('span', Html::encode(\yii\helpers\StringHelper::truncate($model->title_uz, 50)));
            },
        ],
        // [
        //     'attribute' => 'title_ru',
        //     'format' => 'raw',
        //     'value' => function ($model) {
        //         return Html::tag('span', Html::encode(\yii\helpers\StringHelper::truncate($model->title_ru, 50)));
        //     },
        // ],
        [
            'attribute' => 'content_uz',
            'format' => 'raw',
            'value' => function ($model) {
                return "<pre style='width: 650px;'>". $model->content_uz."</pre>";
            },
        ],

        [
            'attribute' => 'status',
            'format' => 'raw',
            'filter' => [1 => 'Active', 0 => 'Inactive'],
            'value' => function ($model) {
                return $model->status
                    ? Html::tag('span', 'Active', ['class' => 'badge bg-success'])
                    : Html::tag('span', 'Inactive', ['class' => 'badge bg-danger']);
            },
            'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
        ],

        [
            'attribute' => 'sort_order',
            'contentOptions' => ['class' => 'text-center', 'style' => 'width:100px;'],
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            
        ],
    ],
]); ?>



</div>
