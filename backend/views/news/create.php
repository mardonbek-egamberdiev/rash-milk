<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\News $model */

$this->title = Yii::t('app', 'Yangilik qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
