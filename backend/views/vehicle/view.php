<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Vehicle $model */

$this->title = $model->registration_number;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehicle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'registration_number',
            'make',
            'model',
            'year',
            'color',
            'type',
            'capacity',
            // 'route_id',
            // 'user_id',
            [
                'label' => 'Route Name',
                'value' => $model->route ? $model->route->route_name : 'N/A', // assuming 'name' is the route's name field
            ],
            [
                'label' => 'Driver Username',
                'value' => $model->user ? $model->user->username : 'N/A', // assuming 'username' is the user's username field
            ],
        ],
    ]) ?>

</div>
