<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string|null $subtitle_uz
 * @property string|null $subtitle_ru
 * @property string|null $subtitle_en
 * @property string|null $text_uz
 * @property string|null $text_ru
 * @property string|null $text_en
 * @property string|null $image
 * @property string $created_at
 * @property string|null $owner
 * @property int $status
 */
class News extends \yii\db\ActiveRecord
{

    public $imageFile; // qo‘shimcha property
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subtitle_uz', 'subtitle_ru', 'subtitle_en', 'text_uz', 'text_ru', 'text_en', 'image', 'owner'], 'default', 'value' => null],
            [['title_uz', 'title_ru', 'title_en', 'status'], 'required'],
            [['text_uz', 'text_ru', 'text_en'], 'string'],
            [['created_at'], 'safe'],
            [['status'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'image', 'owner'], 'string', 'max' => 255],
            [['subtitle_uz', 'subtitle_ru', 'subtitle_en'], 'string', 'max' => 500],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
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
            'subtitle_uz' => Yii::t('app', 'Subtitle Uz'),
            'subtitle_ru' => Yii::t('app', 'Subtitle Ru'),
            'subtitle_en' => Yii::t('app', 'Subtitle En'),
            'text_uz' => Yii::t('app', 'Text Uz'),
            'text_ru' => Yii::t('app', 'Text Ru'),
            'text_en' => Yii::t('app', 'Text En'),
            'image' => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'owner' => Yii::t('app', 'Owner'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

}
