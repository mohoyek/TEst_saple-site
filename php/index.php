<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($siteTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($siteDescription); ?>">
    <meta name="keywords" content="تیر بتنی برق,تیر بتنی,تولید تیر بتنی,شبکه توزیع برق,سازه افزار فتح">
    <meta name="author" content="<?php echo htmlspecialchars($company['name']); ?>">
    <link rel="canonical" href="<?php echo $siteUrl; ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($siteTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($siteDescription); ?>">
    <meta property="og:url" content="<?php echo $siteUrl; ?>">
    <meta property="og:siteName" content="<?php echo htmlspecialchars($company['name']); ?>">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:type" content="website">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-primary: #17212b;
            --color-secondary: #3d4a54;
            --color-concrete: #8a9095;
            --color-bg: #f5f6f7;
            --color-white: #ffffff;
            --color-accent: #e5a623;
        }
        body { font-family: 'Vazirmatn', Tahoma, sans-serif; }
        .technical-grid {
            background-image:
                linear-gradient(to left, rgba(229, 166, 35, 0.16) 1px, transparent 1px),
                linear-gradient(to top, rgba(229, 166, 166, 0.16) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .container-site {
            width: 100%;
            max-width: 1280px;
            margin-inline: auto;
            padding-inline: 1.25rem;
        }
        @media (min-width: 1024px) {
            .container-site { padding-inline: 2.5rem; }
        }
    </style>
</head>
<body class="bg-[var(--color-bg)] text-[var(--color-primary)] antialiased font-sans">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[100] focus:bg-[var(--color-primary)] focus:text-white focus:px-4 focus:py-2 focus:rounded-sm">
        رفتن به محتوای اصلی
    </a>

    <?php include __DIR__ . '/components/header.php'; ?>

    <main id="main-content">
        <?php include __DIR__ . '/components/hero.php'; ?>
        <?php include __DIR__ . '/components/stats.php'; ?>
        <?php include __DIR__ . '/components/about_intro.php'; ?>
        <?php include __DIR__ . '/components/products.php'; ?>
        <?php include __DIR__ . '/components/services.php'; ?>
        <?php include __DIR__ . '/components/production_process.php'; ?>
        <?php include __DIR__ . '/components/quality_control.php'; ?>
        <?php include __DIR__ . '/components/projects.php'; ?>
        <?php include __DIR__ . '/components/why_us.php'; ?>
        <?php include __DIR__ . '/components/about_company.php'; ?>
        <?php include __DIR__ . '/components/cta.php'; ?>
        <?php include __DIR__ . '/components/contact.php'; ?>
        <?php include __DIR__ . '/components/map.php'; ?>
    </main>

    <?php include __DIR__ . '/components/footer.php'; ?>
    <?php include __DIR__ . '/components/floating_contact.php'; ?>
    <?php include __DIR__ . '/components/organization_schema.php'; ?>
</body>
</html>