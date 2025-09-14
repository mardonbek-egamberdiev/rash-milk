<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;

/** @var yii\web\View $this */
/** @var common\models\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form container mt-4">

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><?= Yii::t('app', 'Category Form') ?></h5>
        </div>
        <div class="card-body">

            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'row g-3'],
            ]); ?>

            <div class="col-md-4">
                <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Enter Uzbek name')]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Enter Russian name')]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'name_en')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Enter English name')]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'tag_name')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Tag (max 10 chars)')]) ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'sort_order')->textInput(['type' => 'number', 'min' => 0]) ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'status')->widget(SwitchInput::class, [
                    'type' => SwitchInput::CHECKBOX,
                    'pluginOptions' => [
                        'onText' => Yii::t('app', 'Faol'),
                        'offText' => Yii::t('app', 'Nofaol'),
                        'onColor' => 'success',
                        'offColor' => 'danger',
                    ]
                ]); ?>
            </div>

            <div class="col-12 text-end mt-3">
                <?= Html::submitButton(
                    '<i class="bi bi-save"></i> ' . Yii::t('app', 'Save'),
                    ['class' => 'btn btn-lg btn-success px-4']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
