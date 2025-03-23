<?php
return $routes =[
    ['uri' => '/', 'verb' => 'GET', 'action' => [Mvc\Controllers\PageController::class, 'welcome']],
    ['uri' => '/loss/create', 'verb' => 'GET', 'action' => [Mvc\Controllers\LostController::class, 'create']],
    ['uri' => '/loss', 'verb' => 'POST', 'action' => [Mvc\Controllers\LostController::class, 'store']],
    ['uri' => '/loss', 'verb' => 'GET', 'action' => [Mvc\Controllers\LostController::class, 'show']],
];
