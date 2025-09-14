


<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap5\ActiveForm;
    use yii\captcha\Captcha;
?>

<br>
<br>
<br>
<br>
<section id="center" class="center_o bg_light pt-3 pb-3">
 <div class="container-xl">
  <div class="row center_o1">
   <div class="col-md-12">
	  <h6 class="mb-0 text-info"><a href="<?= Url::to(['/']); ?>"><?=Yii::t('app', 'Bosh sahifa')?></a> <span class="me-2 ms-2"><i class="bi bi-caret-right-fill align-middle text-muted"></i></span> <?= Yii::t('app', "contacts") ?></h6>
   </div>
  </div>
 </div>
 </section>

<section id="contact" class="pt-5 pb-5">
 <div class="container-xl">
   <div class="row contact_1">
     <div class="col-md-5">
	   <div class="contact_1l">
	     <h4><?= Yii::t('app', "Phones") ?></h4>
		  <div class="contact_1li row border_light rounded-3 pt-3 pb-3 mx-0">
		    <div class="col-md-2">
			  <div class="contact_1lil">
			   <span class="d-inline-block rounded-circle text-center fs-4 bg-info text-white"><i class="bi bi-telephone"></i></span>
			  </div>
			</div>
			<div class="col-md-10">
			  <div class="contact_1lir">
			    <h5 class="mb-0 fw-normal mt-2"><a href="tel: +998952001155">+998 (95) 200-11-55, <br>+997 (74) 224-37-37</a></h5>
			  </div>
			</div>
		  </div>
		  <h4 class="mt-4"><?= Yii::t('app', "Emails") ?></h4>
		  <div class="contact_1li row border_light rounded-3 pt-3 pb-3 mx-0">
		    <div class="col-md-2">
			  <div class="contact_1lil">
			   <span class="d-inline-block rounded-circle text-center fs-4 bg-info text-white"><i class="bi bi-envelope"></i></span>
			  </div>
			</div>
			<div class="col-md-10">
			  <div class="contact_1lir">
			    <h5 class="mb-0 fw-normal mt-2"><a href="#">info@rash-milk.uz <br>rrashmilky@gmail.com</a></h5>
			  </div>
			</div>
		  </div>
		     <h4 class="mt-4"><?=Yii::t('app', 'Address')?></h4>
		  <div class="contact_1li row border_light rounded-3 pt-3 pb-3 mx-0">
		    <div class="col-md-2">
			  <div class="contact_1lil">
			   <span class="d-inline-block rounded-circle text-center fs-4 bg-info text-white"><i class="bi bi-geo-alt"></i></span>
			  </div>
			</div>
			<div class="col-md-10">
			  <div class="contact_1lir">
			    <h5 class="mb-0 fw-normal">  Andijon viloyati Bo`ston tumani Pillakor MFY Ipak yo`li ko`chasi 36-uy</h5>
			  </div>
			</div>
		  </div>
		  <h4 class="mt-4"><?= Yii::t('app', "Ish vaqti") ?></h4>
		  <div class="contact_1li row border_light rounded-3 pt-3 pb-3 mx-0">
		    <div class="col-md-2">
			  <div class="contact_1lil">
			   <span class="d-inline-block rounded-circle text-center fs-4 bg-info text-white"><i class="bi bi-clock"></i></span>
			  </div>
			</div>
			<div class="col-md-10">
			  <div class="contact_1lir">
			    <h5 class="mb-0 mt-3 fw-normal"> <?= Yii::t('app', "opening_hours") ?> </h5>
			  </div>
			</div>
		  </div>
	   </div>
	 </div>
	 <div class="col-md-7">
	   <div class="contact_1r bg_light p-4 rounded-3">
       <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <?= Yii::$app->session->getFlash('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="detail_1l4b">
            <h2 class="mb-4"><?= Yii::t('app', "appeal_send") ?></h2>

            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'options' => ['class' => 'row'],
            ]); ?>

            <div class="detail_1l4b1 row">
                <div class="col-md-6">
                    <div class="detail_1l4b1l">
                        <h6 class="fw-bold"><?= Yii::t('app', 'Name')?>*</h6>
                        <?= $form->field($model, 'name')
                            ->textInput([
                                'class' => 'form-control rounded-3 border-0',
                                'placeholder' => 'Your Name',
                                'autofocus' => true
                            ])->label(false) ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="detail_1l4b1l">
                        <h6 class="fw-bold"><?= Yii::t('app', 'Email')?>*</h6>
                        <?= $form->field($model, 'email')
                            ->textInput([
                                'class' => 'form-control rounded-3 border-0',
                                'placeholder' => 'Your Email'
                            ])->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="detail_1l4b1 row mt-4">
                <div class="col-md-6">
                    <div class="detail_1l4b1l">
                        <h6 class="fw-bold"><?= Yii::t('app', 'Subject')?>*</h6>
                        <?= $form->field($model, 'subject')
                            ->textInput([
                                'class' => 'form-control rounded-3 border-0',
                                'placeholder' => 'Subject'
                            ])->label(false) ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="detail_1l4b1l">
                        <h6 class="fw-bold"><?= Yii::t('app', 'Phone')?></h6>
                        <?= $form->field($model, 'phone')
                            ->textInput([
                                'class' => 'form-control rounded-3 border-0',
                                'placeholder' => 'Telefon'
                            ])->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="detail_1l4b1 row mt-4">
                <div class="col-md-12">
                    <div class="detail_1l4b1l">
                        <h6 class="fw-bold"><?= Yii::t('app', 'Body')?></h6>
                        <?= $form->field($model, 'body')
                            ->textarea([
                                'rows' => 6,
                                'class' => 'form-control rounded-3 border-0 form_text',
                                'placeholder' => 'Write Message'
                            ])->label(false) ?>

                        <div class="form-check mt-3">
                            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                'options' => ['class' => 'form-control rounded-3 border-0'],
                            ])->label(false) ?>
                        </div>

                        <h6 class="mb-0 mt-4 center_sm family_1">
                            <?= Html::submitButton(Yii::t('app', 'Yuborish'), ['class' => 'button']) ?>
                        </h6>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

	 </div>
   </div>
   <div class="cont_pg2 row mt-4">
	   <div class="col-md-12">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1476.8440042402794!2d71.91477937946404!3d40.70083387573583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb6239c34ed86f%3A0x178da6d64a727e27!2sRash-Milk%20LLC!5e1!3m2!1suz!2s!4v1756138549708!5m2!1suz!2s" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	   </div>
	  </div>
 </div>
</section>
