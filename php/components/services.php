<?php
?>
<section id="services" class="py-20 lg:py-28 bg-white scroll-mt-20">
    <div class="container-site">
        <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
            <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
            خدمات
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-snug text-primary">خدمات ما</h2>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($services['Service'] as $index => $service): ?>
                <div class="Reveal delay-<?php echo $index * 80; ?> corner-marks h-full border border-black/5 bg-white p-7 rounded-sm">
                    <div class="flex h-12 w-12 items-center justify-center rounded-sm bg-primary text-accent mb-5">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo getServiceIconPath($service['id']); ?>" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-primary"><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p class="mt-2 text-sm leading-7 text-secondary"><?php echo htmlspecialchars($service['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
function getServiceIconPath($id) {
    $icons = [
        'production' => 'M8 10h.1M12 10h.1M16 10h.1M9 9l3 3L9 15l3-3M5 7h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v2M5 7a2 2 0 002 2h3m2 6h12a2 2 0 012 2v2a2 2 0 01-2 2h-3m-5 4h6m-3-6h6m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        'supply' => 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.343l-.707-.707M6.343 6.343l-.707-.707M6.343 17.657l-.707.707M17.657 17.657l.707.707M17.657 6.343l.707-.707',
        'custom' => 'M13 10V3L4 14h7a4 4 0 014 4z',
        'consulting' => 'M15 10l3.338-4.45a1.73 1.73 0 011.037-.29l3.35 4.45a1.73 1.73 0 01.29 1.038V19a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h5',
    ];
    return $icons[$id] ?? 'M8 10h.1M12 10h.1M16 10h.1';
}