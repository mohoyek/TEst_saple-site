<?php
?>
<section class="relative bg-primary py-14" aria-label="آمار شرکت">
    <div class="container-site">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6">
            <?php foreach ($stats['Stat'] as $index => $stat): ?>
                <div class="flex flex-col items-center text-center px-2 border-e border-white/10 last:border-e-0">
                    <span class="text-3xl md:text-4xl font-black text-accent tabular-nums">
                        <?php echo htmlspecialchars($stat['value']); ?>
                        <?php echo htmlspecialchars($stat['suffix']); ?>
                    </span>
                    <span class="mt-2 text-sm md:text-base font-medium text-white/70">
                        <?php echo htmlspecialchars($stat['label']); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>