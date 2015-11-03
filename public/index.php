<?php

use Symfony\Component\Yaml\Parser;

/**
 * Site configuration
 */
require_once('../app/config/site-config.php');

/**
 * Composer's autoloader
 */
$loader = require_once('../vendor/autoload.php');

/**
 * Routing
 */
// Init router
$router = new AltoRouter();
//$routes = json_decode(file_get_contents("../app/config/routes.json"));
$yaml = new Parser();
$routes = $yaml->parse(file_get_contents("../app/config/routes.yaml"));
foreach ($routes as $name => $route) {
	$router->map($route['method'], $route['route'], array('c' => $route['controller'], 'a' => $route['action']), $name);
}

// Match current request
$match = $router->match();
if ($match && method_exists($match['target']['c'], $match['target']['a'])) {
	$controller = new $match['target']['c'];
	call_user_func_array(array($controller, $match['target']['a']), $match['params']);
}
else {
	// No route was matched
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}