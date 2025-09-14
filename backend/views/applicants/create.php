<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Applicants $model */

$this->title = Yii::t('app', 'Create Applicants');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Applicants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applicants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
