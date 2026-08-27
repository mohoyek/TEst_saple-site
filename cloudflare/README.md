# استقرار سازه افزار فتح روی Cloudflare

این دایرکتوری شامل دو سرویس هم‌زمان است:

| سرویس | نقش | فایل‌ها |
|------|-----|---------|
| **Cloudflare Pages** | فرونت‌اند Next.js (SSR/ISR) | `pages.toml` |
| **Cloudflare Worker** | بکاند API فرم تماس و استخدامی | `wrangler.json` + `worker.js` |

## معماری

```
[ کاربر ]
    |
    v
Cloudflare Pages (Next.js)  ->  سرورریس فرونت‌اند + استاتیک
    |                           (next-on-pages)
    |  POST /api/contact
    v
Cloudflare Worker  (api.sazehafzar.com)  ->  اعتبارسنجی + لاگ
    (یا در آینده: ارسال ایمیل / Push / Queue)
```

## پیش‌نیازها
- حساب Cloudflare
- [Wrangler CLI](https://developers.cloudflare.com/pages/platform/command-line/) نصب شده:
  ```bash
  npm i -g wrangler
  ```
- دامنه `sazehafzar.com` به Cloudflare اضافه شده باشد.

## گام 1 — بکاند (Worker)
```bash
cd cloudflare
wrangler deploy        # یا: npm run deploy:worker
```
Worker روی `api.sazehafzar.com` منتشر می‌شود (`routes` در `wrangler.json` تنظیم شده؛
در صورت نیاز zone_id/dictionary route را در داشبورد اصلاح کنید).

نقطهٔ سلامت: `https://api.sazehafzar.com/health`

## گام 2 — فرونت‌اند (Pages)
1. در داشبورد Cloudflare → **Pages** → **Create Project** → اتصال به ریپوزیتوری گیت.
2. تنظیمات ساخت (Build settings):
   - **Build command:** `npx @cloudflare/next-on-pages`
   - **Output directory:** `.vercel/output/static`
   - **Install command:** `npm install`
3. در بخش Variables، متغیرهای `pages.toml` را اضافه کنید:
   - `NEXT_PUBLIC_API_URL` = `https://api.sazehafzar.com`
   - `NEXT_PUBLIC_SITE_URL` = `https://sazehafzar.com`
4. **Save and Deploy**.

> `next-on-pages` بسته `npm` نیست؛ فقط در زمان ساخت `npx` دریافت می‌شود.
> برای تست محلی می‌توانید `npm i -D @cloudflare/next-on-pages` اضافه کنید.

## گام 3 — سوب‌دامین Worker
یک **CNAME** یا **Worker Route** به `api.sazehafzar.com` اختصاص دهید تا فرم‌ها بتوانند
به همان Worker POST کنند (CORS روی `*` تنظیم شده است).

## نکات قبل از انتشار نهایی
1. مقدار `siteUrl` در `app/layout.tsx` را با دامنه نهایی (`https://sazehafzar.com`) جایگزین کنید.
2. شماره/ایمیل واقعی در `data/company.ts` بروز شود.
3. تصاویر placeholder در `public/images/` جایگزین شوند.
4. آمارهای عددی در `data/stats.ts` واقعی شوند.
5. در Worker، برای ارسال ایمیل نامبرنگی، یک binding (Mail / Queues) اضافه کنید.
