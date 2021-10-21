<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%value_customer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%customer}}`
 */
class m211021_121655_create_value_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%value_customer}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `customer_id`
        $this->createIndex(
            '{{%idx-value_customer-customer_id}}',
            '{{%value_customer}}',
            'customer_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-value_customer-customer_id}}',
            '{{%value_customer}}',
            'customer_id',
            '{{%customer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%customer}}`
        $this->dropForeignKey(
            '{{%fk-value_customer-customer_id}}',
            '{{%value_customer}}'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            '{{%idx-value_customer-customer_id}}',
            '{{%value_customer}}'
        );

        $this->dropTable('{{%value_customer}}');
    }
}
