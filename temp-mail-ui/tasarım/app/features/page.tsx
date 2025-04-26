import type { Metadata } from "next"
import FeaturesPageClient from "./FeaturesPageClient"

export const metadata: Metadata = {
  title: "Features - TempMail",
  description:
    "Discover all the features of our secure temporary email service. Protect your privacy with disposable email addresses.",
}

export default function FeaturesPage() {
  return <FeaturesPageClient />
}
