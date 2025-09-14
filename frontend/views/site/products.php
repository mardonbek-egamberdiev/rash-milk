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
	  <h6 class="mb-0 text-info"><a href="<?= Url::to(['/']); ?>"><?=Yii::t('app', 'Bosh sahifa')?></a> <span class="me-2 ms-2"><i class="bi bi-caret-right-fill align-middle text-muted"></i></span> <?= Yii::t('app',"Mahsulotlar") ?></h6>
   </div>
  </div>
 </div>
</section>
<section id="shop_h" class="pt-5 pb-5 shadow">
 <div class="container-xl">
   <div class="row shop_h1">
    <div class="col-md-12">
    <?php
    /** @var yii\web\View $this */
    /** @var common\models\Categories[] $categories */
    /** @var common\models\Products[] $products */

    $currentLang = Yii::$app->language; // masalan: 'uz', 'ru', 'en'
    ?>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-0 flex-wrap fs-5 tab_click border-0 justify-content-center">
        <?php foreach ($categories as $index => $cat): ?>
            <?php
            $name = $cat->{"name_" . $currentLang} ?? $cat->name_en;
            $tabId = "profile" . ($index + 1);
            ?>
            <li class="nav-item <?= $index > 0 ? 'mx-3' : '' ?>">
                <a href="#<?= $tabId ?>"
                data-bs-toggle="tab"
                aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>"
                class="nav-link <?= $index === 0 ? 'active' : '' ?>">
                    <span class="d-md-block"><?= Html::encode($name) ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4">
        <?php foreach ($categories as $index => $cat): ?>
            <?php
            $tabId = "profile" . ($index + 1);
            // Shu kategoriyaga tegishli mahsulotlarni olish
            $catProducts = array_filter($products, fn($p) => $p->category_id == $cat->id);
            ?>
            <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="<?= $tabId ?>">
                <div class="row">
                    <?php if (!empty($catProducts)): ?>
                        <?php foreach ($catProducts as $prod): ?>
                            <div class="col-md-3 mb-4">
        <div class="shop_h1_inner_left h-100">
            <div class="shop_h1_inner_left1 position-relative">
                <div class="shop_h1_inner_left1_inner">
                    <?php if ($prod->image): ?>
                        <a href="#">
                            <img src="<?= Yii::getAlias('@web/products/' . $prod->image) ?>"
                                alt="<?= Html::encode($prod->{"name_" . $currentLang}) ?>"
                                class="img-fluid"
                                style="height:310px; object-fit:cover; width:100%;">
                        </a>
                    <?php endif; ?>
                </div>
                <!-- Ikonkalar -->
                
                <!-- Sale label -->
                <div class="shop_h1_inner_left1_inner2 position-absolute top-0 w-100 text-end">
                    <span class="d-inline-block bg-success text-white py-1 px-4"><?=Yii::t('app','Sale')?></span>
                </div>
            </div>
            <!-- Nomi -->
            <div class="shop_h1_inner_left2 text-center mt-3">
                <b class="d-block fs-5">
                    <a href="#"><?= Html::encode($prod->{"name_" . $currentLang}) ?></a>
                </b>
                
            </div>
        </div>
    </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-muted fst-italic">
                            <?= Yii::t('app', 'No products in this category') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


        
	</div>
   </div>
 </div>
</section>