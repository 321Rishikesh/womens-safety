<?php

declare(strict_types=1);

$_SERVER['SCRIPT_FILENAME'] = __DIR__.'/../public/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/../public') ?: __DIR__.'/../public';

require __DIR__.'/../public/index.php';
