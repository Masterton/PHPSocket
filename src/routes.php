<?php
// Routes

$sub_apps = require __DIR__ . '/apps/entry.php';

foreach ($sub_apps as $key => $sub_app) {
    $prefix = $sub_app['prefix'];
    $urls = $sub_app['urls'];
    foreach ($urls as $url => $action) {
        foreach ($action as $method => $content) {
            $handler = $content['handler'];
            $route = $prefix . $url;
            $id = null;
            switch (strtolower($method)) {
                case 'get':
                    $app->get($route, $handler);
                    break;
                case 'post':
                    $app->post($route, $handler);
                    break;
                case 'put':
                    $app->put($route, $handler);
                    break;
                case 'delete':
                    $app->delete($route, $handler);
                    break;
                case 'head':
                    $app->head($route, $handler);
                    break;
                case 'patch':
                    $app->patch($route, $handler);
                    break;
                case 'options':
                    $app->options($route, $handler);
                    break;
                # --------------------------------------------
                case 'any':
                    $app->any($route, $handler);
                    break;
                case 'map':
                    if(array_key_exists('methods', $content)) {
                        $methods = $content['methods'];
                        if(!empty($methods)) {
                            $methods = array_map('strtoupper', $methods);
                            $app->map($methods, $route, $handler);
                        }
                        else {
                            echo 'map method need methods with not empty';
                        }
                    }
                    else {
                        echo 'map method need methods';
                    }
                    break;
                default:
                    # code...
                    echo 'http request method not support';
                    break;
            }
        }
    }
}