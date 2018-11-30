<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181130_073043_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'nickname' => $this->string(127)->notNull()->comment('никнэйм'),
            'first_name' => $this->string(127)->comment('имя'),
            'last_name' => $this->string(127)->comment('фамилия'),
            'email' => $this->string(255)->notNull()->comment('электронная почта'),
            'hash' => $this->string(255)->notNull()->comment('хэш пароля')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
