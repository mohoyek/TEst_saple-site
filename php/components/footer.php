<?php
?>
<footer class="bg-primary text-white py-10 lg:py-14">
    <div class="container-site">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            <div class="lg:col-span-2">
                <a href="#home" class="flex items-center gap-2 shrink-0 mb-4" aria-label="<?php echo htmlspecialchars($company['name']); ?> — بازگشت به ابتدای صفحه">
                    <span class="w-8 h-8 rounded-full bg-white flex-shrink-0"></span>
                    <span class="text-lg font-bold whitespace-nowrap text-white">
                        <?php echo htmlspecialchars($company['name']); ?>
                    </span>
                </a>
                <p class="text-white/70 text-sm max-w-xs">
                    <?php echo htmlspecialchars($company['tagline']); ?>
                </p>
                <p class="text-white/70 text-sm mt-2">
                    <?php echo htmlspecialchars($company['foundedYearFa']); ?> بنا شده
                </p>
            </div>

            <nav aria-label="لینک‌های سریع">
                <h3 class="text-sm font-semibold text-white mb-4">لینک‌های سریع</h3>
                <ul class="space-y-2 text-sm">
                    <?php foreach ($navigation['navLinks'] as $link): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($link['href']); ?>" class="text-white/70 hover:text-accent transition-colors">
                            <?php echo htmlspecialchars($link['label']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <address class="not-italic" aria-label="اطلاعات تماس">
                <h3 class="text-sm font-semibold text-white mb-4">تماس با ما</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    <li>تلفن: <?php echo htmlspecialchars($company['phone']['officeDisplay']); ?></li>
                    <li>موبایل: <?php echo htmlspecialchars($company['phone']['mobileDisplay']); ?></li>
                    <li>ایمیل: <a href="mailto:<?php echo htmlspecialchars($company['email']); ?>" class="hover:text-accent transition-colors"><?php echo htmlspecialchars($company['email']); ?></a></li>
                    <li>آدرس: <?php echo htmlspecialchars($company['address']['headOffice']); ?></li>
                </ul>
            </address>
        </div>

        <div class="border-t border-white/10 mt-8 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-white/50">
                © <?php echo htmlspecialchars($company['copyrightYear']); ?> <?php echo htmlspecialchars($company['name']); ?>. تمامی حقوق محفوظ است.
            </p>
            <p class="text-sm text-white/50">
                طراحی و توسعه: تیم سازه افزار فتح
            </p>
        </div>
    </div>
</footer>