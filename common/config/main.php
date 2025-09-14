<?php

use common\components\LanguageHelper;
use common\components\UrlManager;
use yii\base\Application;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'translate-manager' => [
            'class' => 'wokster\translationmanager\TranslationManager',
            'languages' => ['uz', 'en', 'ru'],
        ],
    ],
    'components' => [
        'urlManager'=>[
            'class' => UrlManager::class,
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'forceTranslation' => true,
                ]
            ],
        ],
    ],
    
    
];
