<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

$lang = Yii::$app->language;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Handlee&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<section id="header">
     <nav class="navbar navbar-expand-lg w-100 pt-2 pb-2 fixed-top" style="background: #ffffff;">
      <div class="container-xl">
         <a class="d-flex" href="<?= Url::to(['/']); ?>">
			<img src="/image/logo.png" width="100" alt="">
	     </a>
         <button class="navbar-toggler offcanvas-nav-btn  ms-auto me-3" type="button">
            <img src="/image/icons-svg/list.svg" width="40" height="40" alt="Open TemplateOnweb website menu"/>
         </button>
         <div class="offcanvas offcanvas-start offcanvas-nav" style="width: 20rem">
            <div class="offcanvas-header shadow">
			    <a class="d-flex" href="<?= Url::to(['/']); ?>">
			 <b class="fs-2 text-dark text-uppercase"><i class="bi bi-cup-straw text-danger fs-1"></i> Rash-milk </b>
	     </a>
               <img src="/image/icons-svg/x.svg" width="40" height="40" class="ms-auto" data-bs-dismiss="offcanvas" aria-label="Close" alt="Close TemplateOnweb website menu"/>
			   
            </div>
            <div class="offcanvas-body pt-0 align-items-center">
               <ul class="navbar-nav align-items-lg-center ms-auto">
			      
				  
				 

				<li class="nav-item"> 
					<a class="nav-link dropdown-toggle" href="<?= Url::to(['/']); ?>" title="Visit home page">
					<?= Yii::t('app', "Bosh sahifa") ?>
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link dropdown-toggle" href="<?= Url::to(['/site/about']); ?>" title="Visit home page">
					<?= Yii::t('app', "Kompaniya haqida") ?>
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link dropdown-toggle" href="<?= Url::to(['/site/products']); ?>" title="Visit home page">
					<?= Yii::t('app', "Mahsulotlar") ?>
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link dropdown-toggle" href="<?= Url::to(['/site/news']); ?>" title="Visit home page">
					<?= Yii::t('app', "Yangiliklar") ?>
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link dropdown-toggle" href="<?= Url::to(['/site/vacancies']); ?>" title="Visit home page">
					<?= Yii::t('app', "Vakansiyalar") ?>
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link dropdown-toggle" href="<?= Url::to(['/site/contact']); ?>" title="Visit home page">
					<?= Yii::t('app', "contacts") ?>
					</a>
				</li>
				
				  
				 
				  
				  
               </ul>
			   <ul class="navbar-nav align-items-lg-center ms-auto nav_right">
		            <!-- <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav_hide nav-link fs-6" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-search"></i>
                        </a>
                            <ul class="dropdown-menu drop_search p-3 shadow" aria-labelledby="navbarDropdown" style="">
                            <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Keyword">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary bg-info border-0 rounded-0 p-2 px-3" type="button">
                                        <i class="bi bi-search"></i> </button>
                                </span>
                            </div>
                            </form>
                            </ul>
                    </li> -->
		<li class="nav-item  <?php echo $lang == 'uz' ? 'active-menu' : ''; ?>">
          <a class="dropdown-toggle  fs-6 <?php echo $lang == 'uz' ? '' : 'nav-link '; ?>" href="<?= Url::current(['lang' => 'uz']) ?>">
            UZ
          </a>
        </li>
        <li class="nav-item <?php echo $lang == 'ru' ? 'active-menu' : ''; ?>">
          <a class="dropdown-toggle  fs-6 <?php echo $lang == 'ru' ? '' : 'nav-link '; ?>" href="<?= Url::current(['lang' => 'ru']) ?>">
            RU
          </a>
        </li>
        <li class="nav-item <?php echo $lang == 'en' ? 'active-menu' : ''; ?>">
          <a class="dropdown-toggle  fs-6 <?php echo $lang == 'en' ? '' : 'nav-link '; ?>" href="<?= Url::current(['lang' => 'en']) ?>">
            EN
          </a>
        </li>
				 
                 </ul>
            </div>
         </div>    
         </div>
      </div>
   </nav>
</section>





        <?= $content ?>


        <section id="footer" class="pt-5 pb-4  bg_light">
 <div class="container-xl">
   <div class="row  footer_1 ">
    <div class="footer_1_inner row mx-0">
	  <div class="col-md-3">
	    <div class="footer_1_left">
        <a class="fs-2 text-uppercase d-block" href="<?= Url::to(['/']); ?>">
			<img src="/image/logo.png" width="100" alt="">
            RASH-MILK
	     </a>
	     
		 <!-- <b class="font_14 d-block mt-2">CALL US FREE</b> -->
		 <b class="fs-3 fw-normal d-block mt-2 mb-3">+998 (95) 200-11-55</b>
		 <b class="fs-3 fw-normal d-block mt-2 mb-3">+997 (74) 224-37-37</b>
		 <span class="d-block"><b><?=Yii::t('app', 'Address')?>:</b> Andijon viloyati Bo`ston tumani Pillakor MFY Ipak yo`li ko`chasi 36-uy</span>
		 <span class="d-block mt-1"><b>Email:</b> <a href="mailto:info@rash-milk.uz">info@rash-milk.uz</a></span>
		  <span class="d-block mt-1"><b>Fax:</b> <a href="tel:+997742243737">+997 (74) 224-37-37</a></span>
	   </div>
	  </div>
	  <div class="col-md-9">
	    <div class="row  row-cols-md-4 row-cols-1">
			<div class="col-md-8 col-xs-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1476.8440042402794!2d71.91477937946404!3d40.70083387573583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb6239c34ed86f%3A0x178da6d64a727e27!2sRash-Milk%20LLC!5e1!3m2!1suz!2s!4v1756138549708!5m2!1suz!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-md-4 col-xs-12">
			<div class="footer_1_left mt-1">
				<b class="d-block fs-5"><?=Yii::t('app', 'NEWSLETTER')?></b>
				<hr class="line mt-2">
				<p><?=Yii::t('app', 'newsletter_description')?></p>
				<div class="input-group mt-4">
					<input type="text" class="form-control" placeholder="Enter Email">
					<span class="input-group-btn">
						<button class="btn btn-primary bg-danger border-0 rounded-0 p-2 px-3" type="button">
							<i class="bi bi-envelope"></i> </button>
					</span>
				</div>
				<ul class="mb-0 social_icon1 font_14 mt-4">
					<li class="d-inline-block"><a href="#"><i class="bi bi-facebook"></i></a></li>
					<li class="d-inline-block ms-1"><a href="#"><i class="bi bi-twitter"></i></a></li>
					<li class="d-inline-block ms-1"><a href="#"><i class="bi bi-linkedin"></i></a></li>
					<li class="d-inline-block ms-1"><a href="#"><i class="bi  bi-instagram"></i></a></li>
					</ul>
			</div>
			</div>
		</div>
	  </div>
	</div>
 
   </div>
   <div class="row  footer_2 border-top mt-4 pt-4 mx-0">
    <div class="col-md-8">
	  <div class="footer_bottom1_left">
        <p class="mb-0">© 2025 rash-milk.uz. All Rights Reserved | Design by <a class="text-danger fw-bold" href="https://insoft.uz/">insoft.uz</a></p>
	  </div>
	 </div>
	<div class="col-md-4">
	  <div class="footer_bottom1_right text-end mt-1">
       <ul class="text-uppercase font_12 mb-0">
		    <li class="d-inline-block"><a class="text-muted link" href="#"> Facebook</a></li>
			<li class="d-inline-block mx-2 text-muted">|</li>
			 <li class="d-inline-block"><a class="text-muted link" href="#"> Twitter</a></li>
			 <li class="d-inline-block mx-2 text-muted">|</li>
			 <li class="d-inline-block"><a class="text-muted link" href="#"> Pinterest</a></li>
			 <li class="d-inline-block mx-2 text-muted">|</li>
			 <li class="d-inline-block"><a class="text-muted link" href="#"> Instagram</a></li>
		  </ul>
	  </div>
	 </div>
   </div>
 </div>
</section>

<?php $this->endBody() ?>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
</body>
</html>
<?php $this->endPage();
