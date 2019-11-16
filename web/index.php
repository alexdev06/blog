<?php
const DEFAULT_APP = 'Frontend';

if (!isset($_GET['app']) || !file_exists(__DIR__.'/../src/App/'.$_GET['app'])) {
    $_GET['app'] = DEFAULT_APP;
}

require_once '../vendor/autoload.php';

$appClass = '\\ADABlog\\App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();