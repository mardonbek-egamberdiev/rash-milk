<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string|null $tag_name
 * @property int|null $sort_order
 * @property int|null $status
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
            [['name_uz', 'name_ru', 'name_en'], 'required'],
            [['sort_order', 'status'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],
            [['tag_name'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Nomi Uz'),
            'name_ru' => Yii::t('app', 'Nomi Ru'),
            'name_en' => Yii::t('app', 'Nomi En'),
            'tag_name' => Yii::t('app', 'Tag Nomi'),
            'sort_order' => Yii::t('app', 'Tartib raqami'),
            'status' => Yii::t('app', 'Holati'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['category_id' => 'id']);
    }

}
