import type { Metadata } from "next"
import { TempMailHeader } from "@/components/temp-mail-header"
import AdBanner from "@/components/ad-banner"
import Footer from "@/components/footer"
import TempMailApp from "@/components/temp-mail-app"

export const metadata: Metadata = {
  title: "TempMail - Secure Temporary Email Service",
  description:
    "Generate disposable email addresses for temporary use. Protect your privacy and avoid spam with our secure temporary email service.",
}

export default function HomePage() {
  return (
    <div className="min-h-screen flex flex-col bg-gradient-to-br from-slate-50 via-slate-50 to-emerald-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-900">
      <TempMailHeader />

      <div className="flex-grow">
        {/* Top Ad Banner */}
        <AdBanner className="w-full max-w-7xl mx-auto my-4" format="horizontal" label="Top Banner" />

        <main className="container mx-auto px-4 py-4">
          <div className="flex flex-col lg:flex-row gap-4">
            {/* Left Ad Banner */}
            <div className="hidden lg:block lg:w-[160px]">
              <AdBanner className="sticky top-24" format="vertical" label="Left Banner" />
            </div>

            {/* Main Content */}
            <div className="flex-1">
              <TempMailApp />
            </div>

            {/* Right Ad Banner */}
            <div className="hidden lg:block lg:w-[160px]">
              <AdBanner className="sticky top-24" format="vertical" label="Right Banner" />
            </div>
          </div>

          {/* Bottom Ad Banner */}
          <AdBanner className="w-full max-w-7xl mx-auto mt-4" format="horizontal" label="Bottom Banner" />
        </main>
      </div>

      <Footer />
    </div>
  )
}
