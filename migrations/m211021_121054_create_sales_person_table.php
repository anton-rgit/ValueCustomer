<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sales_person}}`.
 */
class m211021_121054_create_sales_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sales_person}}', [
            'id' => $this->primaryKey(),
            'sales_no' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sales_person}}');
    }
}
