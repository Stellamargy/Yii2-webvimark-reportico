<?php
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use backend\models\Vehicle;

$userId = Yii::$app->user->id;
$vehicle = Vehicle::find()->where(['user_id' => $userId])->one();
$vehicleUrl =$vehicle ? ['/vehicle/view', 'id' => $vehicle->id]:['/vehicle/vehicle'];

$menuItems = [
    [
        'label' => '<i class="fas fa-users"></i> ' . UserManagementModule::t('back', 'Users'),
        'url' => ['/user-management/user/index'],
    ],
    [
        'label' => '<i class="fas fa-user-shield"></i> ' . UserManagementModule::t('back', 'Roles'),
        'url' => ['/user-management/role/index'],
    ],
    [
        'label' => '<i class="fas fa-key"></i> ' . UserManagementModule::t('back', 'Permissions'),
        'url' => ['/user-management/permission/index'],
    ],
    [
        'label' => '<i class="fas fa-layer-group"></i> ' . UserManagementModule::t('back', 'Permission groups'),
        'url' => ['/user-management/auth-item-group/index'],
    ],
    // [
    //     'label' => '<i class="fas fa-history"></i> ' . UserManagementModule::t('back', 'Visit log'),
    //     'url' => ['/user-management/user-visit-log/index'],
    // ],
];

$customMenuItems = [
    [
        'label' => '<i class="fas fa-route"></i> Routes',
        'url' => ['/route/index'],
        'visible' => Yii::$app->user->can('readRoute'),
    ],
    [
        'label' => '<i class="fas fa-car"></i> Vehicles',
        'url' => ['/vehicle/index'],
        'visible' => Yii::$app->user->can('readVehicle'),
    ],
    [
        'label' => '<i class="fas fa-truck"></i> Assigned Vehicle',
        'url' => $vehicleUrl,
        'visible' => Yii::$app->user->can('viewAssignedVehicle'),
    ],
];
?>




<div class="aside bg-light p-3">
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?= GhostMenu::widget([
                'encodeLabels' => false,
                'activateParents' => true,
                'options' => ['class' => 'navbar-nav w-100 d-flex flex-column'],
                'items' => [
                    [
                        'label' => '<strong>User Management</strong>',
                        'options' => ['class' => 'nav-item dropdown-header'],
                        'items' => $menuItems,
                    ],
                    [
                        'label' => '<strong>Menu</strong>',
                        'options' => ['class' => 'nav-item dropdown-header'],
                        'items' => $customMenuItems,
                    ],
                ],
            ]) ?>
        </div>
    </nav>
</div>

