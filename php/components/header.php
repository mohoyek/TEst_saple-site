<?php
?>
<header id="site-header" class="fixed inset-x-0 top-0 z-50 transition-all duration-300 bg-transparent">
    <div class="container-site flex h-20 items-center justify-between py-4">
        <a href="#home" class="flex items-center gap-2 shrink-0" aria-label="<?php echo htmlspecialchars($company['name']); ?> — بازگشت به ابتدای صفحه">
            <span id="logo-mark" class="w-8 h-8 rounded-full bg-white flex-shrink-0"></span>
            <span id="logo-text" class="text-lg font-bold whitespace-nowrap text-white">
                <?php echo htmlspecialchars($company['name']); ?>
            </span>
        </a>

        <nav class="hidden lg:flex items-center gap-8" aria-label="ناوبری اصلی">
            <?php foreach ($navigation['navLinks'] as $link): ?>
                <a href="<?php echo htmlspecialchars($link['href']); ?>" class="text-sm font-medium transition-colors hover:text-accent text-white">
                    <?php echo htmlspecialchars($link['label']); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="hidden lg:block">
            <a href="#contact" class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold rounded-sm transition-colors duration-200 bg-accent text-primary hover:bg-accent/90 border border-accent">
                درخواست استعلام قیمت
            </a>
        </div>

        <button type="button" id="mobile-menu-btn" class="lg:hidden p-2 -mr-2 text-white" aria-label="باز کردن منو" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-26 w-26" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="lg:hidden fixed inset-0 top-0 bg-primary text-white transition-transform duration-300 ease-out translate-x-full">
        <div class="container-site flex h-20 items-center justify-between py-4">
            <span class="text-lg font-bold"><?php echo htmlspecialchars($company['name']); ?></span>
            <button type="button" id="mobile-close-btn" class="p-2 -mr-2" aria-label="بستن منو">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-26 w-26" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="container-site flex flex-col gap-1 py-6" aria-label="ناوبری موبایل">
            <?php foreach ($navigation['navLinks'] as $link): ?>
                <a href="<?php echo htmlspecialchars($link['href']); ?>" class="py-4 text-lg font-medium border-b border-white/10"><?php echo htmlspecialchars($link['label']); ?></a>
            <?php endforeach; ?>
            <a href="#contact" class="mt-6 w-full text-center inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold rounded-sm bg-accent text-primary hover:bg-accent/90 border border-accent">
                درخواست استعلام قیمت
            </a>
        </nav>
    </div>

    <div id="floating-buttons" class="fixed lg:top-20 top-4 right-4 z-40 hidden flex-col gap-3">
        <?php if (!empty($company['whatsapp']['enabled']) && $company['whatsapp']['enabled']): ?>
        <a href="https://wa.me/<?php echo htmlspecialchars($company['whatsapp']['number']); ?>" target="_blank" rel="noopener noreferrer" aria-label="ارتباط از طریق واتساپ" class="flex h-[52px] w-[52px] items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg shadow-black/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10.5h8m-4 0v4" />
            </svg>
        </a>
        <?php endif; ?>
        <a href="tel:<?php echo htmlspecialchars($company['phone']['mobile']); ?>" aria-label="تماس تلفنی" class="flex h-[52px] w-[52px] items-center justify-center rounded-full bg-[#e5a623] text-[#17212b] shadow-lg shadow-black/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l2.36 7.07a1 1 0 01-.55 1.18l-3.28 1.64a1 1 0 00-.55.89v.25a2 2 0 002 2h3.28a2 2 0 002-2v-1.5a1 1 0 011-1h2.28a1 1 0 011 .87l1.73 5.19a1 1 0 01-.87 1.24l-2.36.87a1 1 0 00-.68.95v1.5a2 2 0 002 2h3.28a2 2 0 002-2v-6.5a1 1 0 01.87-1l1.73 5.19a1 1 0 01-.87 1.24l-.7 1.38a1 1 0 01-1.16.42l-1.73-.62a1 1 0 00-1.24.89l.43 2.27a1 1 0 01-.87 1.24l-2.36.88a1 1 0 00-.68.95v.5a1 1 0 001 1.5l1.73 5.19a2 2 0 001.87 1.4h.28a2 2 0 002-2z" />
            </svg>
        </a>
    </div>
</header>

<style>
    #site-header.scrolled {
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(4px);
        box-shadow: 0 1px 0 0 rgba(23, 33, 43, 0.08);
    }
    #site-header.scrolled #logo-text,
    #site-header.scrolled #mobile-menu-btn {
        color: #17212b;
    }
    #site-header.scrolled nav a {
        color: #17212b;
    }
    #floating-buttons {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    #site-header.scrolled #floating-buttons {
        opacity: 1;
        display: flex;
    }
</style>

<script>
    (function() {
        var header = document.getElementById('site-header');
        var floatingButtons = document.getElementById('floating-buttons');
        var mobileMenu = document.getElementById('mobile-menu');
        var mobileMenuBtn = document.getElementById('mobile-menu-btn');
        var mobileCloseBtn = document.getElementById('mobile-close-btn');

        function onScroll() {
            if (window.scrollY > 24) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        function openMobileMenu() {
            mobileMenu.classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden';
            mobileMenuBtn.setAttribute('aria-expanded', 'true');
        }

        function closeMobileMenu() {
            mobileMenu.classList.add('translate-x-full');
            document.body.style.overflow = '';
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
        }

        window.addEventListener('scroll', onScroll);
        onScroll();

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', openMobileMenu);
        }
        if (mobileCloseBtn) {
            mobileCloseBtn.addEventListener('click', closeMobileMenu);
        }

        var mobileLinks = mobileMenu ? mobileMenu.querySelectorAll('a') : [];
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', closeMobileMenu);
        });
    })();
</script>