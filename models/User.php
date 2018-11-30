<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $nickname никнэйм
 * @property string $first_name имя
 * @property string $last_name фамилия
 * @property string $email электронная почта
 * @property string $hash хэш пароля
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname', 'email', 'hash'], 'required'],
            [['nickname', 'first_name', 'last_name'], 'string', 'max' => 127],
            [['email', 'hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'никнэйм',
            'first_name' => 'имя',
            'last_name' => 'фамилия',
            'email' => 'электронная почта',
            'hash' => 'хэш пароля',
        ];
    }
}
