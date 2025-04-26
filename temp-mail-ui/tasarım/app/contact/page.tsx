import type { Metadata } from "next"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Mail, Phone, MapPin, MessageSquare, Clock } from "lucide-react"
import ContactForm from "@/components/contact-form"

export const metadata: Metadata = {
  title: "Contact Us - TempMail",
  description:
    "Get in touch with the TempMail team. We're here to help with any questions or concerns about our temporary email service.",
}

export default function ContactPage() {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="text-center mb-16">
        <h1 className="text-4xl font-bold mb-4 bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
          Contact Us
        </h1>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
          Have questions or feedback? We'd love to hear from you. Our team is here to help.
        </p>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
        <Card className="border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-sm">
          <CardHeader className="pb-2">
            <Mail className="h-6 w-6 text-emerald-500 mb-2" />
            <CardTitle className="text-xl">Email Us</CardTitle>
          </CardHeader>
          <CardContent>
            <CardDescription className="text-slate-600 dark:text-slate-300">
              <a href="mailto:support@tempmail.io" className="hover:text-emerald-600 dark:hover:text-emerald-400">
                support@tempmail.io
              </a>
              <p className="mt-2">For general inquiries and support</p>
            </CardDescription>
          </CardContent>
        </Card>

        <Card className="border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-sm">
          <CardHeader className="pb-2">
            <Phone className="h-6 w-6 text-emerald-500 mb-2" />
            <CardTitle className="text-xl">Call Us</CardTitle>
          </CardHeader>
          <CardContent>
            <CardDescription className="text-slate-600 dark:text-slate-300">
              <a href="tel:+1234567890" className="hover:text-emerald-600 dark:hover:text-emerald-400">
                +1 (234) 567-890
              </a>
              <p className="mt-2">Monday to Friday, 9am to 5pm EST</p>
            </CardDescription>
          </CardContent>
        </Card>

        <Card className="border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 shadow-sm">
          <CardHeader className="pb-2">
            <MapPin className="h-6 w-6 text-emerald-500 mb-2" />
            <CardTitle className="text-xl">Visit Us</CardTitle>
          </CardHeader>
          <CardContent>
            <CardDescription className="text-slate-600 dark:text-slate-300">
              <p>123 Privacy Street</p>
              <p>Secure City, SC 12345</p>
              <p className="mt-2">By appointment only</p>
            </CardDescription>
          </CardContent>
        </Card>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
        <div>
          <h2 className="text-3xl font-bold mb-6 bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
            Send Us a Message
          </h2>
          <p className="text-slate-600 dark:text-slate-300 mb-8">
            Fill out the form below and we'll get back to you as soon as possible. We value your feedback and are
            committed to providing excellent support.
          </p>

          <div className="space-y-6">
            <div className="flex items-start">
              <MessageSquare className="h-6 w-6 text-emerald-500 mr-3 mt-0.5" />
              <div>
                <h3 className="font-medium">Quick Response</h3>
                <p className="text-slate-600 dark:text-slate-300">
                  We aim to respond to all inquiries within 24 hours.
                </p>
              </div>
            </div>

            <div className="flex items-start">
              <Clock className="h-6 w-6 text-emerald-500 mr-3 mt-0.5" />
              <div>
                <h3 className="font-medium">Support Hours</h3>
                <p className="text-slate-600 dark:text-slate-300">
                  Our support team is available Monday to Friday, 9am to 5pm EST.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div className="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-lg p-6 shadow-sm">
          <ContactForm />
        </div>
      </div>

      <div className="rounded-lg overflow-hidden h-96 mb-16">
        <iframe
          title="TempMail Office Location"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059353029!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sca!4v1619712000000!5m2!1sen!2sca"
          width="100%"
          height="100%"
          style={{ border: 0 }}
          allowFullScreen={true}
          loading="lazy"
        ></iframe>
      </div>

      <div className="bg-slate-100 dark:bg-slate-800 rounded-2xl p-8 md:p-12 text-center">
        <h2 className="text-3xl font-bold mb-4">Join Our Community</h2>
        <p className="text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto mb-8">
          Follow us on social media for the latest updates, tips, and news about online privacy.
        </p>
        <div className="flex justify-center space-x-4">
          <a
            href="#"
            className="bg-white dark:bg-slate-950 h-12 w-12 rounded-full flex items-center justify-center shadow-sm hover:shadow-md transition-shadow"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="text-emerald-500"
            >
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          <a
            href="#"
            className="bg-white dark:bg-slate-950 h-12 w-12 rounded-full flex items-center justify-center shadow-sm hover:shadow-md transition-shadow"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="text-emerald-500"
            >
              <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
            </svg>
          </a>
          <a
            href="#"
            className="bg-white dark:bg-slate-950 h-12 w-12 rounded-full flex items-center justify-center shadow-sm hover:shadow-md transition-shadow"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="text-emerald-500"
            >
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a
            href="#"
            className="bg-white dark:bg-slate-950 h-12 w-12 rounded-full flex items-center justify-center shadow-sm hover:shadow-md transition-shadow"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
              className="text-emerald-500"
            >
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
              <rect x="2" y="9" width="4" height="12"></rect>
              <circle cx="4" cy="4" r="2"></circle>
            </svg>
          </a>
        </div>
      </div>
    </div>
  )
}
