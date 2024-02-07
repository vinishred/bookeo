<?php
    // On crée un raccourci avec une constante qui représente ma direction racine de mon site
    define('_ROOTPATH_', __DIR__);
    
    //On fait un autoload pour utiliser nos namespace
    spl_autoload_register();
    

    use App\Controller\Controller;

    $controller = new Controller();
    $controller->route();
?>
