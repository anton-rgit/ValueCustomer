<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%sales_person}}`
 */
class m211021_121507_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'cust_no' => $this->string(),
            'company' => $this->string(),
            'account_id' => $this->integer(),
            'contact' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'price_level' => $this->string(),
            'inactive' => $this->boolean(),
            'sales_person_id' => $this->integer(),
        ]);

        // creates index for column `sales_person_id`
        $this->createIndex(
            '{{%idx-customer-sales_person_id}}',
            '{{%customer}}',
            'sales_person_id'
        );

        // add foreign key for table `{{%sales_person}}`
        $this->addForeignKey(
            '{{%fk-customer-sales_person_id}}',
            '{{%customer}}',
            'sales_person_id',
            '{{%sales_person}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%sales_person}}`
        $this->dropForeignKey(
            '{{%fk-customer-sales_person_id}}',
            '{{%customer}}'
        );

        // drops index for column `sales_person_id`
        $this->dropIndex(
            '{{%idx-customer-sales_person_id}}',
            '{{%customer}}'
        );

        $this->dropTable('{{%customer}}');
    }
}
