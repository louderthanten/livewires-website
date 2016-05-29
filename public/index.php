<?php

switch ($_SERVER['SERVER_NAME']) {
  case "localhost:3000":
    define('CRAFT_ENVIRONMENT', 'LOCAL');
    break;
  case "livewires.dev":
    define('CRAFT_ENVIRONMENT', 'LOCAL');
    break;
  case "dev.livewires.io":
    define('CRAFT_ENVIRONMENT', 'DEV');
    break;
  default:   // Covers "www" and non-"www"
    define('CRAFT_ENVIRONMENT', 'PRODUCTION');
    break;
}

// Path to your craft/ folder
$craftPath = '../craft';

// Do not edit below this line
$path = rtrim($craftPath, '/').'/app/index.php';

if (!is_file($path))
{
	if (function_exists('http_response_code'))
	{
		http_response_code(503);
	}

	exit('Could not find your craft/ folder. Please ensure that <strong><code>$craftPath</code></strong> is set correctly in '.__FILE__);
}

require_once $path;
