import { Mail, Shield, HelpCircle, Github, Twitter, Linkedin } from "lucide-react"
import { Button } from "@/components/ui/button"
import Link from "next/link"

export default function Footer() {
  const currentYear = new Date().getFullYear()

  return (
    <footer className="border-t border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-950/80 backdrop-blur-sm mt-12">
      <div className="container mx-auto px-4 py-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div className="space-y-4">
            <div className="flex items-center gap-2">
              <Link href="/" aria-label="TempMail Home">
                <div className="h-8 w-8 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                  <span className="text-white font-semibold text-sm">TM</span>
                </div>
              </Link>
              <Link
                href="/"
                className="font-medium text-lg bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text"
              >
                TempMail
              </Link>
            </div>
            <p className="text-sm text-slate-500 dark:text-slate-400">
              Secure, temporary email addresses for your privacy needs. No registration required.
            </p>
            <div className="flex space-x-3">
              <Button variant="ghost" size="icon" className="h-8 w-8 rounded-full" aria-label="GitHub">
                <Github className="h-4 w-4" />
                <span className="sr-only">GitHub</span>
              </Button>
              <Button variant="ghost" size="icon" className="h-8 w-8 rounded-full" aria-label="Twitter">
                <Twitter className="h-4 w-4" />
                <span className="sr-only">Twitter</span>
              </Button>
              <Button variant="ghost" size="icon" className="h-8 w-8 rounded-full" aria-label="LinkedIn">
                <Linkedin className="h-4 w-4" />
                <span className="sr-only">LinkedIn</span>
              </Button>
            </div>
          </div>

          <div>
            <h3 className="font-medium mb-4 text-sm">Services</h3>
            <ul className="space-y-2">
              <li>
                <Link
                  href="/"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Temporary Email
                </Link>
              </li>
              <li>
                <Link
                  href="/features"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Email Forwarding
                </Link>
              </li>
              <li>
                <Link
                  href="/features"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Premium Features
                </Link>
              </li>
              <li>
                <Link
                  href="/features"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  API Access
                </Link>
              </li>
            </ul>
          </div>

          <div>
            <h3 className="font-medium mb-4 text-sm">Support</h3>
            <ul className="space-y-2">
              <li>
                <Link
                  href="/faq"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Help Center
                </Link>
              </li>
              <li>
                <Link
                  href="/faq"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  FAQ
                </Link>
              </li>
              <li>
                <Link
                  href="/contact"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Contact Us
                </Link>
              </li>
              <li>
                <Link
                  href="/contact"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Report Abuse
                </Link>
              </li>
            </ul>
          </div>

          <div>
            <h3 className="font-medium mb-4 text-sm">Legal</h3>
            <ul className="space-y-2">
              <li>
                <Link
                  href="#"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Terms of Service
                </Link>
              </li>
              <li>
                <Link
                  href="#"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Privacy Policy
                </Link>
              </li>
              <li>
                <Link
                  href="#"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  Cookie Policy
                </Link>
              </li>
              <li>
                <Link
                  href="#"
                  className="text-sm text-slate-500 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors"
                >
                  GDPR Compliance
                </Link>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t border-slate-200 dark:border-slate-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
          <p className="text-xs text-slate-500 dark:text-slate-400">© {currentYear} TempMail. All rights reserved.</p>

          <div className="flex items-center space-x-4 mt-4 md:mt-0">
            <div className="flex items-center text-xs text-slate-500 dark:text-slate-400">
              <Mail className="h-3 w-3 mr-1" />
              <span>contact@tempmail.io</span>
            </div>
            <div className="flex items-center text-xs text-slate-500 dark:text-slate-400">
              <Shield className="h-3 w-3 mr-1" />
              <span>Secure & Private</span>
            </div>
            <div className="flex items-center text-xs text-slate-500 dark:text-slate-400">
              <HelpCircle className="h-3 w-3 mr-1" />
              <span>24/7 Support</span>
            </div>
          </div>
        </div>
      </div>
    </footer>
  )
}
