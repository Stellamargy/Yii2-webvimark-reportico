<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        // I am no longer using the inbuilt user component for usermanagement
        //I am using the  webvimark/module-user-management for usermanagement
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',

            // Comment this if you don't want to record user logins
            'on afterLogin' => function ($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }

        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
        
    ],
    'params' => $params,
    'modules'=>[
	'user-management' => [
		'class' => 'webvimark\modules\UserManagement\UserManagementModule',

		// 'enableRegistration' => true,
      

		// Add regexp validation to passwords. Default pattern does not restrict user and can enter any set of characters.
		// The example below allows user to enter :
		// any set of characters
		// (?=\S{8,}): of at least length 8
		// (?=\S*[a-z]): containing at least one lowercase letter
		// (?=\S*[A-Z]): and at least one uppercase letter
		// (?=\S*[\d]): and at least one number
		// $: anchored to the end of the string

		//'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',
		

		// Here you can set your handler to change layout for any controller or action
		// Tip: you can use this event in any module
		'on beforeAction'=>function(yii\base\ActionEvent $event) {
				if ( $event->action->uniqueId == 'user-management/auth/login' )
				{
					$event->action->controller->layout = 'loginLayout.php';
				};
			},
	],

    // reportico module 
    'reportico' => [
        'class' => 'reportico\reportico\Module' ,
        'controllerMap' => [
                        'reportico' => 'reportico\reportico\controllers\ReporticoController',
                        'mode' => 'reportico\reportico\controllers\ModeController',
                        'ajax' => 'reportico\reportico\controllers\AjaxController',
                    ]
        ],
],

];
