"use client"

import { Check, Shield, Clock, RefreshCw, Mail, Zap, Code, Globe, Lock } from "lucide-react"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Button } from "@/components/ui/button"
import Link from "next/link"

export default function FeaturesPageClient() {
  const features = [
    {
      icon: <Shield className="h-10 w-10 text-emerald-500" />,
      title: "Privacy Protection",
      description: "Keep your real email address private and avoid spam by using our disposable email addresses.",
    },
    {
      icon: <Clock className="h-10 w-10 text-emerald-500" />,
      title: "Auto-Deletion",
      description: "All emails are automatically deleted after 10 hours, ensuring your data doesn't linger.",
    },
    {
      icon: <RefreshCw className="h-10 w-10 text-emerald-500" />,
      title: "Instant Generation",
      description: "Generate new email addresses instantly with a single click, no registration required.",
    },
    {
      icon: <Mail className="h-10 w-10 text-emerald-500" />,
      title: "Real-Time Inbox",
      description: "Receive emails in real-time with instant notifications when new messages arrive.",
    },
    {
      icon: <Zap className="h-10 w-10 text-emerald-500" />,
      title: "Fast & Reliable",
      description: "Our service is optimized for speed and reliability, ensuring you never miss an important email.",
    },
    {
      icon: <Code className="h-10 w-10 text-emerald-500" />,
      title: "API Access",
      description: "Integrate our temporary email service into your applications with our developer-friendly API.",
    },
    {
      icon: <Globe className="h-10 w-10 text-emerald-500" />,
      title: "Accessible Anywhere",
      description:
        "Access your temporary emails from any device with an internet connection, no installation required.",
    },
    {
      icon: <Lock className="h-10 w-10 text-emerald-500" />,
      title: "Secure Encryption",
      description: "All data is encrypted in transit and at rest, ensuring your communications remain private.",
    },
  ]

  const premiumFeatures = [
    "Extended email retention (30 days)",
    "Custom domain names",
    "Email forwarding to your real address",
    "Multiple email addresses management",
    "Advanced spam filtering",
    "Attachment scanning",
    "Priority support",
    "Ad-free experience",
  ]

  return (
    <div className="container mx-auto px-4 py-12">
      <div className="text-center mb-16">
        <h1 className="text-4xl font-bold mb-4 bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
          Powerful Features for Your Privacy
        </h1>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
          TempMail provides a comprehensive set of features designed to protect your privacy and simplify your online
          experience.
        </p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        {features.map((feature, index) => (
          <Card
            key={index}
            className="border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-sm hover:shadow-md transition-shadow"
          >
            <CardHeader>
              <div className="mb-4">{feature.icon}</div>
              <CardTitle className="text-xl">{feature.title}</CardTitle>
            </CardHeader>
            <CardContent>
              <CardDescription className="text-slate-600 dark:text-slate-300">{feature.description}</CardDescription>
            </CardContent>
          </Card>
        ))}
      </div>

      <div className="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl p-1 mb-16">
        <div className="bg-white dark:bg-slate-950 rounded-xl p-8 md:p-12">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
              <h2 className="text-3xl font-bold mb-4 bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
                Upgrade to Premium
              </h2>
              <p className="text-slate-600 dark:text-slate-300 mb-6">
                Get access to advanced features and enhanced privacy protection with our premium plan.
              </p>
              <ul className="space-y-3 mb-8">
                {premiumFeatures.map((feature, index) => (
                  <li key={index} className="flex items-start">
                    <Check className="h-5 w-5 text-emerald-500 mr-2 mt-0.5" />
                    <span className="text-slate-600 dark:text-slate-300">{feature}</span>
                  </li>
                ))}
              </ul>
              <Button className="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white">
                Upgrade Now
              </Button>
            </div>
            <div className="bg-slate-100 dark:bg-slate-800 rounded-xl p-6 relative">
              <div className="absolute top-0 right-0 bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">
                MOST POPULAR
              </div>
              <h3 className="text-2xl font-bold mb-2">Premium Plan</h3>
              <div className="flex items-end mb-4">
                <span className="text-4xl font-bold">$4.99</span>
                <span className="text-slate-500 dark:text-slate-400 ml-1">/month</span>
              </div>
              <p className="text-slate-600 dark:text-slate-300 mb-6">
                Everything you need for enhanced email privacy and management.
              </p>
              <ul className="space-y-3 mb-6">
                <li className="flex items-center">
                  <Check className="h-5 w-5 text-emerald-500 mr-2" />
                  <span className="text-slate-600 dark:text-slate-300">All free features</span>
                </li>
                <li className="flex items-center">
                  <Check className="h-5 w-5 text-emerald-500 mr-2" />
                  <span className="text-slate-600 dark:text-slate-300">Premium support</span>
                </li>
                <li className="flex items-center">
                  <Check className="h-5 w-5 text-emerald-500 mr-2" />
                  <span className="text-slate-600 dark:text-slate-300">No advertisements</span>
                </li>
              </ul>
              <Button className="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white">
                Get Started
              </Button>
            </div>
          </div>
        </div>
      </div>

      <div className="text-center mb-16">
        <h2 className="text-3xl font-bold mb-4 bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
          How It Works
        </h2>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto mb-12">
          Using TempMail is simple and straightforward. Get started in seconds with no registration required.
        </p>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div className="flex flex-col items-center">
            <div className="h-16 w-16 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mb-4">
              <span className="text-2xl font-bold text-emerald-600 dark:text-emerald-400">1</span>
            </div>
            <h3 className="text-xl font-semibold mb-2">Generate Email</h3>
            <p className="text-slate-600 dark:text-slate-300 text-center">
              Click the generate button to instantly create a new temporary email address.
            </p>
          </div>
          <div className="flex flex-col items-center">
            <div className="h-16 w-16 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mb-4">
              <span className="text-2xl font-bold text-emerald-600 dark:text-emerald-400">2</span>
            </div>
            <h3 className="text-xl font-semibold mb-2">Use Anywhere</h3>
            <p className="text-slate-600 dark:text-slate-300 text-center">
              Use your temporary email address for sign-ups, forms, or any online service.
            </p>
          </div>
          <div className="flex flex-col items-center">
            <div className="h-16 w-16 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mb-4">
              <span className="text-2xl font-bold text-emerald-600 dark:text-emerald-400">3</span>
            </div>
            <h3 className="text-xl font-semibold mb-2">Receive Emails</h3>
            <p className="text-slate-600 dark:text-slate-300 text-center">
              Instantly receive emails in your temporary inbox without revealing your real email.
            </p>
          </div>
        </div>
      </div>

      <div className="bg-slate-100 dark:bg-slate-800 rounded-2xl p-8 md:p-12 text-center">
        <h2 className="text-3xl font-bold mb-4">Ready to protect your privacy?</h2>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto mb-8">
          Start using TempMail today and take control of your online identity.
        </p>
        <div className="flex flex-col sm:flex-row justify-center gap-4">
          <Button
            size="lg"
            className="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white"
          >
            <Link href="/">Get Started</Link>
          </Button>
          <Button size="lg" variant="outline">
            <Link href="/contact">Contact Sales</Link>
          </Button>
        </div>
      </div>
    </div>
  )
}
