<?php

namespace app\commands;

use app\models\Customer;
use app\models\Order;
use app\models\SalesPerson;
use yii\console\Controller;

class TestDataController extends Controller
{
    public function actionFill()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $salesPerson = new SalesPerson();
            $salesPerson->sales_no = \Yii::$app->security->generateRandomString(8);
            $salesPerson->save();
        }

        for ($i = 0; $i < 1000; $i++) {
            $customer = new Customer();
            $customer->cust_no = \Yii::$app->security->generateRandomString(8);
            $customer->company = $faker->company;
            $customer->phone = $faker->phoneNumber;
            $customer->sales_person_id = rand(1, 98);
            $customer->save();
        }

        for ($i = 0; $i < 50; $i++) {
            $order = new Order();
            $order->order_no = \Yii::$app->security->generateRandomString(8);
            $order->completed = $faker->date . ' ' . $faker->time;
            $order->customer_id = rand(1, 998);
            $order->save();
        }
    }
}