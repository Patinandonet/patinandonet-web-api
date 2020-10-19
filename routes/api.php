<?php

/* @var $router \Illuminate\Support\Facades\Route */

$router->get('/get-activities-table-format', function () use ($router) {
    return (new \App\Activities\ActivitiesTableFormat())->get();
});

$router->get('/get-activity-types', function () use ($router) {
    return (new \App\Activities\Type())->all();
});

$router->get('/get-levels-by-type', function () use ($router) {
    return (new \App\Activities\Level())->getLevelsByType();
});

$router->get('/get-active-zones', function () use ($router) {
    return (new \App\Activities\Zone())->getActiveZones();
});
