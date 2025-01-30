<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Route $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="route-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'route_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'distance')->textInput() ?>

    <?= $form->field($model, 'peak_hours_rate')->textInput() ?>

    <?= $form->field($model, 'off_peak_hours_rate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
