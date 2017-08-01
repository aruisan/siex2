<?php
		//require_once '../.././vendor/autoload.php';

		require_once  dirname(__DIR__) . '../.././\vendor\autoload.php';
		$loader = new Twig_Loader_Filesystem('../.././views');
		$twig = new Twig_Environment($loader, []);

?>