# سازه افزار فتح — وب‌سایت شرکتی

وب‌سایت تک‌صفحه‌ای (Single Page) شرکت تولیدکننده تیرهای بتنی برق.

## تکنولوژی
- Next.js (App Router) + TypeScript
- Tailwind CSS v4
- Lucide Icons
- Framer Motion (انیمیشن‌های ظریف)
- فونت Vazirmatn (self-hosted از طریق next/font/local، بدون نیاز به اتصال اینترنت در Build)

## اجرا
```bash
npm install
npm run dev      # اجرا در حالت توسعه
npm run build    # ساخت نسخه Production
npm run start    # اجرای نسخه Production
```

## ساختار پروژه
- `app/` — صفحه اصلی، layout، فونت و استایل‌های سراسری
- `components/` — کامپوننت‌ها به تفکیک هر Section (هر کدام پوشه جدا)
- `data/` — تمام محتوای قابل‌تغییر سایت (اطلاعات شرکت، محصولات، پروژه‌ها، آمار و ...)
- `public/images/` — تصاویر placeholder موضوعی؛ صرفاً کافیست فایل‌های واقعی با همان نام جایگزین شوند

## نکات مهم پیش از انتشار نهایی
1. فایل `data/company.ts` را بازبینی کنید (اطلاعات تماس واقعی شرکت در آن قرار دارد).
2. تصاویر placeholder داخل `public/images/` را با تصاویر واقعی کارخانه، محصولات و پروژه‌ها جایگزین کنید.
3. آمار نمونه در `data/stats.ts` (سال تجربه، تعداد تیر تولیدشده و ...) را با اعداد واقعی جایگزین کنید.
4. بخش نقشه (`components/Map/Map.tsx`) در حال حاضر Placeholder است؛ در صورت وجود کلید Google Maps / OpenStreetMap می‌توان جایگزین کرد.
5. فرم تماس (`components/Contact/ContactForm.tsx`) در حال حاضر فقط شبیه‌سازی ارسال است؛ تابع `submitContactForm` باید به یک API واقعی متصل شود.
6. آدرس‌های `metadataBase` در `app/layout.tsx` (siteUrl) باید با دامنه نهایی سایت جایگزین شود.
