<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_person".
 *
 * @property int $id
 * @property string|null $sales_no
 *
 * @property Customer[] $customers
 */
class SalesPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sales_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sales_no' => 'Sales No',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['sales_person_id' => 'id']);
    }
}
