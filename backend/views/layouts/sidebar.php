<?php


use yii\helpers\Html;
use yii\helpers\Url; ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home(); ?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RASH-MILK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    
                    ['label' => 'Boshqaruv menulari', 'header' => true],
                    
                    ['label' => 'Kategoriyala',  'icon' => 'list', 'url' => ['/categories']],
                    ['label' => 'Productlar',  'icon' => 'layer-group', 'url' => ['/products']],
                    ['label' => 'Yangiliklar',  'icon' => 'bullhorn', 'url' => ['/news']],
                    ['label' => 'Vakansiyalar',  'icon' => 'window-maximize', 'url' => ['/vacancies']],
                    ['label' => 'Talabgorlar',  'icon' => 'users', 'url' => ['/applicants']],
                    ['label' => 'Kontaktlar',  'icon' => 'envelope', 'url' => ['/contact']],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii']],
                    ['label' => 'Tarjimalar',  'icon' => 'globe', 'url' => ['/translate-manager']],
                    
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>