"use client"
import { Sun, Menu } from "lucide-react"
import { Button } from "@/components/ui/button"
import { useTheme } from "next-themes"
import { Sheet, SheetContent, SheetTrigger } from "@/components/ui/sheet"
import { motion } from "framer-motion"
import Link from "next/link"
import { usePathname } from "next/navigation"

export function TempMailHeader() {
  const { setTheme, theme } = useTheme()
  const pathname = usePathname()
  
  const toggleTheme = () => {
    setTheme(theme === "dark" ? "light" : "dark")
  }

  const menuItems = [
    { name: "Home", href: "/" },
    { name: "Features", href: "/features" },
    { name: "FAQ", href: "/faq" },
    { name: "Contact", href: "/contact" },
  ]

  const isActive = (path: string) => {
    return pathname === path
  }

  return (
    <header className="border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-950/80 backdrop-blur-sm sticky top-0 z-50">
      <div className="container mx-auto px-4 py-3">
        <div className="flex items-center justify-between">
          <motion.div
            className="flex items-center gap-2"
            initial={{ opacity: 0, x: -20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.5 }}
          >
            <Link href="/" className="flex items-center gap-2">
              <div className="h-9 w-9 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                <span className="text-white font-semibold text-sm">TM</span>
              </div>
              <span className="font-medium text-lg bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
                TempMail
              </span>
            </Link>
          </motion.div>

          {/* Desktop Navigation */}
          <motion.nav
            className="hidden md:flex items-center space-x-8"
            initial={{ opacity: 0, y: -10 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.1 }}
          >
            {menuItems.map((item, index) => (
              <motion.div
                key={item.name}
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.3, delay: 0.1 + index * 0.05 }}
              >
                <Link
                  href={item.href}
                  className={`text-sm font-medium transition-colors relative group ${
                    isActive(item.href)
                      ? "text-emerald-600 dark:text-emerald-400"
                      : "text-slate-600 hover:text-emerald-600 dark:text-slate-300 dark:hover:text-emerald-400"
                  }`}
                >
                  {item.name}
                  <span className={`absolute -bottom-1 left-0 h-0.5 bg-emerald-500 transition-all duration-300 ${
                    isActive(item.href) ? "w-full" : "w-0 group-hover:w-full"
                  }`}></span>
                </Link>
              </motion.div>
            ))}
          </motion.nav>

          <motion.div
            className="flex items-center gap-2"
            initial={{ opacity: 0, x: 20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.5 }}
          >
            <Button
              variant="ghost"
              size="icon"
              onClick={toggleTheme}
              className="rounded-full h-9 w-9 hover:bg-slate-100 dark:hover:bg-slate-800"
              aria-label="Toggle theme"
            >
              <Sun className="h-[1.2rem] w-[1.2rem] rotate-0 scale-100 transition-all dark:-rotate-90 dark:scale-0 text-amber-500" />
            </Button>
          </motion.div>

          {/* Mobile Navigation */}
          <Sheet>
            <SheetTrigger asChild>
              <Button variant="ghost" size="icon" className="md:hidden">
                <Menu />
              </Button>
            </SheetTrigger>
            <SheetContent side="left" className="p-4">
              <div className="grid gap-4">
                {menuItems.map((item) => (
                  <Link key={item.name} href={item.href} className="block py-2 text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400">
                    {item.name}
                  </Link>
                ))}
              </div>
            </SheetContent>
          </Sheet>
        </div>
      </div>
    </header>\
