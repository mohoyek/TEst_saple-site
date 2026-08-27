/**
 * Cloudflare Worker — Backend API for سازه افزار فتح website.
 *
 * Endpointها:
 *   POST /api/contact      ->  دریافت پیام تماس (فرم صفحه تماس)
 *   POST /api/employment   ->  دریافت درخواست استخدامی (فرم استخدامی)
 *   GET   /health          ->  چک سلامت سرویس
 *
 * خروجی JSON یک‌دست با منطق اعتبارسنجی فرانت‌اند (components/Contact/ContactForm.tsx):
 *   - موفقیت:  { ok: true }
 *   - خطا:      { ok: false, error: "..." } یا { ok: false, errors: { fieldName: "پیام خطا" } }
 *
 * نکته درباره ارسال ایمیل:
 *   این Worker فعلاً داده‌ها را اعتبارسنجی و لاگ می‌کند. برای ارسال نامبرنگی/ایمیل واقعی،
 *   یک binding ایمیل یا صف (Queue) اضافه کنید، مثلا:
 *     env.MAIL.something...  یا  env.NOTIFICATIONS.send(...).
 *   در `wrangler.json` متغیرهای CONTACT_EMAIL / EMPLOYMENT_EMAIL در دسترس هستند.
 */
export default {
  async fetch(request, env, ctx) {
    const url = new URL(request.url);
    const method = request.method;

    const corsHeaders = {
      "Access-Control-Allow-Origin": "*",
      "Access-Control-Allow-Methods": "POST, OPTIONS",
      "Access-Control-Allow-Headers": "Content-Type, x-request-source",
      "Access-Control-Max-Age": "86400",
    };

    // CORS preflight
    if (method === "OPTIONS") {
      return new Response(null, { status: 204, headers: corsHeaders });
    }

    if (url.pathname === "/health" && method === "GET") {
      return json({ ok: true, service: "sazeh-afzar-api" }, corsHeaders);
    }

    if (url.pathname === "/api/contact" && method === "POST") {
      return handleContact(request, env, corsHeaders);
    }

    if (url.pathname === "/api/employment" && method === "POST") {
      return handleEmployment(request, env, corsHeaders);
    }

    return json({ ok: false, error: "Not found" }, { ...corsHeaders, "Cache-Control": "no-store" }, 404);
  },
};

const PHONE_REGEX = /^0\d{9,10}$/;
const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function json(body, extra = {}, status = 200) {
  return new Response(JSON.stringify(body), {
    status,
    headers: { "Content-Type": "application/json", ...extra },
  });
}

async function readJson(request) {
  try {
    return await request.json();
  } catch {
    return null;
  }
}

function validateContact(values) {
  const errors = {};
  if (!values.fullName || !String(values.fullName).trim()) {
    errors.fullName = "نام و نام خانوادگی را وارد کنید.";
  }
  if (!values.phone || !PHONE_REGEX.test(String(values.phone).trim())) {
    errors.phone = "شماره تماس معتبر نیست.";
  }
  if (values.email && !EMAIL_REGEX.test(String(values.email).trim())) {
    errors.email = "ایمیل معتبر نیست.";
  }
  if (!values.subject || !String(values.subject).trim()) {
    errors.subject = "موضوع پیام را وارد کنید.";
  }
  if (!values.message || String(values.message).trim().length < 10) {
    errors.message = "پیام باید حداقل ۱۰ کاراکتر باشد.";
  }
  return errors;
}

function validateEmployment(values) {
  const errors = {};
  if (!values.name || !String(values.name).trim()) {
    errors.name = "نام و نام خانوادگی را وارد کنید.";
  }
  if (!values.phone || !PHONE_REGEX.test(String(values.phone).trim())) {
    errors.phone = "شماره تماس معتبر نیست.";
  }
  if (values.email && !EMAIL_REGEX.test(String(values.email).trim())) {
    errors.email = "ایمیل معتبر نیست.";
  }
  if (!values.position || !String(values.position).trim()) {
    errors.position = "سمت شغلی را وارد کنید.";
  }
  if (
    !values.coverLetter ||
    String(values.coverLetter).trim().length < 10
  ) {
    errors.coverLetter = "پیام باید حداقل ۱۰ کاراکتر باشد.";
  }
  return errors;
}

async function handleContact(request, env, corsHeaders) {
  const values = await readJson(request);
  if (!values) {
    return json({ ok: false, error: "بدنه درخواست نامعتبر است." }, corsHeaders, 400);
  }
  const errors = validateContact(values);
  if (Object.keys(errors).length > 0) {
    ctxLog(env, "contact.invalid", values, errors);
    return json({ ok: false, errors }, corsHeaders, 422);
  }
  ctxLog(env, "contact.received", values, null);
  return json({ ok: true }, corsHeaders);
}

async function handleEmployment(request, env, corsHeaders) {
  const values = await readJson(request);
  if (!values) {
    return json({ ok: false, error: "بدنه درخواست نامعتبر است." }, corsHeaders, 400);
  }
  const errors = validateEmployment(values);
  if (Object.keys(errors).length > 0) {
    ctxLog(env, "employment.invalid", values, errors);
    return json({ ok: false, errors }, corsHeaders, 422);
  }
  ctxLog(env, "employment.received", values, null);
  return json({ ok: true }, corsHeaders);
}

function ctxLog(env, event, values, errors) {
  console.log(
    JSON.stringify({
      event,
      ts: new Date().toISOString(),
      to: errors ? null : env.CONTACT_EMAIL || env.EMPLOYMENT_EMAIL || null,
      payload: values,
      errors,
    })
  );
}
