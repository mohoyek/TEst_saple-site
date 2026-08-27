import type { Metadata } from "next";
import localFont from "next/font/local";
import { company } from "@/data/company";
import "./globals.css";

const vazirmatn = localFont({
  src: "./fonts/Vazirmatn-Variable.ttf",
  variable: "--font-vazirmatn",
  display: "swap",
  weight: "100 900",
});

const siteTitle = `${company.name} | تولیدکننده تیرهای بتنی برق`;
const siteDescription =
  "تولید و تأمین انواع تیرهای بتنی مورد استفاده در شبکه‌های برق، پروژه‌های عمرانی و شبکه‌های توزیع نیروی برق.";
const siteUrl = "https://sazehafzar.com";

export const metadata: Metadata = {
  metadataBase: new URL(siteUrl),
  title: siteTitle,
  description: siteDescription,
  keywords: [
    "تیر بتنی برق",
    "تیر بتنی",
    "تولید تیر بتنی",
    "شبکه توزیع برق",
    "سازه افزار فتح",
  ],
  authors: [{ name: company.name }],
  alternates: {
    canonical: siteUrl,
  },
  openGraph: {
    title: siteTitle,
    description: siteDescription,
    url: siteUrl,
    siteName: company.name,
    locale: "fa_IR",
    type: "website",
  },
  icons: {
    icon: "/favicon.ico",
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fa-IR" dir="rtl" className={vazirmatn.variable}>
      <body className="antialiased font-sans">
        <a
          href="#main-content"
          className="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[100] focus:bg-primary focus:text-white focus:px-4 focus:py-2 focus:rounded-sm"
        >
          رفتن به محتوای اصلی
        </a>
        {children}
      </body>
    </html>
  );
}
