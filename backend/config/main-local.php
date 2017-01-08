<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bwaDJtdThVWzhpOzrZ0WDB8zn6WUG2GR',
        ],
         'urlManager' => [
    //     'enablePrettyUrl' => true,
    //     'enableStrictParsing' => true,
        'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'post'],
            ],
     ],
    ],

     'modules' => [
        'api' => [
            'class' => 'common\module\api\Module',
        ],
    ],
    
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
