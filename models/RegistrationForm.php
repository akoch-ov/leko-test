<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegistrationForm is the model behind the contact form.
 */
class RegistrationForm extends User
{
    public $password;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['nickname', 'email', 'password'], 'required', 'message' => '{attribute} не может быть пустым'],
            [['nickname', 'first_name', 'last_name'], 'string', 'max' => 127],
            ['email', 'string', 'max' => 255],
            ['email', 'email', 'message' => 'Введите валидный email-адрес'],
            ['nickname', 'unique', 'message' => 'Человек с таким никнеймом уже зарегистрирован'],
            ['email', 'unique', 'message' => 'На этот ящик уже зарегистрирован аккаунт'],
            ['nickname', 'match', 'pattern' => '/^[a-z]\w*$/i'],
            [['first_name', 'last_name'], 'match', 'pattern' => '/^[а-я]*$/i', 'message' => 'Допускаются только русские буквы'],
            ['password', 'string', 'min' => 5, 'tooShort' => 'Пожалуйста, выдумайте пароль длиннее 5 символов']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'nickname' => 'Никнэйм',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

    public function registration()
    {
        if ($this->validate()) {
            $this->hash = Yii::$app->security->generatePasswordHash($this->password);
            return $this->save();
        }
        return false;
    }
}
