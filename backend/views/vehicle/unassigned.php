<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Vehicle $model */

$this->title = 'No Vehicle Assigned';
?>

<div class="container text-center">
    <div class="alert alert-warning mt-5">
        <h1 class="display-4">No Vehicle Assigned</h1>
        <p class="lead">It seems you currently don't have any vehicle assigned to you. Please check back later or contact your administrator for assistance.</p>
    </div>
    
    <div class="mt-4">
        <p>If you think this is an error, feel free to reach out to the admin team or visit the <a href="<?= Yii::$app->homeUrl ?>" class="btn btn-primary">Homepage</a>.</p>
    </div>
    
    <div class="mt-5">
        <h3>Possible Actions:</h3>
        <ul class="list-group">
            <li class="list-group-item">Wait for an assignment to be made by the admin.</li>
            <li class="list-group-item">Contact the admin directly for an update.</li>
            <li class="list-group-item">Check your email for notifications regarding vehicle assignments.</li>
        </ul>
    </div>
</div>

