<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string|null $cust_no
 * @property string|null $company
 * @property int|null $account_id
 * @property string|null $contact
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $price_level
 * @property int|null $inactive
 * @property int $sales_person_id
 *
 * @property Order[] $orders
 * @property SalesPerson $salesPerson
 * @property ValueCustomer[] $valueCustomers
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id', 'inactive', 'sales_person_id'], 'integer'],
            [['sales_person_id'], 'required'],
            [['cust_no', 'company', 'contact', 'phone', 'email', 'price_level'], 'string', 'max' => 255],
            [['sales_person_id'], 'exist', 'skipOnError' => true, 'targetClass' => SalesPerson::className(), 'targetAttribute' => ['sales_person_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cust_no' => 'Cust No',
            'company' => 'Company',
            'account_id' => 'Account ID',
            'contact' => 'Contact',
            'phone' => 'Phone',
            'email' => 'Email',
            'price_level' => 'Price Level',
            'inactive' => 'Inactive',
            'sales_person_id' => 'Sales Person ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[SalesPerson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesPerson()
    {
        return $this->hasOne(SalesPerson::className(), ['id' => 'sales_person_id']);
    }

    /**
     * Gets query for [[ValueCustomers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getValueCustomers()
    {
        return $this->hasMany(ValueCustomer::className(), ['customer_id' => 'id']);
    }
}
