<?php

use common\models\Partners;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PartnersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Partners'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-hover table-striped align-middle'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($model) {
                    $frontendBase = Yii::getAlias('@frontendUrl'); // aliasni ishlatamiz
                    if ($model->image && file_exists(Yii::getAlias('@frontend/web/partners/' . $model->image))) {
                        $imgUrl = $frontendBase . '.uz/partners/' . $model->image;
                        return Html::img($imgUrl, ['class' => 'product-thumb']);
                    }
                    return Html::tag('span', Yii::t('app', 'No image'), ['class' => 'text-muted']);
                },
                'contentOptions' => ['style' => 'text-align:center; width:120px;'],
            ],
            'name',
            'sort_order',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->status == 1 
                        ? Html::tag('span', 'Active', ['class' => 'badge bg-success']) 
                        : Html::tag('span', 'Inactive', ['class' => 'badge bg-danger']);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Partners $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>

<?php
$css = <<<CSS
.partner-logo {
    width: 60px;
    height: auto;
    border-radius: 6px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}
.partner-logo:hover {
    transform: scale(1.8);
    z-index: 10;
    position: relative;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
CSS;
$this->registerCss($css);
?>
