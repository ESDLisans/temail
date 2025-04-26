import type { Metadata } from "next"
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from "@/components/ui/accordion"
import { Button } from "@/components/ui/button"
import Link from "next/link"

export const metadata: Metadata = {
  title: "FAQ - TempMail",
  description:
    "Frequently asked questions about TempMail's temporary email service. Find answers to common questions about our privacy-focused email solution.",
}

export default function FAQPage() {
  const faqs = [
    {
      question: "What is TempMail?",
      answer:
        "TempMail is a service that provides temporary, disposable email addresses. These addresses can be used to sign up for websites, services, or any other online platform without revealing your personal email address. This helps protect your privacy and reduce spam in your primary inbox.",
    },
    {
      question: "How long do temporary emails last?",
      answer:
        "By default, temporary email addresses and all received messages are automatically deleted after 10 hours. This timeframe provides enough time to complete most sign-up processes and receive verification emails, while ensuring your data doesn't linger. Premium users can extend this retention period up to 30 days.",
    },
    {
      question: "Is TempMail free to use?",
      answer:
        "Yes, TempMail offers a free tier that includes basic features such as temporary email generation, real-time inbox, and auto-deletion after 10 hours. We also offer a premium plan with additional features like extended email retention, custom domains, and email forwarding.",
    },
    {
      question: "Do I need to create an account to use TempMail?",
      answer:
        "No, you don't need to create an account to use the basic features of TempMail. Simply visit our website and a temporary email address will be generated for you automatically. However, creating an account allows you to access premium features and manage multiple email addresses.",
    },
    {
      question: "Can I receive attachments with TempMail?",
      answer:
        "Yes, TempMail supports receiving emails with attachments. However, for security reasons, we scan all attachments for viruses and malware. Premium users get enhanced attachment scanning and can receive larger attachments.",
    },
    {
      question: "Is TempMail secure?",
      answer:
        "Yes, TempMail takes security seriously. We use encryption for all data in transit and at rest. We don't store emails longer than necessary, and we have strict privacy policies in place to protect your information. Additionally, we don't require any personal information to use our basic service.",
    },
    {
      question: "Can I reply to emails received on my temporary address?",
      answer:
        "Yes, you can reply to emails received on your temporary address. However, the recipient will see that the email comes from your temporary address, not your personal email. Premium users can also set up email forwarding to reply from their personal email while keeping it hidden.",
    },
    {
      question: "Can websites detect that I'm using a temporary email?",
      answer:
        "Some websites may block known temporary email domains. However, TempMail uses a variety of domains and regularly updates them to minimize this issue. Premium users can use custom domains which are less likely to be blocked.",
    },
    {
      question: "What happens if I receive an important email after my temporary address expires?",
      answer:
        "Once a temporary email address expires, all associated emails are permanently deleted from our servers. We cannot recover these emails. If you're expecting important emails, we recommend upgrading to our premium plan which offers extended email retention.",
    },
    {
      question: "Can I create multiple temporary email addresses?",
      answer:
        "Free users can create one temporary email address at a time. If you need to create a new address, the old one will be replaced. Premium users can create and manage multiple temporary email addresses simultaneously.",
    },
    {
      question: "Does TempMail work on mobile devices?",
      answer:
        "Yes, TempMail is fully responsive and works on all modern mobile devices. You can access your temporary inbox from any smartphone or tablet with an internet connection. We also offer mobile apps for iOS and Android for a more optimized experience.",
    },
    {
      question: "How do I report abuse or spam coming from a TempMail address?",
      answer:
        "We take abuse seriously. If you've received spam or abusive content from a TempMail address, please contact our support team through our Contact page with details of the incident. We'll investigate and take appropriate action.",
    },
  ]

  return (
    <div className="container mx-auto px-4 py-12">
      <div className="text-center mb-16">
        <h1 className="text-4xl font-bold mb-4 bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
          Frequently Asked Questions
        </h1>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
          Find answers to common questions about TempMail's temporary email service.
        </p>
      </div>

      <div className="max-w-3xl mx-auto mb-16">
        <Accordion type="single" collapsible className="w-full">
          {faqs.map((faq, index) => (
            <AccordionItem
              key={index}
              value={`item-${index}`}
              className="border-b border-slate-200 dark:border-slate-800"
            >
              <AccordionTrigger className="text-left font-medium py-4 hover:text-emerald-600 dark:hover:text-emerald-400">
                {faq.question}
              </AccordionTrigger>
              <AccordionContent className="text-slate-600 dark:text-slate-300 pb-4">{faq.answer}</AccordionContent>
            </AccordionItem>
          ))}
        </Accordion>
      </div>

      <div className="bg-slate-100 dark:bg-slate-800 rounded-2xl p-8 md:p-12 text-center">
        <h2 className="text-3xl font-bold mb-4">Still have questions?</h2>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto mb-8">
          Our support team is here to help. Contact us for any questions not covered in our FAQ.
        </p>
        <Button
          size="lg"
          className="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white"
        >
          <Link href="/contact">Contact Support</Link>
        </Button>
      </div>
    </div>
  )
}
