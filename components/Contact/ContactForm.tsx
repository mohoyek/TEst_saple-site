"use client";

import { useState, type FormEvent } from "react";
import { Loader2, CheckCircle2 } from "lucide-react";

interface FormValues {
  fullName: string;
  phone: string;
  email: string;
  subject: string;
  message: string;
}

const initialValues: FormValues = {
  fullName: "",
  phone: "",
  email: "",
  subject: "",
  message: "",
};

type FormErrors = Partial<Record<keyof FormValues, string>>;

const PHONE_REGEX = /^0\d{9,10}$/;
const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function validate(values: FormValues): FormErrors {
  const errors: FormErrors = {};

  if (!values.fullName.trim()) {
    errors.fullName = "نام و نام خانوادگی را وارد کنید.";
  }

  if (!values.phone.trim()) {
    errors.phone = "شماره تماس را وارد کنید.";
  } else if (!PHONE_REGEX.test(values.phone.trim())) {
    errors.phone = "شماره تماس معتبر نیست.";
  }

  if (values.email.trim() && !EMAIL_REGEX.test(values.email.trim())) {
    errors.email = "ایمیل معتبر نیست.";
  }

  if (!values.subject.trim()) {
    errors.subject = "موضوع پیام را وارد کنید.";
  }

  if (!values.message.trim()) {
    errors.message = "متن پیام را وارد کنید.";
  } else if (values.message.trim().length < 10) {
    errors.message = "پیام باید حداقل ۱۰ کاراکتر باشد.";
  }

  return errors;
}

// ارسال به Cloudflare Worker بکاند (NEXT_PUBLIC_API_URL).
// اگر env تنظیم نشود، در محیط محلی شبیه‌سازی می‌شود.
async function submitContactForm(values: FormValues): Promise<{ ok: boolean; error?: string }> {
  const apiUrl = process.env.NEXT_PUBLIC_API_URL;
  if (!apiUrl) {
    await new Promise((resolve) => setTimeout(resolve, 900));
    console.log("Contact form submission (placeholder):", values);
    return { ok: true };
  }
  const res = await fetch(`${apiUrl}/api/contact`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(values),
  });
  const data = await res.json().catch(() => null);
  if (!res.ok || !data?.ok) {
    return { ok: false, error: data?.error || "ارسال درخواست با خطا مواجه شد." };
  }
  return { ok: true };
}

export default function ContactForm() {
  const [values, setValues] = useState<FormValues>(initialValues);
  const [errors, setErrors] = useState<FormErrors>({});
  const [status, setStatus] = useState<"idle" | "submitting" | "success">("idle");

  const handleChange = (field: keyof FormValues) => (
    e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
  ) => {
    setValues((prev) => ({ ...prev, [field]: e.target.value }));
    if (errors[field]) {
      setErrors((prev) => ({ ...prev, [field]: undefined }));
    }
  };

  const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const validationErrors = validate(values);
    setErrors(validationErrors);

    if (Object.keys(validationErrors).length > 0) return;

    setStatus("submitting");
    const result = await submitContactForm(values);
    if (result.ok) {
      setStatus("success");
      setValues(initialValues);
    } else {
      setStatus("idle");
    }
  };

  if (status === "success") {
    return (
      <div
        role="status"
        className="flex flex-col items-center justify-center text-center gap-4 h-full min-h-[320px] bg-white border border-black/5 rounded-sm p-8"
      >
        <CheckCircle2 className="text-accent" size={40} aria-hidden="true" />
        <h3 className="text-lg font-bold text-primary">
          درخواست شما ثبت شد
        </h3>
        <p className="text-sm text-secondary max-w-xs">
          کارشناسان ما در اسرع وقت با شما تماس خواهند گرفت.
        </p>
        <button
          type="button"
          onClick={() => setStatus("idle")}
          className="mt-2 text-sm font-semibold text-accent hover:underline"
        >
          ارسال درخواست جدید
        </button>
      </div>
    );
  }

  return (
    <form
      noValidate
      onSubmit={handleSubmit}
      className="flex flex-col gap-5 bg-white border border-black/5 rounded-sm p-6 sm:p-8"
    >
      <div className="grid sm:grid-cols-2 gap-5">
        <Field
          label="نام و نام خانوادگی"
          name="fullName"
          value={values.fullName}
          onChange={handleChange("fullName")}
          error={errors.fullName}
          autoComplete="name"
        />
        <Field
          label="شماره تماس"
          name="phone"
          value={values.phone}
          onChange={handleChange("phone")}
          error={errors.phone}
          autoComplete="tel"
          inputMode="tel"
        />
      </div>

      <div className="grid sm:grid-cols-2 gap-5">
        <Field
          label="ایمیل (اختیاری)"
          name="email"
          value={values.email}
          onChange={handleChange("email")}
          error={errors.email}
          autoComplete="email"
          inputMode="email"
        />
        <Field
          label="موضوع"
          name="subject"
          value={values.subject}
          onChange={handleChange("subject")}
          error={errors.subject}
        />
      </div>

      <div className="flex flex-col gap-2">
        <label htmlFor="message" className="text-sm font-medium text-primary">
          پیام
        </label>
        <textarea
          id="message"
          name="message"
          rows={5}
          value={values.message}
          onChange={handleChange("message")}
          aria-invalid={Boolean(errors.message)}
          aria-describedby={errors.message ? "message-error" : undefined}
          className={`w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent ${
            errors.message ? "border-red-400" : "border-black/10"
          }`}
        />
        {errors.message && (
          <span id="message-error" className="text-xs text-red-500">
            {errors.message}
          </span>
        )}
      </div>

      <button
        type="submit"
        disabled={status === "submitting"}
        className="mt-2 inline-flex items-center justify-center gap-2 rounded-sm bg-accent px-6 py-3 text-sm font-semibold text-primary transition-colors hover:bg-accent/90 disabled:opacity-70"
      >
        {status === "submitting" && (
          <Loader2 className="animate-spin" size={16} aria-hidden="true" />
        )}
        ارسال درخواست
      </button>
    </form>
  );
}

interface FieldProps {
  label: string;
  name: string;
  value: string;
  onChange: (e: React.ChangeEvent<HTMLInputElement>) => void;
  error?: string;
  autoComplete?: string;
  inputMode?: React.HTMLAttributes<HTMLInputElement>["inputMode"];
}

function Field({ label, name, value, onChange, error, autoComplete, inputMode }: FieldProps) {
  return (
    <div className="flex flex-col gap-2">
      <label htmlFor={name} className="text-sm font-medium text-primary">
        {label}
      </label>
      <input
        id={name}
        name={name}
        type="text"
        value={value}
        onChange={onChange}
        autoComplete={autoComplete}
        inputMode={inputMode}
        aria-invalid={Boolean(error)}
        aria-describedby={error ? `${name}-error` : undefined}
        className={`w-full rounded-sm border bg-white px-4 py-3 text-sm text-primary outline-none transition-colors focus:border-accent ${
          error ? "border-red-400" : "border-black/10"
        }`}
      />
      {error && (
        <span id={`${name}-error`} className="text-xs text-red-500">
          {error}
        </span>
      )}
    </div>
  );
}
