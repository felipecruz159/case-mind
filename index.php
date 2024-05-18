<?php
require __DIR__.'/vendor/autoload.php';

session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['senha'])){
    include_once __DIR__.'/includes/header.php';
    include_once __DIR__.'/page/sistema.php';
    include_once __DIR__.'/includes/footer.php';
} 
else {
    include_once __DIR__.'/page/login.php';
}
