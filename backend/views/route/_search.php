<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\RouteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="route-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'route_name') ?>

    <?= $form->field($model, 'route_description') ?>

    <?= $form->field($model, 'distance') ?>

    <?= $form->field($model, 'peak_hours_rate') ?>

    <?php // echo $form->field($model, 'off_peak_hours_rate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
