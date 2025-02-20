<?php

use backend\models\Vehicle;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\models\VehileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">

    <h1 class="fs-2"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vehicle', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'registration_number',
            'make',
            'model',
            // 'year',
            //'color',
            //'type',
            //'capacity',
            // 'route_id',
            [
                'attribute' => 'user_id',
                'label' => 'Driver',
                'value' => function ($model) {
                    return $model->user ? $model->user->username : "Unassigned";
                }
            ],
            
            [
                'attribute' => 'route_id',
                'label' => 'Route Name',
                'value' => function ($model) {
                    return $model->route ?  $model->route->route_name : "Route Unassigned";
                }
            ],
            'user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vehicle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
