<?php session_start(); ob_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

#Load All Config
define('_VIEW_', __DIR__ .'/../App/Views');

#Config DIR Public
define('_PUBLIC_PATH_', substr($_SERVER['DOCUMENT_ROOT'], 0, -1));


$config = [
    'Route', 'DB', 'Function'
];

#Load all file in folder Config
foreach ($config as $config) {
    include $config . '.php';
}