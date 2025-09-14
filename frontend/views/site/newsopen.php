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
	  <h6 class="mb-0 text-info"><a href="<?= Url::to(['/']); ?>"><?=Yii::t('app', 'Bosh sahifa')?></a> <span class="me-2 ms-2"><i class="bi bi-caret-right-fill align-middle text-muted"></i></span> <?= Html::encode($news->{'title_' . Yii::$app->language}) ?></h6>
   </div>
  </div>
 </div>
</section>

<section id="blog" class="pt-5 pb-5">
 <div class="container-xl">
  <div class="row blog_1">
    <div class="col-md-4 col-lg-3">
	  <div class="blog_1_left">
	      
		  <div class="blog_1_left1 mt-4 border_light p-3">
		   <h5 class="text-uppercase">Recent Posts</h5>
		   <hr class="line mb-4">
		    <ul class="mb-0 ps-2">
                <?php foreach ($recentPosts as $recent): ?>
                    <li class="d-flex border-bottom pb-3 mb-3">
                        <!-- Rasm -->
                        <span>
                            <a href="<?= \yii\helpers\Url::to(['/site/newsopen', 'id' => $recent->id]) ?>">
                                <img width="90" 
                                    alt="<?= \yii\helpers\Html::encode($recent->{'title_' . Yii::$app->language}) ?>" 
                                    class="rounded-3" 
                                    src="/news/<?= $recent->image ?: 'no-image.png' ?>">
                            </a>
                        </span>
                        
                        <!-- Sarlavha va Sana -->
                        <span class="flex-column ms-3">
                            <span class="font_14 d-block text-muted">
                                <?= Yii::$app->formatter->asDate($recent->created_at, 'php:F d, Y') ?>
                            </span>
                            <b class="d-block font_14 mt-1">
                                <a href="<?= \yii\helpers\Url::to(['/site/newsopen', 'id' => $recent->id]) ?>">
                                    <?= \yii\helpers\Html::encode($recent->{'title_' . Yii::$app->language}) ?>
                                </a>
                            </b>
                        </span>
                    </li>
                <?php endforeach; ?>
			</ul>
		  </div>
		  
	  </div>
	</div>
	<div class="col-md-8 col-lg-9">
	  <div class="blog_dt">
        <div class="blog_dt1">
            <!-- Rasm -->
            <?php if ($news->image): ?>
                <img src="/news/<?= $news->image ?>" class="img-fluid" alt="<?= Html::encode($news->{'title_' . Yii::$app->language}) ?>">
            <?php else: ?>
                <img src="/images/no-image.png" class="img-fluid" alt="no image">
            <?php endif; ?>

            <!-- Sarlavha -->
            <h2 class="mt-3">
                <?= Html::encode($news->{'title_' . Yii::$app->language}) ?>
            </h2>

            <!-- Sana va Admin -->
            <h6 class="mb-0 font_13 mt-3">
                <i class="bi bi-clock text-danger me-1 align-middle font_14"></i>
                <a href="#">
                    <?= Yii::$app->formatter->asDate($news->created_at, 'php:F j, Y') ?>
                </a>
                <i class="bi bi-person text-danger me-1 ms-3 fs-6 align-middle"></i>
                <a href="#"><?= $news->owner?></a>
            </h6>

            <!-- Kontent -->
            <p class="mt-3">
                <?= $news->{'text_' . Yii::$app->language} ?>
            </p>
        </div>

		
	  </div>
	</div>
  </div>
 </div>
</section>

