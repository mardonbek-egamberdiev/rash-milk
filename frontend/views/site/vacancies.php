<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var \app\models\Vacancies[] $vacancies */
/** @var \app\models\Applicants $applicant */
/** @var yii\widgets\ActiveForm $form */
?>

<br>
<br>
<br>
<br>
<section id="center" class="center_o bg_light pt-3 pb-3">
 <div class="container-xl">
  <div class="row center_o1">
   <div class="col-md-12">
	  <h6 class="mb-0 text-info"><a href="<?= Url::to(['/']); ?>"><?=Yii::t('app', 'Bosh sahifa')?></a> <span class="me-2 ms-2"><i class="bi bi-caret-right-fill align-middle text-muted"></i></span> <?= Yii::t('app', "Vakansiyalar") ?></h6>
   </div>
  </div>
 </div>
</section>

<section id="faq" class="pt-5 pb-5">
 <div class="container-xl">
   <div class="faq_top row text-center mb-4">
	   <div class="col-md-12">
		  <h1 class="mb-0"><?= Yii::t('app', "Vakansiyalar") ?></h1>
	   </div>
	  </div>
	<div class="row faq_1">
   <div class="col-md-6">
     <div class="faq_1l">
     <div class="accordion" id="vacanciesAccordion">
    <?php foreach ($vacancies as $index => $vacancy): ?>
        <?php 
            $lang = Yii::$app->language;
            $titleAttr = 'title_' . $lang;
            $contentAttr = 'content_' . $lang;
            $collapseId = 'collapse' . $index;
            $headingId = 'heading' . $index;
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="<?= $headingId ?>">
                <button class="accordion-button <?= $index === 0 ? '' : 'collapsed' ?>" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#<?= $collapseId ?>" 
                        aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                        aria-controls="<?= $collapseId ?>">
                    <i class="bi bi-check-circle me-2"></i> 
                    <?= Html::encode($vacancy->$titleAttr) ?>
                </button>
            </h2>
            <div id="<?= $collapseId ?>" 
                 class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" 
                 aria-labelledby="<?= $headingId ?>" 
                 data-bs-parent="#vacanciesAccordion">
                <div class="accordion-body">
                    <p class="mb-0"><?= $vacancy->$contentAttr ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
	 </div>
   </div>
   <div class="col-md-6">
     <div class="faq_1r">
	     <img src="/image/job.jpg" alt="abc" class="img-fluid">
	 </div>
   </div>
  </div>
 </div>
</section>
    <!-- Applicant Form -->
    <div class="row">
        <div class="offset-2 col-md-8">
            <div class="applicant-form mt-5 p-4 shadow-lg rounded bg-white">
                <h3 class="mb-4 text-center text-success">
                    <i class="bi bi-person-lines-fill me-2"></i> 
                    <?= Yii::t('app', 'Apply for a Vacancy') ?>
                </h3>
        
                <?php $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data', 'class' => 'row g-3'],
                    'fieldConfig' => [
                        'options' => ['class' => 'col-md-6'],
                        'labelOptions' => ['class' => 'form-label fw-bold'],
                        'inputOptions' => ['class' => 'form-control shadow-sm'],
                        'errorOptions' => ['class' => 'invalid-feedback d-block'],
                    ],
                ]); ?>
        
                <?= $form->field($applicant, 'vacancy_id', ['options' => ['class' => 'col-12']])
                    ->dropDownList(
                        ArrayHelper::map($vacancies, 'id', 'title_'.Yii::$app->language),
                        ['prompt' => Yii::t('app', 'Select a vacancy'), 'class' => 'form-select shadow-sm']
                    ) ?>
        
                <?= $form->field($applicant, 'full_name')->textInput(['maxlength' => true, 'placeholder' => 'John Doe']) ?>
        
                <?= $form->field($applicant, 'phone')->textInput([
                    'maxlength' => true,
                    'placeholder' => '+998 901234567',
                    'oninput' => 'this.value = this.value.replace(/[^0-9+]/g, "").slice(0,13);',
                    'minlength' => 13,
                    'maxlength' => 13,
                ]) ?>
        
                <?= $form->field($applicant, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Tashkent, Uzbekistan']) ?>
        
                <?= $form->field($applicant, 'where_get_from')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Telegram, Website, Friend...')]) ?>
        
                <!-- ✅ image uchun file input -->
                <?= $form->field($applicant, 'imageFile')
                    ->fileInput(['accept' => 'image/*', 'class' => 'form-control shadow-sm']) ?>

                <?= $form->field($applicant, 'verifyCode')->widget(\yii\captcha\Captcha::class, [
                    'template' => '<div class="row">
                        <div class="col-md-4">{image}</div>
                        <div class="col-md-8">{input}</div>
                    </div>',
                ]) ?>
        
                <div class="col-12 text-center mt-4">
                    <?= Html::submitButton(
                        '<i class="bi bi-send-check me-2"></i>' . Yii::t('app', 'Submit Application'),
                        ['class' => 'btn btn-success btn-lg px-5 shadow']
                    ) ?>
                </div>
        
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <?php
$css = <<<CSS
.applicant-form {
    border: 2px solid #e9f7ef;
    transition: all 0.3s ease-in-out;
}
.applicant-form:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
CSS;
$this->registerCss($css);
?>