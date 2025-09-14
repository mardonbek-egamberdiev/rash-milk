<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<br>
<br>
<br>
<br>
<section id="center" class="center_o bg_light pt-3 pb-3">
 <div class="container-xl">
  <div class="row center_o1">
   <div class="col-md-12">
	  <h6 class="mb-0 text-info"><a href="<?= Url::to(['/']); ?>"><?=Yii::t('app', 'Bosh sahifa')?></a> <span class="me-2 ms-2"><i class="bi bi-caret-right-fill align-middle text-muted"></i></span> <?= Yii::t('app',"Yangiliklar") ?></h6>
   </div>
  </div>
 </div>
</section>

<section id="blog" class="pt-5 pb-5">
 <div class="container-xl">
  <div class="row blog_1">
	<div class="col-md-12 col-lg-12">
	  <div class="blog_1_right">
	   <div class="blog_1_right1 row row-cols-1 row-cols-md-3">
            <?php foreach ($news as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="blog_1_right1_left">
                        <a href="<?= \yii\helpers\Url::to(['/site/newsopen', 'id' => $item->id]) ?>">
                            <img src="/news/<?= $item->image ?: 'no-image.png' ?>" 
                                alt="<?= \yii\helpers\Html::encode($item->{'title_' . Yii::$app->language}) ?>" 
                                class="img-fluid rounded-3">
                        </a>

                        <span class="d-block mt-3 text-muted font_12">
                            <?= strtoupper(Yii::$app->formatter->asDate($item->created_at, 'php:F d, Y')) ?>
                            <span class="mx-2">|</span>
                            <i class='bi bi-person me-1 text-info'></i> 
                            <?= Html::encode($item->owner ?: 'Admin') ?>
                        </span>

                        <b class="d-block mt-3 fs-5">
                            <a href="<?= \yii\helpers\Url::to(['/site/newsopen', 'id' => $item->id]) ?>">
                                <?= Html::encode($item->{'title_' . Yii::$app->language}) ?>
                            </a>
                        </b>

                        <p class="mb-0 mt-2">
                            <?= Html::encode(mb_substr($item->{'subtitle_' . Yii::$app->language}, 0, 100)) ?>...
                        </p>

                        <hr class="line mb-0">
                    </div>
                </div>
            <?php endforeach; ?>


	</div>
  </div>
 </div>
</section>

