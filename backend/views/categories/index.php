<?php

use common\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Kategoriyalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    

    <p>
        <?= Html::a(Yii::t('app', 'Kategoriya qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name_uz',
            'name_ru',
            'name_en',
            'tag_name',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge bg-success">'.Yii::t('app', 'Faol').'</span>';
                    } else {
                        return '<span class="badge bg-danger">'.Yii::t('app', 'Nofaol').'</span>';
                    }
                },
                'contentOptions' => ['class' => 'text-center'],
            ],
            'sort_order',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Categories $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
