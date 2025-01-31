<?php

/** @var yii\web\View $this */

$this->title = 'Driver and Vehicle Management';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome to Driver and Vehicle Management</h1>

        <p class="lead">Manage your fleet of vehicles, assign drivers, and track routes effortlessly.</p>
        <?php if (Yii::$app->user->can('readvehicle')): ?>

            <p><a class="btn btn-lg btn-primary" href="<?= \yii\helpers\Url::to(['/vehicle/index']) ?>">Manage Drivers</a></p>



    </div>
<?php endif; ?>

</div>

<div class="body-content">

    <div class="row">
        <?php if (Yii::$app->user->can('readvehicle')): ?>
            <div class="col-lg-6">
                <h2>Vehicle Management</h2>

                <p>Efficiently manage your fleet of vehicles. Add, edit, or remove vehicles from your system with ease. Keep track of vehicle details, maintenance, and assignment status.</p>

                <p><a class="btn btn-lg btn-primary" href="<?= \yii\helpers\Url::to(['/vehicle/index']) ?>">Manage Drivers</a></p>

            </div>
        <?php endif; ?>

        <?php if (Yii::$app->user->can('readRoute')): ?>
            <div class="col-lg-6">
                <h2>Route Assignment</h2>

                <p>Assign routes to vehicles and drivers, ensuring optimal scheduling. Monitor the status of routes, and track deliveries in real-time for increased efficiency.</p>

                <p><a class="btn btn-lg btn-primary" href="<?= \yii\helpers\Url::to(['/route/index']) ?>">Manage Drivers</a></p>

            </div>
        <?php endif; ?>


    </div>

</div>
</div>