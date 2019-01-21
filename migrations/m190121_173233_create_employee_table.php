<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee`.
 */
class m190121_173233_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'birthday' => $this->string(100),
            'date' => $this->string(100),
            'nic' => $this->string(12),
            'mobile' => $this->char(10),
            'land' => $this->char(10),
            'designation_id' => $this->integer(11)->notNull(),
            'description' => $this->text(),
            'date' => $this->dateTime()

        ]);
        $this->execute("set foreign_key_checks=0;");
        $this->addForeignKey(
            'fk-employee-designation_id',
            'employee',
            'designation_id',
            'designation',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->execute("set foreign_key_checks=1;");
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //before delete need to fk drop
        $this->execute("set foreign_key_checks=0;");
        $this->dropForeignKey(
            'fk-employee-designation_id',
            'employee'
        );

        $this->execute("set foreign_key_checks=1;");
        $this->dropTable('employee');
    }
}
