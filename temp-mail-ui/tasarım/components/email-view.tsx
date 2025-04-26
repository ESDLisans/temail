"use client"

import { useState } from "react"
import { ArrowLeft, Download, Trash2, Star, Reply, Forward, MoreHorizontal, Mail } from "lucide-react"
import { Button } from "@/components/ui/button"
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

export default function EmailView() {
  const { toast } = useToast()
  const [deleteDialogOpen, setDeleteDialogOpen] = useState(false)
  const [emailDeleted, setEmailDeleted] = useState(false)
  const [starred, setStarred] = useState(false)

  // This would normally be a selected email from state
  const [email, setEmail] = useState({
    id: 1,
    sender: "notifications@example.com",
    senderName: "Example Service",
    subject: "Your account has been verified",
    time: "Today at 10:45 AM",
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
  })

  const handleDeleteClick = () => {
    setDeleteDialogOpen(true)
  }

  const confirmDelete = () => {
    setEmailDeleted(true)
    setDeleteDialogOpen(false)
    toast({
      description: "Email deleted successfully",
      duration: 3000,
    })
  }

  return (
    <>
      <motion.div initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.3 }}>
        <div>
          {email && !emailDeleted ? (
            <div>
              <div className="flex items-center gap-2 mb-6">
                <Button variant="outline" size="icon" className="h-9 w-9 rounded-full">
                  <ArrowLeft className="h-4 w-4" />
                  <span className="sr-only">Back to inbox</span>
                </Button>
                <div className="flex-1" />
                <div className="flex items-center gap-1">
                  <Button
                    variant="ghost"
                    size="icon"
                    className={`h-9 w-9 rounded-full ${starred ? "text-amber-500" : ""}`}
                    onClick={() => setStarred(!starred)}
                  >
                    <Star className={`h-4 w-4 ${starred ? "fill-current" : ""}`} />
                    <span className="sr-only">Star email</span>
                  </Button>
                  <Button variant="ghost" size="icon" className="h-9 w-9 rounded-full">
                    <Reply className="h-4 w-4" />
                    <span className="sr-only">Reply</span>
                  </Button>
                  <Button variant="ghost" size="icon" className="h-9 w-9 rounded-full">
                    <Forward className="h-4 w-4" />
                    <span className="sr-only">Forward</span>
                  </Button>
                  <Button variant="ghost" size="icon" className="h-9 w-9 rounded-full">
                    <Download className="h-4 w-4" />
                    <span className="sr-only">Download</span>
                  </Button>
                  <Button
                    variant="ghost"
                    size="icon"
                    className="h-9 w-9 rounded-full hover:text-red-500"
                    onClick={handleDeleteClick}
                  >
                    <Trash2 className="h-4 w-4" />
                    <span className="sr-only">Delete</span>
                  </Button>
                  <Button variant="ghost" size="icon" className="h-9 w-9 rounded-full">
                    <MoreHorizontal className="h-4 w-4" />
                    <span className="sr-only">More options</span>
                  </Button>
                </div>
              </div>

              <div className="mb-6">
                <h2 className="text-xl font-medium mb-4">{email.subject}</h2>
                <div className="flex items-start gap-3 p-4 rounded-lg border border-slate-200 bg-slate-50">
                  <div className="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-medium text-sm">
                    {email.senderName.charAt(0)}
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="flex items-center justify-between mb-1">
                      <div>
                        <p className="text-sm font-medium">{email.senderName}</p>
                        <p className="text-xs text-slate-500">{email.sender}</p>
                      </div>
                      <p className="text-xs text-slate-500">{email.time}</p>
                    </div>
                    <p className="text-xs text-slate-500">To: temp.user28491@tempmail.io</p>
                  </div>
                </div>
              </div>

              <div className="prose prose-slate prose-sm max-w-none p-4 rounded-lg border border-slate-200 bg-white">
                <div dangerouslySetInnerHTML={{ __html: email.content }} />
              </div>
            </div>
          ) : (
            <div className="py-12 flex flex-col items-center justify-center text-center">
              <div className="h-16 w-16 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                <Mail className="h-8 w-8 text-slate-400" />
              </div>
              <h3 className="text-lg font-medium mb-1">
                {emailDeleted ? "Email has been deleted" : "Select an email from your inbox to view it here"}
              </h3>
              <p className="text-sm text-slate-500 max-w-xs">
                {emailDeleted
                  ? "Return to your inbox to view other messages"
                  : "Click on an email in your inbox to view its contents"}
              </p>
            </div>
          )}
        </div>
      </motion.div>

      <AlertDialog open={deleteDialogOpen} onOpenChange={setDeleteDialogOpen}>
        <AlertDialogContent className="bg-white border-slate-200">
          <AlertDialogHeader>
            <AlertDialogTitle>Delete Email</AlertDialogTitle>
            <AlertDialogDescription>
              Are you sure you want to delete this email? This action cannot be undone.
            </AlertDialogDescription>
          </AlertDialogHeader>
          <AlertDialogFooter>
            <AlertDialogCancel>Cancel</AlertDialogCancel>
            <AlertDialogAction onClick={confirmDelete} className="bg-red-500 hover:bg-red-600">
              Delete
            </AlertDialogAction>
          </AlertDialogFooter>
        </AlertDialogContent>
      </AlertDialog>
    </>
  )
}
