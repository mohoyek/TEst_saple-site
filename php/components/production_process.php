<?php
?>
<section class="py-20 lg:py-28 bg-primary overflow-hidden">
    <div class="container-site">
        <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
            <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
            فرآیند تولید
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-snug text-white mb-4 dark">از مواد اولیه تا محصول نهایی</h2>

        {/* دسکتاپ: Timeline افقی */}
        <div class="mt-16 lg:block hidden">
            <div class="relative">
                <div class="absolute top-6 right-0 left-0 h-px bg-white/15" aria-hidden="true"></div>
                <div class="grid grid-cols-6 gap-4">
                    <?php foreach ($process['ProcessStep'] as $index => $step): ?>
                        <div class="relative flex flex-col items-center text-center">
                            <span class="relative z-10 flex h-12 w-12 items-center justify-center rounded-full bg-primary border border-accent text-accent">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo getProcessIconPath($step['id']); ?>" />
                                </svg>
                            </span>
                            <span class="mt-4 text-xs font-bold text-accent tracking-wide"><?php echo htmlspecialchars($step['number']); ?></span>
                            <h3 class="mt-2 text-sm font-bold text-white"><?php echo htmlspecialchars($step['title']); ?></h3>
                            <p class="mt-2 text-xs leading-6 text-white/55"><?php echo htmlspecialchars($step['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        {/* موبایل/تبلت: Timeline عمودی */}
        <div class="mt-12 lg:hidden">
            <div class="relative flex flex-col gap-8 border-r border-white/15 pr-6">
                <?php foreach ($process['ProcessStep'] as $index => $step): ?>
                    <div class="relative">
                        <span class="absolute -right-[31px] top-0 flex h-9 w-9 items-center justify-center rounded-full bg-primary border border-accent text-accent">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo getProcessIconPath($step['id']); ?>" />
                            </svg>
                        </span>
                        <span class="text-xs font-bold text-accent tracking-wide"><?php echo htmlspecialchars($step['number']); ?></span>
                        <h3 class="mt-1 text-base font-bold text-white"><?php echo htmlspecialchars($step['title']); ?></h3>
                        <p class="mt-1 text-sm leading-7 text-white/55"><?php echo htmlspecialchars($step['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
function getProcessIconPath($id) {
    $icons = [
        'raw-materials' => 'M14 2H6a2 2 0 00-2 2v16l8-6 8 6V4a2 2 0 00-2-2z',
        'mixing' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z',
        'casting' => 'M12 8c0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2 2 .895 2 2zm0 12c0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2 2 .895 2 2zm0-6c0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2 2 .895 2 2z',
        'vibration' => 'M12 4v16m8-8H4',
        'curing' => 'M12 22V8m0 0l3-3m-3 3l-3-3m3 11.364V16a4 4 0 00-8 0v-3.636m0 0L9.636 7 12 9.364 14.364 7 15 7.636',
        'quality-check' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z',
    ];
    return $icons[$id] ?? 'M9 12l2 2 4-4';
}