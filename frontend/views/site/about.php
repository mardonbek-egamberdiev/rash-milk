<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<style>
.play-btn {
  font-size: 70px;
  color: #fff;
  text-shadow: 0 0 20px rgba(0,0,0,0.6);
  transition: transform 0.3s ease, color 0.3s ease;
  cursor: pointer;
}
.play-btn:hover {
  transform: scale(1.1);
  color: #ff0000;
}
</style>

<br>
<br>
<br>
<br>
<section id="center" class="center_o bg_light pt-3 pb-3">
 <div class="container-xl">
  <div class="row center_o1">
   <div class="col-md-12">
	  <h6 class="mb-0 text-info"><a href="<?= Url::to(['/']); ?>"><?=Yii::t('app', 'Bosh sahifa')?></a> <span class="me-2 ms-2"><i class="bi bi-caret-right-fill align-middle text-muted"></i></span> <?= Yii::t('app', "Kompaniya haqida") ?></h6>
   </div>
  </div>
 </div>
 </section>
<section id="about_pg" class="pt-5 pb-5">
 <div class="container-xl">
   <div class="row about_pg1 row-cols-1 row-cols-md-2">
      <div class="col">
	    <div class="about_pg1_left pt-5">
		 <h1><?= Yii::t('app', "Kompaniya haqida") ?></h1>
		 <h6 class="space_4 font_14 mt-3 text-muted border_left_bold py-2 ps-3"> <?=Yii::t('app', 'slogan') ?></h6>
		 <p class="mt-4 mb-0"><?=Yii::t('app', 'about_company')?></p>
		</div>
	  </div>
	  <div class="col">
        <div class="about_pg1_right position-relative">
            <!-- Poster rasm -->
            <a 
                data-fancybox 
                href="https://www.youtube.com/watch?v=VvvOnvUUS98" 
                class="d-block position-relative">
                
                <img src="/image/44.png" alt="abc" class="img-fluid rounded-3 shadow" />

                <!-- Play tugmasi -->
                <span class="play-btn position-absolute top-50 start-50 translate-middle">
                <i class="bi bi-play-circle-fill"></i>
                </span>
            </a>
        </div>
	  </div>
   </div>
   <div class="row about_pg1 row-cols-1 row-cols-md-2 mt-4">
	  <div class="col">
      <div class="about_pg1_right position-relative">
            <!-- Poster rasm -->
            <a 
                data-fancybox 
                href="https://youtu.be/GhhAPY-Sgsk" 
                class="d-block position-relative">
                
                <img src="/image/45.png" alt="abc" class="img-fluid rounded-3 shadow" />

                <!-- Play tugmasi -->
                <span class="play-btn position-absolute top-50 start-50 translate-middle">
                <i class="bi bi-play-circle-fill"></i>
                </span>
            </a>
        </div>

	  </div>
	  <div class="col">
	    <div class="about_pg1_left pt-5">
		 <h1><?=Yii::t('app', 'Biz kimmiz?')?></h1>
		 <h6 class="space_4 font_14 mt-3 text-muted border_left_bold py-2 ps-3"> <?=Yii::t('app', 'slogan2')?></h6>
		 <p class="mt-4 mb-0"><?=Yii::t('app', 'Biz_kimmiz_description')?></p>
		</div>
	  </div>
   </div>
   <div class="row about_pg2 row-cols-1 row-cols-md-3 mt-5">
	  <div class="col">
	    <div class="about_pg2_left text-center">
		  <span class="font_60 text-danger lh-1"><i class="bi bi-x-diamond"></i></span>
		  <h3 class="mt-3"><?=Yii::t('app', 'Sifat')?></h3>
		  <hr class="line mx-auto">
		  <p class="mb-0"><?=Yii::t('app', 'Biz mahsulotlarimizni sifatli va foydali qilishga intilamiz.')?></p>
		</div>
	  </div>
	  <div class="col">
	    <div class="about_pg2_left text-center">
		  <span class="font_60 text-danger lh-1"><i class="bi bi-node-minus"></i></span>
		  <h3 class="mt-3"><?=Yii::t('app', 'Tabiiylik')?></h3>
		  <hr class="line mx-auto">
		  <p class="mb-0"><?=Yii::t('app', 'Mahsulotlarimiz tabiiy sutdan tayyorlanadi.')?></p>
		</div>
	  </div>
	  <div class="col">
	    <div class="about_pg2_left text-center">
		  <span class="font_60 text-danger lh-1"><i class="bi bi-sign-stop-lights-fill"></i></span>
		  <h3 class="mt-3"><?=Yii::t('app', 'G‘amxo‘rlik')?></h3>
		  <hr class="line mx-auto">
		  <p class="mb-0"><?=Yii::t('app', 'Biz iste’molchilarning sog‘ligi haqida g‘amxo‘rlik qilamiz.')?></p>
		</div>
	  </div>
   </div>
 </div>
</section>