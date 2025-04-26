import Script from "next/script"

export default function StructuredData() {
  const structuredData = {
    "@context": "https://schema.org",
    "@type": "WebApplication",
    name: "TempMail",
    url: "https://tempmail.io",
    description:
      "Generate disposable email addresses for temporary use. Protect your privacy and avoid spam with our secure temporary email service.",
    applicationCategory: "UtilityApplication",
    operatingSystem: "All",
    offers: {
      "@type": "Offer",
      price: "0",
      priceCurrency: "USD",
    },
    author: {
      "@type": "Organization",
      name: "TempMail",
      url: "https://tempmail.io",
    },
  }

  return (
    <Script id="structured-data" type="application/ld+json">
      {JSON.stringify(structuredData)}
    </Script>
  )
}
