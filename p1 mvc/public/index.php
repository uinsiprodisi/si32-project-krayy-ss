<?php
require_once __DIR__ . '/../config/config.php';

require_once BASE_PATH . '/app/Controllers/HomeController.php';

$controller = new HomeController();
$controller->index();