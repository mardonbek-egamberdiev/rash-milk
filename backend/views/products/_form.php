<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use common\models\Categories;

/** @var yii\web\View $this */
/** @var common\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form container mt-4">

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><?= Yii::t('app', 'Product Form') ?></h5>
        </div>
        <div class="card-body">

            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'row g-3',
                'enctype' => 'multipart/form-data'
            ],
                
            ]); ?>

            <div class="col-md-6">
                <?= $form->field($model, 'category_id')->dropDownList(
                    ArrayHelper::map(Categories::find()->all(), 'id', 'name_uz'),
                    ['prompt' => Yii::t('app', 'Select Category')]
                ) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'name_uz')->textInput([
                    'maxlength' => true,
                    'placeholder' => Yii::t('app', 'Enter Uzbek name')
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'name_ru')->textInput([
                    'maxlength' => true,
                    'placeholder' => Yii::t('app', 'Enter Russian name')
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'name_en')->textInput([
                    'maxlength' => true,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'oil')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'protein')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'carbohydrate')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'energy')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'weight')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'storage')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'package')->textInput([
                    'maxlength' => true,
                    'type' => 'number',
                    'min' => 0,
                    'placeholder' => Yii::t('app', 'Enter English name')
                ]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'description_uz')->textarea([
                    'rows' => 6,
                    'maxlength' => true,
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'description_ru')->textarea([
                    'rows' => 6,
                    'maxlength' => true,
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'description_en')->textarea([
                    'rows' => 6,
                    'maxlength' => true,
                ]) ?>
            </div>
            
            <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::class, [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showPreview' => true,
                    'showRemove' => true,
                    'showUpload' => false, // ajax emas, form bilan jo‘natiladi
                ]
            ]); ?>

            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'sort_order')->textInput([
                    'type' => 'number',
                    'min' => 0
                ]) ?>
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
