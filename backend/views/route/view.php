<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Route $model */

$this->title = $model->route_name;
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="route-view container my-4">


    <div class="row mb-3">
        <div class="col-12">
            <p class="d-flex justify-content-end">
            <h1 class="text-primary"><?= Html::encode($this->title) ?></h1>
               <div>
               <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary me-2']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
               </div>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Route ID',
                        'value' => $model->id,
                    ],
                    [
                        'label' => 'Route Name',
                        'value' => $model->route_name,
                    ],
                    [
                        'label' => 'Route Description',
                        'value' => $model->route_description,
                    ],
                    [
                        'label' => 'Distance',
                        'value' => $model->distance,
                    ],
                    [
                        'label' => 'Peak Hours Rate',
                        'value' => $model->peak_hours_rate,
                    ],
                    [
                        'label' => 'Off-Peak Hours Rate',
                        'value' => $model->off_peak_hours_rate,
                    ],
                ],
                'options' => ['class' => 'table table-bordered table-striped'],
            ]) ?>
        </div>
    </div>

</div>

