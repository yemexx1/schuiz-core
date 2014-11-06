<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// define path to assets
Yii::setPathOfAlias('assets', realpath(dirname(__FILE__) . '/../../assets'));

// check environment dev or production
//echo getenv("SERVER_SOFTWARE");
if (strpos(getenv("SERVER_SOFTWARE"), 'Development') === 0) {
    define('ENV_DEV', true); // we are on development machine
} else {
    define('ENV_DEV', false); // we are on production server
}


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'SCHUIZ',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'Enter Your Password Here',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'demo' // Yii on Google App Engine demo module
    ),

    // application components
    'components' => array(
        'assetManager' => array(
            // This is special Asset Manger which can work under Google App Engine
            'class' => 'application.components.CGAssetManager',
            // CHANGE THIS: Enter here your own Google Cloud Storage bucket name Google App Engine
            'basePath' => ENV_DEV
                    ? Yii::getPathOfAlias('assets') // basePath for development version, assets path alias was defined above
                    : 'gs://yii-assets', // basePath for production version
            // CHANGE THIS: All files on Google Cloud Storage can be accessed via the URL below,
            // note the bucket name at the end, should be the same as in basePath above
            'baseUrl' => ENV_DEV
                    ? '/assets' // baseUrl for development App Engine
                    : 'http://commondatastorage.googleapis.com/yii-assets' // baseUrl for production App Engine

        ),
        'request' => array(
            'baseUrl' => '/',
            'scriptUrl' => '/',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'baseUrl' => '', // added to fix URL issues under Google App Engine
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => ENV_DEV
                    ? 'mysql:host=localhost;dbname=schuiz'
                    : 'mysql:unix_socket=/cloudsql/schuiz-core:cloud-instance;dbname=schuiz;charset=utf8',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => ENV_DEV ? '' : '',
            'charset' => 'utf8',
            'class' => 'CDbConnection'
        ),


        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
//					'class'=>'CFileLogRoute', // default
                    'class' => 'CSyslogRoute', // log errors to syslog (supported by Google App Engine)
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);