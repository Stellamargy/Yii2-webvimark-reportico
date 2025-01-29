<?php

use yii\web\View;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>
<header class="m-0">
    <?php
    NavBar::begin([

        'options' => [
            'class' => 'navbar navbar-expand-lg fixed-top nav-container mb-0',
        ],

    ]);
    $menuItems = [
        [
            'label' => 'Change Password',
            'url' => ['/user-management/auth/change-own-password'],
            'linkOptions' => [
                'data-method' => 'post',
                'class' => ['header-items']
            ],
            'visible' => Yii::$app->user->isGuest ? false : true
        ],

        [
            'label' => 'Log Out (' . Yii::$app->user->identity->username . ')',
            'url' => ['/user-management/auth/logout'],
            'linkOptions' => [
                'data-method' => 'post',
                'class' => ['header-items']
            ],
            'visible' => Yii::$app->user->isGuest ? false : true
        ],



    ];




    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        // 'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);


    NavBar::end();
    ?>
</header>