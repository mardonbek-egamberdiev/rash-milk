<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'] // file upload uchun kerak
    ]); ?>

    <div class="card shadow p-4">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true, 'placeholder' => 'Sarlavha (UZ)']) ?>
                <?= $form->field($model, 'subtitle_uz')->textInput(['maxlength' => true, 'placeholder' => 'Kichik sarlavha (UZ)']) ?>
                <?= $form->field($model, 'text_uz')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                   
                ]) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'placeholder' => 'Заголовок (RU)']) ?>
                <?= $form->field($model, 'subtitle_ru')->textInput(['maxlength' => true, 'placeholder' => 'Подзаголовок (RU)']) ?>
                <?= $form->field($model, 'text_ru')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    
                ]) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'placeholder' => 'Title (EN)']) ?>
                <?= $form->field($model, 'subtitle_en')->textInput(['maxlength' => true, 'placeholder' => 'Subtitle (EN)']) ?>
                <?= $form->field($model, 'text_en')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            
                            'inline' => false, //по умолчанию false
                        ],
                    ]); ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showPreview' => true,
                        'initialPreview' => $model->image ? [Yii::getAlias('@web/news/' . $model->image)] : [],
                        'initialPreviewAsData' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'browseLabel' => 'Rasm yuklash',
                    ]
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'owner')->textInput(['maxlength' => true, 'placeholder' => 'Muallif']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'status')->widget(SwitchInput::class, [
                    'pluginOptions' => [
                        'onText' => 'Faol',
                        'offText' => 'Nofaol'
                    ]
                ]) ?>
            </div>
        </div>

        <div class="form-group mt-4 text-end">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success px-4']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
