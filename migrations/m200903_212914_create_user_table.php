<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200903_212914_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password' => $this->string(),
            'auth_key' => $this->string(32),
            'access_token' => $this->string()->notNull()->unique(),
        ]);
        $this->batchInsert('{{%user}}', ['access_token'],[['uwyenxr7ncre7ngt']]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
