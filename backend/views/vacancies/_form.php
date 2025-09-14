<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\switchinput\SwitchInput;

/** @var yii\web\View $this */
/** @var common\models\Vacancies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vacancies-form card shadow-lg p-4 rounded-3 bg-light">

    <h3 class="mb-4 text-primary">
        <i class="bi bi-briefcase-fill"></i> <?= Yii::t('app', 'Vacancy Form') ?>
    </h3>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title_uz')->textInput([
                'maxlength' => true,
                'placeholder' => 'Nom (UZ)',
                'class' => 'form-control border-primary shadow-sm'
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_ru')->textInput([
                'maxlength' => true,
                'placeholder' => 'Название (RU)',
                'class' => 'form-control border-primary shadow-sm'
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_en')->textInput([
                'maxlength' => true,
                'placeholder' => 'Title (EN)',
                'class' => 'form-control border-primary shadow-sm'
            ]) ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <?= $form->field($model, 'content_uz')->widget(CKEditor::class, [
                'editorOptions' => [
                    'preset' => 'standard',
                    'inline' => false,
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'content_ru')->widget(CKEditor::class, [
                'editorOptions' => [
                    'preset' => 'standard',
                    'inline' => false,
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'content_en')->widget(CKEditor::class, [
                'editorOptions' => [
                    'preset' => 'standard',
                    'inline' => false,
                ],
            ]); ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <?= $form->field($model, 'sort_order')->textInput([
                'class' => 'form-control border-info shadow-sm'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->widget(SwitchInput::class, [
                'pluginOptions' => [
                    'onText' => Yii::t('app', 'Active'),
                    'offText' => Yii::t('app', 'Inactive')
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group mt-4 text-end">
        <?= Html::submitButton('<i class="bi bi-save"></i> ' . Yii::t('app', 'Save'), [
            'class' => 'btn btn-lg btn-success shadow'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
