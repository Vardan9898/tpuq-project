<?php

use Illuminate\Support\Facades\Route;

/**
 * @param  $routes
 * @param  string  $output
 * @return string
 */
function active_route($routes, string $output = 'active')
{
    if (is_array($routes)) {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    } elseif (strpos(Route::currentRouteName(), $routes) === 0) {
        return $output;
    }

    return '';
}
