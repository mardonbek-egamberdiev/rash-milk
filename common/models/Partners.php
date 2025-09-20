<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int $sort_order
 * @property int $status
 */
class Partners extends \yii\db\ActiveRecord
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
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
            [['name'], 'required'],
            [['sort_order', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'skipOnEmpty' => true],
        ];
    }
    public function upload()
    {
        if ($this->imageFile) {
            $fileName = uniqid() . '.' . $this->imageFile->extension;
            $path = Yii::getAlias('@frontend/web/partners/') . $fileName;

            // eski rasmni o‘chirish
            if ($this->image && file_exists(Yii::getAlias('@frontend/web/partners/') . $this->image)) {
                unlink(Yii::getAlias('@frontend/web/partners/') . $this->image);
            }

            if ($this->imageFile->saveAs($path)) {
                $this->image = $fileName;
                return true;
            }
        }
        return false;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

}
