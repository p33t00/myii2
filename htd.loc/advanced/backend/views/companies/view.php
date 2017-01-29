<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'company_id',
            'company_name',
            'company_email:email',
            'company_address',
            'company_created_date',
            'company_status',
            [
                'attribute' => 'logo',
                'header' => 'Image',
                'format' => 'raw',
//                'value' => Html::img(Yii::getAlias('@web').'/'.$model->logo, ['height'=>'50px', 'width'=>'50px'])
                'value' => Html::img('@web/'.$model->logo, ['height'=>'50px', 'width'=>'50px'])
            ],
        ],
    ]) ?>
<!--    --><?//= Html::img(Yii::$app->request->baseUrl.'/'.$model->logo, ['alt' => 'Company Logo', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']);?>
</div>
