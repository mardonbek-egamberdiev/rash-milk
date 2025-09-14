<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancies".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property int|null $sort_order
 * @property int|null $status
 */
class Vacancies extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort_order'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
            [['title_uz', 'title_ru', 'title_en', 'content_uz', 'content_ru', 'content_en'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['sort_order', 'status'], 'integer'],
            [['title_uz', 'title_ru', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_uz' => Yii::t('app', 'Title Uz'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_en' => Yii::t('app', 'Title En'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

}
