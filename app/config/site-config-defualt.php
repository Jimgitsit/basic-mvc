<?php

define('ENV', 'dev'); // dev or prod
define('BASE_URL', 'http://acme.com');
define('BASE_PATH', dirname(dirname(dirname(__FILE__))));

/** Twig */
define('TWIG_CACHE_DIR', BASE_PATH . '/app/cache/twig');
define('TWIG_TEMPLATE_DIR', BASE_PATH . '/app/views');