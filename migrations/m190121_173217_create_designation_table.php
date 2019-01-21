<?php

use yii\db\Migration;

/**
 * Handles the creation of table `designation`.
 */
class m190121_173217_create_designation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('designation', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('designation');
    }
}
