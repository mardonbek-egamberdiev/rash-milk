<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "applicants".
 *
 * @property int $id
 * @property int $vacancy_id
 * @property string $full_name
 * @property string $phone
 * @property string|null $address
 * @property string|null $where_get_from
 * @property string|null $image
 * @property int $created_at
 * @property int $status
 *
 * @property Vacancies $vacancy
 */
class Applicants extends \yii\db\ActiveRecord
{   
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public $verifyCode; // Captcha maydoni

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'full_name', 'phone'], 'required'],
            [['vacancy_id', 'created_at', 'status'], 'integer'],
            ['phone', 'string', 'length' => 13, 'message' => Yii::t('app', 'Phone number must be exactly 13 characters')],
            [['full_name', 'address', 'where_get_from', 'image'], 'string', 'max' => 255],

            // ✅ Fayl yuklash qoidasi
            ['imageFile', 'file', 
                'skipOnEmpty' => true,
                'extensions' => ['png', 'jpg', 'jpeg', 'gif'],
                'maxSize' => 2 * 1024 * 1024, // 2MB
                'tooBig' => Yii::t('app', 'Max file size is 2MB'),
                'wrongExtension' => Yii::t('app', 'Only {extensions} files are allowed'),
            ],

            // ✅ Captcha
            ['verifyCode', 'captcha', 'captchaAction' => 'site/captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vacancy_id' => Yii::t('app', 'Vacancy ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'where_get_from' => Yii::t('app', 'Where Get From'),
            'image' => Yii::t('app', 'Image File'),
            'imageFile' => Yii::t('app', 'Image File'),
            'verifyCode' => Yii::t('app', 'Verify Code'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Vacancy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancies::class, ['id' => 'vacancy_id']);
    }

}
