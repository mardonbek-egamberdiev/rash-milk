<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Vacancies $model */

$this->title = Yii::t('app', 'Vakansiya qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
