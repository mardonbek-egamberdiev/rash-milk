<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string|null $phone
 * @property string $body
 * @property int $created_at
 * @property int $status
 */
class Contact extends \yii\db\ActiveRecord
{

    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 0],
            [['name', 'email', 'subject', 'body', 'created_at'], 'required'],
            [['body'], 'string'],
            [['created_at', 'status'], 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'phone' => Yii::t('app', 'Phone'),
            'body' => Yii::t('app', 'Body'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

}
