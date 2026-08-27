<?php
?>
<section id="products" class="py-20 lg:py-28 bg-bg scroll-mt-20">
    <div class="container-site">
        <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
            <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
            محصولات
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-snug text-primary mb-4">محصولات ما</h2>
        <p class="text-secondary mb-12">تولید انواع تیرهای بتنی متناسب با نیاز شبکه‌های برق و پروژه‌های عمرانی</p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($products['Product'] as $index => $product): ?>
                <div class="corner-marks h-full border border-black/5 bg-white p-7 rounded-sm">
                    <div class="aspect-[4/3] w-full overflow-hidden rounded-sm border border-black/5 mb-5">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                            <span class="text-sm font-medium text-secondary"><?php echo htmlspecialchars($product['name']); ?></span>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-primary"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="mt-2 text-sm leading-7 text-secondary"><?php echo htmlspecialchars($product['shortDescription']); ?></p>
                    <ul class="mt-4 space-y-1 text-xs text-secondary">
                        <?php foreach (array_slice($product['specPreview'], 0, 2) as $spec): ?>
                            <li><?php echo htmlspecialchars($spec); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>