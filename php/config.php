<?php
// config.php - Load all data files
$company = require_once __DIR__ . '/../php/data/company.php';
$stats = require_once __DIR__ . '/../php//data/stats.php';
$services = require_once __DIR__ . '/../php//data/services.php';
$products = require_once __DIR__ . '/../php//data/products.php';
$projects = require_once __DIR__ . '/../php//data/projects.php';
$process = require_once __DIR__ . '/../php//data/process.php';
$quality = require_once __DIR__ . '/../php//data/quality.php';
$navigation = require_once __DIR__ . '/../php//data/navigation.php';

$siteUrl = 'https://sazehafzar.com';
$siteTitle = $company['name'] . ' | تولیدکننده تیرهای بتنی برق';
$siteDescription = 'تولید و تأمین انواع تیرهای بتنی مورد استفاده در شبکه‌های برق، پروژه‌های عمرانی و شبکه‌های توزیع نیروی برق.';