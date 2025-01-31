<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Route;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var backend\models\Vehicle $model */
/** @var yii\widgets\ActiveForm $form */


// Fetch users with "driver" role
// $drivers = ArrayHelper::map(
//     User::find()->joinWith('authAssignments')->where(['auth_assignment.item_name' => 'Driver'])->all(),
//     'id',
//     'username' // Adjust to the attribute you want to display
// );

?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'registration_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'year')->textInput() ?>
    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'route_id')->dropDownList(
        ArrayHelper::map(Route::find()->all(),'id','route_name'),
        ['prompt'=>'Select Route Name']
    ) ?>

<?= $form->field($model, 'user_id')->dropDownList(
    ArrayHelper::map(
        User::find()->where(['id' => Yii::$app->authManager->getUserIdsByRole('driver')])->all(),
        'id',
        'username' // Change this if you need a different attribute
    ),
    ['prompt' => 'Select a Driver']
) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

