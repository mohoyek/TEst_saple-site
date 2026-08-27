<?php
?>
<section class="py-20 lg:py-28 bg-white overflow-hidden">
    <div class="container-site grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <div class="order-2 lg:order-1">
            <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
                <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
                درباره ما
            </span>
            <h2 class="text-3xl md:text-4xl font-bold leading-snug text-primary">
                تولید برای زیرساختی که باید سال‌ها ماندگار باشد
            </h2>
            <p class="mt-6 text-base leading-8 text-secondary">
                <?php echo htmlspecialchars($company['name']); ?> با تمرکز بر تولید تیرهای بتنی مورد استفاده در شبکه‌های برق، فعالیت خود را با هدف ارائه محصولاتی با کیفیت، دوام و قابلیت اطمینان بالا آغاز کرده است.
            </p>
            <p class="mt-4 text-base leading-8 text-secondary">
                ما تلاش می‌کنیم با بهره‌گیری از تجهیزات مناسب، مواد اولیه استاندارد و کنترل مستمر فرآیند تولید، محصولی متناسب با نیاز پروژه‌های عمرانی و شبکه‌های توزیع نیروی برق ارائه کنیم.
            </p>
            <a href="#about-company" class="mt-8 inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold rounded-sm transition-colors duration-200 bg-transparent text-primary border border-primary/30 hover:border-primary">
                آشنایی بیشتر با شرکت
            </a>
        </div>

        <div class="order-1 lg:order-2 relative corner-marks">
            <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm border border-black/5">
                <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                    <span class="text-sm font-medium text-secondary">تصویر کارخانه</span>
                </div>
            </div>
        </div>
    </div>
</section>