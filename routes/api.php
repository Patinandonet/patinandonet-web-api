<?php

/* @var $router \Illuminate\Support\Facades\Route */
$router->get('/get-activities-table-format', function () use ($router) {
    return (new \App\Activities\ActivitiesTableFormat())->get();
});
