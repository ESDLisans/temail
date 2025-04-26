"use client"

import { useState, useEffect, useCallback } from "react"
import { Inbox, RefreshCw, Copy, Mail, Clock, Trash2, CheckCircle2, Star } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"
import EmailList from "@/components/email-list"
import FavoritesList from "@/components/favorites-list"
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
} from "@/components/ui/alert-dialog"
import { useToast } from "@/components/ui/use-toast"
import { motion } from "framer-motion"
import EmailContent from "@/components/email-content"

export default function TempMailApp() {
  const { toast } = useToast()
  const [deleteAddressDialogOpen, setDeleteAddressDialogOpen] = useState(false)
  const [emailAddress, setEmailAddress] = useState("temp.user28491@tempmail.io")
  const [copied, setCopied] = useState(false)
  const [refreshing, setRefreshing] = useState(false)
  const [timeLeft, setTimeLeft] = useState(10 * 60 * 60) // 10 hours in seconds
  const [emails, setEmails] = useState([
    {
      id: 1,
      sender: "notifications@example.com",
      senderName: "Example Service",
      subject: "Your account has been verified",
      preview: "Thank you for verifying your account. You can now access all features...",
      time: "10:45 AM",
      read: false,
      starred: false,
      content: `
        <p>Hello,</p>
        <p>Thank you for verifying your account. You can now access all features of our service.</p>
        <p>Here's what you can do next:</p>
        <ul>
          <li>Complete your profile</li>
          <li>Explore our premium features</li>
          <li>Connect with other users</li>
        </ul>
        <p>If you have any questions, please don't hesitate to contact our support team.</p>
        <p>Best regards,<br>The Example Team</p>
      `,
    },
    {
      id: 2,
      sender: "newsletter@tech-updates.com",
      senderName: "Tech Updates",
      subject: "Weekly Tech Digest: AI Advancements",
      preview: "This week in tech: New breakthroughs in artificial intelligence are changing...",
      time: "Yesterday",
      read: true,
      starred: true,
      content: `
        <p>Hello Tech Enthusiast,</p>
        <p>This week in tech has been exciting with several breakthroughs in artificial intelligence:</p>
        <ul>
          <li>New language models with improved reasoning capabilities</li>
          <li>Advancements in computer vision for medical diagnostics</li>
          <li>AI-powered tools for climate change research</li>
        </ul>
        <p>Stay tuned for more updates next week!</p>
        <p>Best regards,<br>The Tech Updates Team</p>
      `,
    },
    {
      id: 3,
      sender: "support@service.io",
      senderName: "Service Support",
      subject: "Your subscription is expiring soon",
      preview: "Your premium subscription will expire in 3 days. Renew now to continue...",
      time: "2 days ago",
      read: true,
      starred: false,
      content: `
        <p>Dear User,</p>
        <p>This is a reminder that your premium subscription will expire in 3 days.</p>
        <p>To continue enjoying all premium features without interruption, please renew your subscription.</p>
        <p>Benefits of renewing:</p>
        <ul>
          <li>Uninterrupted access to all premium features</li>
          <li>No need to set up your preferences again</li>
          <li>Special discount for loyal customers</li>
        </ul>
        <p>Thank you for your continued support!</p>
        <p>Best regards,<br>The Service Support Team</p>
      `,
    },
  ])

  const [selectedEmail, setSelectedEmail] = useState<number | null>(null)

  // Add this function to handle toggling star status
  const toggleStar = useCallback((id: number) => {
    setEmails((prevEmails) =>
      prevEmails.map((email) => (email.id === id ? { ...email, starred: !email.starred } : email)),
    )
  }, [])

  // Add this function to handle marking emails as read
  const markAsRead = useCallback((id: number) => {
    setEmails((prevEmails) => prevEmails.map((email) => (email.id === id ? { ...email, read: true } : email)))
  }, [])

  // Add this function to handle deleting emails
  const deleteEmail = useCallback(
    (id: number) => {
      setEmails((prevEmails) => prevEmails.filter((email) => email.id !== id))
      if (selectedEmail === id) {
        setSelectedEmail(null)
      }
    },
    [selectedEmail],
  )

  useEffect(() => {
    // Update time left every minute
    const timer = setInterval(() => {
      setTimeLeft((prev) => Math.max(0, prev - 60))
    }, 60000)

    return () => clearInterval(timer)
  }, [])

  // Format time left as hours and minutes
  const formatTimeLeft = () => {
    const hours = Math.floor(timeLeft / 3600)
    const minutes = Math.floor((timeLeft % 3600) / 60)
    return `${hours}h ${minutes}m`
  }

  const handleDeleteAddress = () => {
    setEmailAddress("") // Clear the email address
    toast({
      description: "Email address deleted successfully",
      duration: 3000,
    })
    setDeleteAddressDialogOpen(false)

    // Generate a new email address after a short delay
    setTimeout(() => {
      setEmailAddress("temp.user" + Math.floor(Math.random() * 100000) + "@tempmail.io")
      setTimeLeft(10 * 60 * 60) // Reset timer
      toast({
        description: "New email address generated",
        duration: 3000,
      })
    }, 1000)
  }

  const handleRefreshAddress = () => {
    setRefreshing(true)
    setTimeout(() => {
      setEmailAddress("temp.user" + Math.floor(Math.random() * 100000) + "@tempmail.io")
      setTimeLeft(10 * 60 * 60) // Reset timer
      setRefreshing(false)
      toast({
        description: "New email address generated",
        duration: 3000,
      })
    }, 800)
  }

  const handleCopyAddress = () => {
    navigator.clipboard.writeText(emailAddress)
    setCopied(true)
    toast({
      description: "Email address copied to clipboard",
      duration: 3000,
    })
    setTimeout(() => setCopied(false), 2000)
  }

  return (
    <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.5 }}>
      <Card className="w-full shadow-md border-slate-200/80 dark:border-slate-800/80 overflow-hidden backdrop-blur-sm bg-white/80 dark:bg-slate-950/80">
        <div className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-400 to-teal-500"></div>
        <CardHeader className="pb-4">
          <CardTitle className="text-2xl font-medium flex items-center gap-2">
            <div className="p-1.5 rounded-md bg-gradient-to-br from-emerald-500 to-teal-600 text-white">
              <Mail className="h-5 w-5" />
            </div>
            <span className="bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 text-transparent bg-clip-text">
              Temporary Email
            </span>
          </CardTitle>
          <CardDescription>Generate a disposable email address for temporary use</CardDescription>
        </CardHeader>
        <CardContent>
          <div className="flex flex-col md:flex-row gap-4 mb-6">
            <motion.div
              className="flex-1 p-4 bg-slate-50 dark:bg-slate-900 rounded-md border border-slate-200 dark:border-slate-800 flex items-center relative overflow-hidden group"
              whileHover={{ scale: 1.01 }}
              transition={{ type: "spring", stiffness: 400, damping: 10 }}
            >
              <div className="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
              <span className="text-slate-900 dark:text-slate-100 font-medium break-all">{emailAddress}</span>
            </motion.div>
            <div className="flex gap-2">
              <motion.div whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}>
                <Button
                  variant="outline"
                  size="icon"
                  className={`h-12 w-12 relative ${
                    copied ? "border-emerald-500 text-emerald-500" : ""
                  } transition-colors`}
                  onClick={handleCopyAddress}
                  aria-label="Copy email address"
                >
                  {copied ? <CheckCircle2 className="h-5 w-5" /> : <Copy className="h-5 w-5" />}
                  <span className="sr-only">Copy email address</span>
                </Button>
              </motion.div>
              <motion.div whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}>
                <Button
                  variant="outline"
                  size="icon"
                  className="h-12 w-12 relative"
                  onClick={handleRefreshAddress}
                  disabled={refreshing}
                  aria-label="Generate new email"
                >
                  <RefreshCw className={`h-5 w-5 ${refreshing ? "animate-spin" : ""}`} />
                  <span className="sr-only">Generate new email</span>
                </Button>
              </motion.div>
              <motion.div whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}>
                <Button
                  variant="outline"
                  size="icon"
                  className="h-12 w-12 relative hover:border-red-500 hover:text-red-500 transition-colors"
                  onClick={() => setDeleteAddressDialogOpen(true)}
                  aria-label="Delete email address"
                >
                  <Trash2 className="h-5 w-5" />
                  <span className="sr-only">Delete email address</span>
                </Button>
              </motion.div>
            </div>
          </div>

          <div className="flex items-center justify-between mb-6">
            <div className="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-full">
              <Clock className="h-4 w-4 text-emerald-500" />
              <span>Auto-deletes in {formatTimeLeft()}</span>
            </div>
            <Button
              variant="ghost"
              size="sm"
              className="gap-1 hover:bg-emerald-50 dark:hover:bg-emerald-950 hover:text-emerald-600 dark:hover:text-emerald-400"
              aria-label="Refresh inbox"
            >
              <RefreshCw className="h-3 w-3" />
              Refresh Inbox
            </Button>
          </div>

          <Tabs defaultValue="inbox" className="w-full">
            <TabsList className="grid w-full grid-cols-2 p-1 bg-slate-100 dark:bg-slate-800 rounded-lg">
              <TabsTrigger
                value="inbox"
                className="flex items-center gap-1 data-[state=active]:bg-white dark:data-[state=active]:bg-slate-950 data-[state=active]:shadow-sm rounded-md"
              >
                <Inbox className="h-4 w-4" />
                Inbox
              </TabsTrigger>
              <TabsTrigger
                value="favorites"
                className="flex items-center gap-1 data-[state=active]:bg-white dark:data-[state=active]:bg-slate-950 data-[state=active]:shadow-sm rounded-md"
              >
                <Star className="h-4 w-4" />
                Favorites
              </TabsTrigger>
            </TabsList>
            <TabsContent value="inbox" className="mt-6">
              {selectedEmail ? (
                <EmailContent
                  email={emails.find((e) => e.id === selectedEmail)}
                  onBack={() => setSelectedEmail(null)}
                  onDelete={deleteEmail}
                  onToggleStar={toggleStar}
                />
              ) : (
                <EmailList
                  emails={emails}
                  onEmailClick={(id) => {
                    setSelectedEmail(id)
                    markAsRead(id)
                  }}
                  onToggleStar={toggleStar}
                  onDeleteEmail={deleteEmail}
                />
              )}
            </TabsContent>
            <TabsContent value="favorites" className="mt-6">
              <FavoritesList
                emails={emails.filter((email) => email.starred)}
                onEmailClick={(id) => {
                  setSelectedEmail(id)
                  markAsRead(id)
                }}
                onToggleStar={toggleStar}
                onDeleteEmail={deleteEmail}
              />
            </TabsContent>
          </Tabs>
        </CardContent>
        <CardFooter className="flex flex-col items-start pt-0">
          <p className="text-xs text-slate-500 dark:text-slate-400">
            All emails are automatically deleted after 10 hours. Your privacy is our priority.
          </p>
        </CardFooter>
      </Card>

      {/* Delete Email Address Confirmation Dialog */}
      <AlertDialog open={deleteAddressDialogOpen} onOpenChange={setDeleteAddressDialogOpen}>
        <AlertDialogContent className="bg-white dark:bg-slate-950 border-slate-200 dark:border-slate-800">
          <AlertDialogHeader>
            <AlertDialogTitle>Delete Email Address</AlertDialogTitle>
            <AlertDialogDescription>
              Are you sure you want to delete this email address? A new one will be generated automatically.
            </AlertDialogDescription>
          </AlertDialogHeader>
          <AlertDialogFooter>
            <AlertDialogCancel>Cancel</AlertDialogCancel>
            <AlertDialogAction onClick={handleDeleteAddress} className="bg-red-500 hover:bg-red-600">
              Delete
            </AlertDialogAction>
          </AlertDialogFooter>
        </AlertDialogContent>
      </AlertDialog>
    </motion.div>
  )
}
