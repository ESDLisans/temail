import type React from "react"
import "@/app/globals.css"
import { ThemeProvider } from "@/components/theme-provider"
import { Toaster } from "@/components/ui/toaster"
import type { Metadata } from "next"
import StructuredData from "@/components/structured-data"

export const metadata: Metadata = {
  title: {
    default: "TempMail - Secure Temporary Email Service",
    template: "%s | TempMail",
  },
  description:
    "Generate disposable email addresses for temporary use. Protect your privacy and avoid spam with our secure temporary email service.",
  keywords: ["temporary email", "disposable email", "temp mail", "anonymous email", "privacy", "anti-spam"],
  authors: [{ name: "TempMail Team" }],
  creator: "TempMail",
  publisher: "TempMail",
  formatDetection: {
    email: false,
    telephone: false,
  },
  metadataBase: new URL("https://tempmail.io"),
  alternates: {
    canonical: "/",
  },
  openGraph: {
    type: "website",
    locale: "en_US",
    url: "https://tempmail.io",
    title: "TempMail - Secure Temporary Email Service",
    description: "Generate disposable email addresses for temporary use. Protect your privacy and avoid spam.",
    siteName: "TempMail",
  },
  twitter: {
    card: "summary_large_image",
    title: "TempMail - Secure Temporary Email Service",
    description: "Generate disposable email addresses for temporary use. Protect your privacy and avoid spam.",
    creator: "@tempmail",
  },
  viewport: {
    width: "device-width",
    initialScale: 1,
  },
  robots: {
    index: true,
    follow: true,
  },
    generator: 'v0.dev'
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en" suppressHydrationWarning>
      <head>
        <link rel="icon" href="/favicon.ico" sizes="any" />
        <StructuredData />
      </head>
      <body className="min-h-screen">
        <ThemeProvider attribute="class" defaultTheme="light" enableSystem disableTransitionOnChange>
          {children}
          <Toaster />
        </ThemeProvider>
      </body>
    </html>
  )
}
