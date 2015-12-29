<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property integer $id
 * @property string $name
 * @property string $images
 * @property string $facebook
 * @property string $fanpagefb
 * @property string $skype
 * @property string $email
 * @property string $phonenumber
 * @property string $andress
 * @property string $description
 * @property string $website
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'images', 'facebook', 'fanpagefb', 'skype', 'email', 'phonenumber', 'andress', 'website'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'images' => 'Images',
            'facebook' => 'Facebook',
            'fanpagefb' => 'Fanpagefb',
            'skype' => 'Skype',
            'email' => 'Email',
            'phonenumber' => 'Phonenumber',
            'andress' => 'Andress',
            'description' => 'Description',
            'website' => 'Website',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
