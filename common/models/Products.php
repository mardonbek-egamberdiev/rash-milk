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
            [['oil', 'protein','carbohydrate','energy','weight'], 'number' ],
            [['storage', 'package'], 'integer' ],
            [['description_uz', 'description_ru', 'description_en'], 'string' ],
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
            'oil' => Yii::t('app', 'Yog\'lar'),
            'protein' => Yii::t('app', 'Oqsillar'),
            'carbohydrate' => Yii::t('app', 'Uglevodlar'),
            'energy' => Yii::t('app', 'Energiyaviy miqdori'),
            'weight' => Yii::t('app', 'Og\'irligi'),
            'storage' => Yii::t('app', 'Saqlash muddati'),
            'package' => Yii::t('app', 'Qadoqdagi soni'),
            'description_uz' => Yii::t('app', 'Tarkibi_uz'),
            'description_ru' => Yii::t('app', 'Tarkibi_ru'),
            'description_en' => Yii::t('app', 'Tarkibi_en'),
            'status' => Yii::t('app', 'Holati'),
        ];
    }
    public function upload()
    {
        if ($this->imageFile) {
            $uploadPath = Yii::getAlias('@frontend/web/products/');

            // Faqat eski yozuv bo‘lsa eski faylni o‘chir
            if (!$this->isNewRecord && !empty($this->oldAttributes['image'])) {
                $oldImage = $uploadPath . $this->oldAttributes['image'];
                if (file_exists($oldImage)) {
                    @unlink($oldImage);
                }
            }

            // Yangi fayl nomini yaratish
            $fileName = uniqid() . '.' . $this->imageFile->extension;

            // Faylni saqlash
            if ($this->imageFile->saveAs($uploadPath . $fileName)) {
                $this->image = $fileName;
                return true;
            }

            return false;
        }

        // Agar yangi fayl yuklanmagan bo‘lsa, eski rasm saqlansin
        if (!$this->isNewRecord && !empty($this->oldAttributes['image'])) {
            $this->image = $this->oldAttributes['image'];
        }

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
