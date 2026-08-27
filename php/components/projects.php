<?php
?>
<section id="projects" className="py-20 lg:py-28 bg-white scroll-mt-20">
    <div class="container-site">
        <span class="mb-6 inline-flex items-center gap-3 text-sm font-medium text-accent">
            <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
            پروژه‌ها
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-snug text-primary">پروژه‌های اجراشده</h2>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($projects['Project'] as $index => $project): ?>
                <div class="flex flex-col items-start gap-4 bg-white border border-black/5 p-6 rounded-sm h-full">
                    <div class="w-full h-32 bg-gray-200 rounded-sm flex items-center justify-center mb-4">
                        <span class="text-sm font-medium text-secondary">تصویر پروژه</span>
                    </div>
                    <h3 class="text-base font-bold text-primary"><?php echo htmlspecialchars($project['name']); ?></h3>
                    <p class="mt-2 text-sm leading-7 text-secondary"><?php echo htmlspecialchars($project['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>