<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cust_no',
            'company',
            'phone',
            [
                'label' => 'Order Id',
                'value' => function ($searchModel) {
                    return !empty($searchModel->orders) ? $searchModel->orders[0]->id : '';
                }
            ],
            [
                'label' => 'Completed',
                'value' => function ($searchModel) {
                    return !empty($searchModel->orders) ? $searchModel->orders[0]->completed : '';
                }
            ],
            [
                'label' => 'Order#',
                'value' => function ($searchModel) {
                    return !empty($searchModel->orders) ? $searchModel->orders[0]->order_no : '';
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
