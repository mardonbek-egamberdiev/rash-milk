<?php

namespace common\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string|null $image
 * @property int|null $sort_order
 * @property int|null $status
 *
 * @property Categories $category
 */


class Products extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'image'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
            [['category_id', 'sort_order', 'status'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'required'],
            [['name_uz', 'name_ru', 'name_en', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Kategoriyasi'),
            'name_uz' => Yii::t('app', 'Nomi Uz'),
            'name_ru' => Yii::t('app', 'Nomi Ru'),
            'name_en' => Yii::t('app', 'Nomi En'),
            'image' => Yii::t('app', 'Rasm 620x620px bo\'lishi kerak!'),
            'sort_order' => Yii::t('app', 'Tartib raqami'),
            'status' => Yii::t('app', 'Holati'),
        ];
    }
    public function upload()
    {
        if ($this->imageFile) {
            $uploadPath = Yii::getAlias('@frontend/web/products/');

            // eski faylni o‘chirib tashlash
            if ($this->oldAttributes['image'] && file_exists($uploadPath . $this->oldAttributes['image'])) {
                @unlink($uploadPath . $this->oldAttributes['image']);
            }

            $fileName = uniqid() . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs($uploadPath . $fileName)) {
                $this->image = $fileName;
                return true;
            }
            return false;
        }

        // agar yangi fayl yuklanmagan bo‘lsa, eski rasm qolsin
        $this->image = $this->oldAttributes['image'];
        return true;
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

}
