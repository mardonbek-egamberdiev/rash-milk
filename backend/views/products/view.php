<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Products $model */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <div>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success me-1']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary me-1']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <div class="card shadow p-3">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php if ($model->image): ?>
                    <?php
                        $frontendBase = Yii::getAlias('@frontendUrl'); // aliasni ishlatamiz
                        if ($model->image && file_exists(Yii::getAlias('@frontend/web/products/' . $model->image))) {
                            $imgUrl = $frontendBase . '.uz/products/' . $model->image;
                            echo "<img src='".$imgUrl."' 
                            class='img-fluid rounded shadow-sm'
                            alt='<?= Html::encode($model->name_uz) ?>'
                            style='max-width:250px; transition: transform 0.3s;'
                            onmouseover='this.style.transform='scale(1.2)'' 
                            onmouseout='this.style.transform='scale(1)''>"; 
                            
                            
                        }
                        echo Html::tag('span', Yii::t('app', 'No image'), ['class' => 'text-muted']);    
                    ?>
                    
                <?php else: ?>
                    <div class="text-muted fst-italic"><?= Yii::t('app', 'No image uploaded') ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute' => 'category_id',
                            'value' => $model->category ? $model->category->name_uz : Yii::t('app', 'No category'),
                        ],
                        'name_uz',
                        'name_ru',
                        'name_en',
                        'sort_order',
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->status == 1
                                    ? '<span class="badge bg-success">'.Yii::t('app', 'Active').'</span>'
                                    : '<span class="badge bg-danger">'.Yii::t('app', 'Inactive').'</span>';
                            },
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
