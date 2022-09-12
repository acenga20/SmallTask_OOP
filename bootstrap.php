<?php
require_once __DIR__.'/lib/Service/Container.php';
require_once __DIR__.'/lib/Service/UserLoader.php';
require_once __DIR__.'/lib/Service/UserManager.php';
require_once __DIR__.'/lib/Service/UserStorageInterface.php';
require_once __DIR__.'/lib/Service/PdoUserStorage.php';
require_once __DIR__.'/lib/Model/Person.php';


$configuration = array(
    'db_dsn'=> 'mysql:host=localhost;dbname=small_task_db',
    'db_user'=> 'root',
    'db_pass'=> null
);