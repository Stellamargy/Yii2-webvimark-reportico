<?php
// use Yii;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use webvimark\modules\UserManagement\components\GhostHtml;
use backend\models\Vehicle;

/** @var yii\web\View $this */
/** @var backend\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profile-form">
   
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['readonly' => true, 'value' => $model->user ? $model->user->id : '']) ?>



    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>


    <?php
        // Fetch the user's roles using Yii2 RBAC
        $authManager = Yii::$app->authManager;
        $roles = $authManager->getRolesByUser($model->user_id); // Get roles for this user
        $roleNames = array_keys($roles); // Extract role names from the roles array
        $userRole = !empty($roleNames) ? implode(', ', $roleNames) : 'No role assigned';
    ?>
    <?= $form->field($model, 'role')->textInput(['readonly' => true, 'value' => $userRole]) ?>

    <?php
    // Only show 'driver_license_number' field for drivers
    if (Yii::$app->user->can('Driver')): ?>
        <?= $form->field($model, 'driver_license_number')->textInput(['maxlength' => true]) ?>
    <?php endif; ?>
   



    <?php
    // Only show 'admin_area_of_responsibility' for admins (non-drivers)
    if (Yii::$app->user->can('Admin')): ?>
        <?= $form->field($model, 'admin_area_of_responsibility')->textInput(['maxlength' => true]) ?>
    <?php endif; ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>