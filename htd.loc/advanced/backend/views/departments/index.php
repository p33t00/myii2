<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dept_id',
            // the array below is used to add a search field for branch_id field
            // Also need to remark DepartmentsSearch model. (see the model)
            [
                'attribute' => 'branch_id',
                'value' => 'branch.branch_name'
            ],
//            'branch.branch_name',
            'dept_name',
            'company.company_name',
            'dept_created_date',
            // 'dept_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
