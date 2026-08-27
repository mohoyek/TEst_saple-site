<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $position = trim($_POST['position'] ?? '');
    $resume = trim($_POST['resume'] ?? '');
    $coverLetter = trim($_POST['coverLetter'] ?? '');

    if ($name === '') {
        $errors['name'] = 'نام و نام خانوادگی را وارد کنید.';
    }
    if ($phone === '') {
        $errors['phone'] = 'شماره تماس را وارد کنید.';
    } elseif (!preg_match('/^0\d{9,10}$/', $phone)) {
        $errors['phone'] = 'شماره تماس معتبر نیست.';
    }
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'ایمیل معتبر نیست.';
    }
    if ($position === '') {
        $errors['position'] = 'سمت شغلی را وارد کنید.';
    }
    if ($coverLetter === '') {
        $errors['coverLetter'] = 'متن پیام را وارد کنید.';
    } elseif (mb_strlen($coverLetter) < 10) {
        $errors['coverLetter'] = 'پیام باید حداقل ۱۰ کاراکتر باشد.';
    }

    if (empty($errors)) {
        $success = true;
    } else {
        $success = false;
    }
}
?>
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($company['name']); ?> | فرم استخدامی</title>
    <meta name="description" content="فرم استخدامی سازه افزار فتح - ثبت درخواست شغلی آنلاین">
    <link rel="canonical" href="<?php echo $siteUrl; ?>/employment.php">

    <meta property="og:title" content="<?php echo htmlspecialchars($company['name']); ?> | فرم استخدامی">
    <meta property="og:description" content="فرم استخدامی سازه افزار فتح - ثبت درخواست شغلی آنلاین">
    <meta property="og:url" content="<?php echo $siteUrl; ?>/employment.php">
    <meta property="og:siteName" content="<?php echo htmlspecialchars($company['name']); ?>">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:type" content="website">

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

    <main id="main-content" class="pt-24">
        <section class="py-12 lg:py-16">
            <div class="container-site mx-auto">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-3xl lg:text-4xl font-bold text-primary mb-4">
                        فرم استخدامی
                    </h1>
                    <p class="text-secondary mb-8">
                        خوش آمدید. برای ثبت درخواست شغلی خود، لطفاً فرم زیر را تکمیل کنید.
                        کارشناسان ما پس از بررسی درخواست شما با ایمیل یا شماره تماس زیر با شما تماس خواهند گرفت.
                    </p>

                    <?php if (!empty($success)): ?>
                        <div class="flex items-center gap-4 p-6 bg-green-50 border border-green-200 rounded-sm mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-green-800 font-medium">درخواست شما با موفقیت ثبت شد.</p>
                        </div>
                    <?php elseif (!empty($errors)): ?>
                        <div class="flex items-start gap-4 p-6 bg-red-50 border border-red-200 rounded-sm mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <ul class="text-red-800 text-sm space-y-1">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="" novalidate class="flex flex-col gap-5 bg-white border border-black/5 rounded-sm p-6 sm:p-8">
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div class="flex flex-col gap-2">
                                <label for="name" class="text-sm font-medium text-primary">نام و نام خانوادگی</label>
                                <input id="name" name="name" type="text" value="<?php echo htmlspecialchars($name ?? '') ?>"
                                    class="w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent <?php echo isset($errors['name']) ? 'border-red-400' : 'border-black/10'; ?>"
                                    required />
                                <?php if (isset($errors['name'])): ?>
                                    <span class="text-xs text-red-500"><?php echo htmlspecialchars($errors['name']); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="phone" class="text-sm font-medium text-primary">شماره تماس</label>
                                <input id="phone" name="phone" type="tel" value="<?php echo htmlspecialchars($phone ?? '') ?>"
                                    class="w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent <?php echo isset($errors['phone']) ? 'border-red-400' : 'border-black/10'; ?>"
                                    required />
                                <?php if (isset($errors['phone'])): ?>
                                    <span class="text-xs text-red-500"><?php echo htmlspecialchars($errors['phone']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div class="flex flex-col gap-2">
                                <label for="email" class="text-sm font-medium text-primary">ایمیل (اختیاری)</label>
                                <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($email ?? '') ?>"
                                    class="w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent <?php echo isset($errors['email']) ? 'border-red-400' : 'border-black/10'; ?>" />
                                <?php if (isset($errors['email'])): ?>
                                    <span class="text-xs text-red-500"><?php echo htmlspecialchars($errors['email']); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="position" class="text-sm font-medium text-primary">سمت شغلی مورد نظر</label>
                                <input id="position" name="position" type="text" value="<?php echo htmlspecialchars($position ?? '') ?>"
                                    class="w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent <?php echo isset($errors['position']) ? 'border-red-400' : 'border-black/10'; ?>"
                                    required />
                                <?php if (isset($errors['position'])): ?>
                                    <span class="text-xs text-red-500"><?php echo htmlspecialchars($errors['position']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="resume" class="text-sm font-medium text-primary">لینک رزومه (اختیاری)</label>
                            <input id="resume" name="resume" type="url" value="<?php echo htmlspecialchars($resume ?? '') ?>"
                                class="w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent border-black/10"
                                placeholder="https://..." />
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="coverLetter" class="text-sm font-medium text-primary">متن پوششی / انگیزه</label>
                            <textarea id="coverLetter" name="coverLetter" rows="5"
                                class="w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent <?php echo isset($errors['coverLetter']) ? 'border-red-400' : 'border-black/10'; ?>"
                                required><?php echo htmlspecialchars($coverLetter ?? ''); ?></textarea>
                            <?php if (isset($errors['coverLetter'])): ?>
                                <span class="text-xs text-red-500"><?php echo htmlspecialchars($errors['coverLetter']); ?></span>
                            <?php endif; ?>
                        </div>

                        <button type="submit"
                            class="mt-2 inline-flex items-center justify-center gap-2 rounded-sm bg-accent px-6 py-3 text-sm font-semibold text-primary transition-colors hover:bg-accent/90 border border-accent">
                            ارسال درخواست
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="pb-12 lg:pb-16">
            <div class="container-site mx-auto">
                <div class="bg-white border border-black/5 rounded-sm p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-primary mb-4">اطلاعات تماس</h2>
                    <div class="grid sm:grid-cols-2 gap-5 text-sm">
                        <div>
                            <span class="text-secondary">تلفن ثابت:</span>
                            <span class="text-primary"><?php echo htmlspecialchars($company['phone']['officeDisplay']); ?></span>
                        </div>
                        <div>
                            <span class="text-secondary">تلفن همراه:</span>
                            <span class="text-primary"><?php echo htmlspecialchars($company['phone']['mobileDisplay']); ?></span>
                        </div>
                        <div>
                            <span class="text-secondary">ایمیل:</span>
                            <span class="text-primary"><?php echo htmlspecialchars($company['email']); ?></span>
                        </div>
                        <div>
                            <span class="text-secondary">آدرس دفتر مرکزی:</span>
                            <span class="text-primary"><?php echo htmlspecialchars($company['address']['headOffice']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/components/footer.php'; ?>
    <?php include __DIR__ . '/components/floating_contact.php'; ?>
    <?php include __DIR__ . '/components/organization_schema.php'; ?>
</body>
</html>
