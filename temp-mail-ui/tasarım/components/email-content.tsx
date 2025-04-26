"use client"

import { ArrowLeft, Download, Trash2, Star, Reply, Forward, MoreHorizontal } from "lucide-react"
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
import { useState } from "react"

interface Email {
  id: number
  sender: string
  senderName: string
  subject: string
  preview: string
  time: string
  read: boolean
  starred: boolean
  content?: string
}

interface EmailContentProps {
  email?: Email
  onBack: () => void
  onDelete: (id: number) => void
  onToggleStar: (id: number) => void
}

export default function EmailContent({ email, onBack, onDelete, onToggleStar }: EmailContentProps) {
  const { toast } = useToast()
  const [deleteDialogOpen, setDeleteDialogOpen] = useState(false)

  if (!email) {
    return (
      <div className="py-12 flex flex-col items-center justify-center text-center">
        <p>Email not found</p>
        <Button variant="outline" className="mt-4" onClick={onBack}>
          Back to inbox
        </Button>
      </div>
    )
  }

  const handleDelete = () => {
    setDeleteDialogOpen(true)
  }

  const confirmDelete = () => {
    onDelete(email.id)
    toast({
      description: "Email deleted successfully",
      duration: 3000,
    })
    setDeleteDialogOpen(false)
    onBack()
  }

  const handleToggleStar = () => {
    onToggleStar(email.id)
    toast({
      description: email.starred ? "Email removed from favorites" : "Email added to favorites",
      duration: 3000,
    })
  }

  return (
    <motion.div initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.3 }}>
      <div>
        <div className="flex items-center gap-2 mb-6">
          <Button variant="outline" size="icon" className="h-9 w-9 rounded-full" onClick={onBack}>
            <ArrowLeft className="h-4 w-4" />
            <span className="sr-only">Back to inbox</span>
          </Button>
          <div className="flex-1" />
          <div className="flex items-center gap-1">
            <Button
              variant="ghost"
              size="icon"
              className={`h-9 w-9 rounded-full ${email.starred ? "text-amber-500" : ""}`}
              onClick={handleToggleStar}
            >
              <Star className={`h-4 w-4 ${email.starred ? "fill-current" : ""}`} />
              <span className="sr-only">{email.starred ? "Remove from favorites" : "Add to favorites"}</span>
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
              onClick={handleDelete}
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
          <div className="flex items-start gap-3 p-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900">
            <div className="h-10 w-10 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center text-emerald-600 dark:text-emerald-300 font-medium text-sm">
              {email.senderName.charAt(0)}
            </div>
            <div className="flex-1 min-w-0">
              <div className="flex items-center justify-between mb-1">
                <div>
                  <p className="text-sm font-medium">{email.senderName}</p>
                  <p className="text-xs text-slate-500 dark:text-slate-400">{email.sender}</p>
                </div>
                <p className="text-xs text-slate-500 dark:text-slate-400">{email.time}</p>
              </div>
              <p className="text-xs text-slate-500 dark:text-slate-400">To: temp.user28491@tempmail.io</p>
            </div>
          </div>
        </div>

        <div className="prose prose-slate dark:prose-invert prose-sm max-w-none p-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950">
          <div dangerouslySetInnerHTML={{ __html: email.content || "" }} />
        </div>
      </div>

      <AlertDialog open={deleteDialogOpen} onOpenChange={setDeleteDialogOpen}>
        <AlertDialogContent className="bg-white dark:bg-slate-950 border-slate-200 dark:border-slate-800">
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
    </motion.div>
  )
}
