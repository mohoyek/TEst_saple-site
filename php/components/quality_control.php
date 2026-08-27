<?php
?>
<section class="py-20 lg:py-28 bg-bg">
    <div class="container-site">
        <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
            <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
            کنترل کیفیت
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-snug text-primary mb-4">کیفیت، از اولین مرحله تولید آغاز می‌شود</h2>
        <p class="text-secondary mb-12 max-w-2xl">
            کیفیت محصول نتیجه یک فرآیند مستمر است. در مراحل مختلف تولید، کنترل‌های لازم انجام می‌شود تا محصول نهایی مطابق مشخصات فنی تعیین‌شده آماده تحویل شود.
        </p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($quality['QualityFeature'] as $index => $feature): ?>
                <div class="flex flex-col items-start gap-4 bg-white border border-black/5 p-6 rounded-sm h-full">
                    <span class="flex h-11 w-11 items-center justify-center rounded-sm border border-accent/30 text-accent">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo getQualityIconPath($feature['icon']); ?>" />
                        </svg>
                    </span>
                    <h3 class="text-sm font-bold text-primary"><?php echo htmlspecialchars($feature['title']); ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
function getQualityIconPath($iconName) {
    $icons = [
        'FlaskConical' => 'M8 8a8 8 0 1116 0v8H8V8z',
        'GaugeCircle' => 'M11 1a1 1 0 10-2 0v2a1 1 0 102 0V1zm5 5a1 1 0 10-2 0v2a1 1 0 102 0V6zm1.88-3.22a3 3 0 00-4.22 4.22L11 11V7a3 3 0 00-.88 2.12A3 3 0 008 11v2a3 3 0 003 3v2a3 3 0 00-1.88-2.12l2.35-2.35a3 3 0 001.12 1.12V11a3 3 0 003-3z',
        'Ruler' => 'M4 4a2 2 0 114 0 2 2 0 01-4 0zm2 6a2 2 0 114 0 2 2 0 01-4 0zm0 4a2 2 0 114 0 2 2 0 01-4 0zm4-6a6 6 0 00-6 6h2a4 4 0 014-4V20a2 2 0 104 0v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v-2a4 4 0 004-4h2a6 6 0 00-6 6z',
        'BadgeCheck' => 'M9 12l2 2 4-4',
    ];
    return $icons[$iconName] ?? 'M9 12l2 2 4-4';
}