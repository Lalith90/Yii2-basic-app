<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 *
 */
class m190121_150554_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*need to create database filed in this migrate file including foreign key*/
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->String(255)->unique()->notNull(),
            'password' => $this->String(255)->notNull(),
            'authKey' => $this->String(255),
            'accessToken' => $this->String(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
