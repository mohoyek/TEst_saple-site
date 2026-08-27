<?php
?>
<section id="about-company" class="py-20 lg:py-28 bg-primary overflow-hidden">
    <div class="container-site grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <div>
            <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
                <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
                درباره شرکت
            </span>
            <h2 class="text-3xl md:text-4xl font-bold leading-snug text-white">
                <?php echo htmlspecialchars($company['name']); ?>: ما فقط تولیدکننده نیستیم؛ بخشی از زنجیره زیرساخت انرژی هستیم.
            </h2>
            <p class="mt-6 text-base leading-8 text-white/65">
                <?php echo htmlspecialchars($company['name']); ?> با هدف حضور مؤثر در صنعت تولید تجهیزات مورد استفاده در شبکه‌های برق، فعالیت خود را بر پایه کیفیت، تعهد و پاسخگویی بنا کرده است.
            </p>
            <p class="mt-4 text-base leading-8 text-white/65">
                تمرکز ما بر تولید محصول قابل اعتماد، تحویل به‌موقع و ایجاد همکاری بلندمدت با مشتریان و پیمانکاران است.
            </p>
        </div>

        <div class="relative corner-marks scroll-mt-24">
            <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm border border-white/10">
                <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                    <span class="text-sm font-medium text-secondary">تیم محصول</span>
                </div>
            </div>
        </div>
    </div>
</section>