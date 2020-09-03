<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%currency}}`.
 */
class m200903_212700_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'rate' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
