<div class='aside '>
    <?php
    echo \yii\bootstrap5\Nav::widget([
        'items' => [
            ['label' => "Admins", 'url' => ['/driver/index'],'linkOptions' => ['class' => 'dropdown-item']],
            ['label' => "Drivers", 'url' => ['/route/index'],'linkOptions' => ['class' => 'dropdown-item']],
            ['label' => "Vehicles", 'url' => ['/vehicle/index'],'linkOptions' => ['class' => 'dropdown-item']],
            ['label' => "Routes", 'url' => ['/driver/index'],'linkOptions' => ['class' => 'dropdown-item']],
            
        ] ,
        'options' => ['class' => 'd-flex flex-column nav-pills ']

    ])
    ?>
</div>