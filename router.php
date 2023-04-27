<?php declare(strict_types=1);

require 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'GiphyPage\Controllers\GiphyController@search');
    $r->addRoute('GET', '/trending', 'GiphyPage\Controllers\GiphyController@trending');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];

        [$controllerName, $methodName] = explode('@', $handler);
        $controllerName = new $controllerName;

        $collection = $controllerName->{$methodName}();
        break;
}
