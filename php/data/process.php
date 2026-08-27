<?php

return [
    'ProcessStep' => [
        [
            'id' => 'raw-materials',
            'icon' => 'PackageSearch',
            'number' => '۰۱',
            'title' => 'بررسی مواد اولیه',
            'description' => 'بررسی کیفیت سیمان، سنگدانه و آب قبل از ورود به خط تولید.',
        ],
        [
            'id' => 'mixing',
            'icon' => 'GitCommitVertical',
            'number' => '۰۲',
            'title' => 'مخلو طی بتن',
            'description' => 'ترکیب مواد اولیه در نسامی‌های مخصوص با نسا‌ی مناسب.',
        ],
        [
            'id' => 'casting',
            'icon' => 'Layers',
            'number' => '۰۳',
            'title' => 'ریخت‌گیری',
            'description' => 'ریخت‌گیری بتن در قالب‌های استاندارد و سفارشی.',
        ],
        [
            'id' => 'vibration',
            'icon' => 'Waves',
            'number' => '۰۴',
            'title' => 'لرزاندن بتن',
            'description' => 'استفاده از ویبراتورهای الکتریکی برای حذف هوا و یکنواختی بتن.',
        ],
        [
            'id' => 'curing',
            'icon' => 'ThermometerSun',
            'number' => '۰۵',
            'title' => 'سینگی بتن',
            'description' => 'فرآیند سینگی کنترل‌شده برای رسیدن به مقاومت نهایی بتن.',
        ],
        [
            'id' => 'quality-check',
            'icon' => 'ClipboardCheck',
            'number' => '۰۶',
            'title' => 'کنترل نهایی',
            'description' => 'بررسی فنی نهایی و بسته‌بندی محصول برای تحویل.',
        ],
    ],
];