<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Partners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card shadow-lg border-0 rounded-lg mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><?= $model->isNewRecord ? '➕ Yangi hamkor qo‘shish' : '✏️ Hamkorni yangilash' ?></h5>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => "Hamkor nomi"]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'sort_order')->textInput(['placeholder' => "Tartib raqami"]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'status')->dropDownList(
                    [1 => 'Active', 0 => 'Inactive'],
                    
                ) ?>
            </div>
            <div class="col-md-6">
                <?php if ($model->image): ?>
                    <div class="mb-2">
                        <img src="<?= Yii::getAlias('@web/partners/' . $model->image) ?>" 
                             alt="Partner Logo" 
                             style="max-height:200px; border:1px solid #ddd; padding:5px; border-radius:8px;">
                    </div>
                <?php endif; ?>
                <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*']) ?>
            </div>
        </div>

        <div class="form-group mt-3">
            <?= Html::submitButton(
                $model->isNewRecord ? '💾 Saqlash' : '🔄 Yangilash', 
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
            ) ?>
            <?= Html::a('❌ Bekor qilish', ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
