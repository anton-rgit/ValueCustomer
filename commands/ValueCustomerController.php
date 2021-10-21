<?php

namespace app\commands;

use app\models\Customer;
use app\models\SalesPerson;
use app\models\ValueCustomer;
use yii\console\Controller;

class ValueCustomerController extends Controller
{
    public function actionFillTable()
    {
        $valueCustomersIds = [];
        $salesPersonsIds = SalesPerson::find()->select('id')->column();

        foreach ($salesPersonsIds as $salesPersonsId) {
            $customers = Customer::find()
                ->select('id')
                ->where(['sales_person_id' => $salesPersonsId])
                ->column();

            if (count($customers) > 8) {
                $valueCustomersIds = array_merge($valueCustomersIds, $customers);
            }
        }

        foreach ($valueCustomersIds as $valueCustomersId) {
            $valueCustomer = new ValueCustomer();
            $valueCustomer->customer_id = $valueCustomersId;
            $valueCustomer->save();
        }
    }
}