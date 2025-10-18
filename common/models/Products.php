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
        // agar fayl yuklanmagan bo'lsa, eski rasm qolsin (yangi record bo'lsa yoki file yuklanmagan bo'lsa)
        if (!$this->imageFile) {
            // agar eski atribut mavjud bo'lsa uni saqlaymiz, aks holda bo'sh qoldiramiz
            if (!empty($this->oldAttributes['image'])) {
                $this->image = $this->oldAttributes['image'];
            }
            return true;
        }

        // upload papkasi (universal)
        $uploadPath = Yii::getAlias('@frontend/web/products/');

        // papka bo'lmasa yaratamiz
        if (!is_dir($uploadPath)) {
            @mkdir($uploadPath, 0775, true);
        }

        // eski faylni o'chirish, agar mavjud bo'lsa va yangi fayl yuklanyapti
        if (!empty($this->oldAttributes['image'])) {
            $oldFile = $uploadPath . $this->oldAttributes['image'];
            if (file_exists($oldFile) && is_file($oldFile)) {
                @unlink($oldFile);
            }
        }

        // noyob nom yaratish
        $fileName = uniqid(time() . '_', true) . '.' . $this->imageFile->extension;

        // faylni saqlash
        if ($this->imageFile->saveAs($uploadPath . $fileName)) {
            $this->image = $fileName; // DBdagi image ustuniga fayl nomi yoziladi
            return true;
        }

        // agar saqlash muvaffaqiyatsiz bo'lsa, xato qaytaramiz
        return false;
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
