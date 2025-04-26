"use client"

import { useState } from "react"
import { Mail, Trash2, Star, MoreHorizontal, Search } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
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

interface EmailListProps {
  emails: Email[]
  onEmailClick: (id: number) => void
  onToggleStar: (id: number) => void
  onDeleteEmail: (id: number) => void
}

export default function EmailList({ emails, onEmailClick, onToggleStar, onDeleteEmail }: EmailListProps) {
  const { toast } = useToast()
  const [deleteDialogOpen, setDeleteDialogOpen] = useState(false)
  const [emailToDelete, setEmailToDelete] = useState<number | null>(null)
  const [searchQuery, setSearchQuery] = useState("")

  const filteredEmails = emails.filter(
    (email) =>
      email.sender.toLowerCase().includes(searchQuery.toLowerCase()) ||
      email.subject.toLowerCase().includes(searchQuery.toLowerCase()) ||
      email.preview.toLowerCase().includes(searchQuery.toLowerCase()),
  )

  const handleDeleteClick = (id: number) => {
    setEmailToDelete(id)
    setDeleteDialogOpen(true)
  }

  const confirmDelete = () => {
    if (emailToDelete !== null) {
      onDeleteEmail(emailToDelete)
      toast({
        description: "Email deleted successfully",
        duration: 3000,
      })
      setDeleteDialogOpen(false)
      setEmailToDelete(null)
    }
  }

  const handleToggleStar = (id: number, currentStarred: boolean) => {
    onToggleStar(id)
    toast({
      description: currentStarred ? "Email removed from favorites" : "Email added to favorites",
      duration: 3000,
    })
  }

  return (
    <>
      <div className="mb-4 relative">
        <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-slate-400" />
        <Input
          placeholder="Search emails..."
          className="pl-10 bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-800"
          value={searchQuery}
          onChange={(e) => setSearchQuery(e.target.value)}
        />
      </div>

      <div className="space-y-2">
        {filteredEmails.length > 0 ? (
          filteredEmails.map((email, index) => (
            <motion.div
              key={email.id}
              initial={{ opacity: 0, y: 10 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.3, delay: index * 0.1 }}
            >
              <div
                className={`p-4 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition-all ${
                  !email.read ? "bg-emerald-50 dark:bg-emerald-950/30" : "bg-white dark:bg-slate-950"
                } border border-slate-200 dark:border-slate-800 shadow-sm`}
                onClick={() => onEmailClick(email.id)}
              >
                <div className="flex items-start gap-3">
                  <div className="flex flex-col items-center gap-1 mt-1">
                    <div
                      className={`h-2 w-2 rounded-full flex-shrink-0 ${
                        !email.read ? "bg-emerald-500" : "bg-transparent"
                      }`}
                    />
                    <Button
                      variant="ghost"
                      size="icon"
                      className={`h-6 w-6 ${email.starred ? "text-amber-500" : "text-slate-300 dark:text-slate-600"}`}
                      onClick={(e) => {
                        e.stopPropagation()
                        handleToggleStar(email.id, email.starred)
                      }}
                    >
                      <Star className={`h-4 w-4 ${email.starred ? "fill-current" : ""}`} />
                      <span className="sr-only">Star email</span>
                    </Button>
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="flex items-center justify-between mb-1">
                      <div>
                        <p className="text-sm font-medium">{email.senderName}</p>
                        <p className="text-xs text-slate-500 dark:text-slate-400">{email.sender}</p>
                      </div>
                      <div className="flex items-center gap-2">
                        <span className="text-xs text-slate-500 dark:text-slate-400 whitespace-nowrap">
                          {email.time}
                        </span>
                        <div className="flex">
                          <Button
                            variant="ghost"
                            size="icon"
                            className="h-7 w-7 hover:text-red-500"
                            onClick={(e) => {
                              e.stopPropagation()
                              handleDeleteClick(email.id)
                            }}
                          >
                            <Trash2 className="h-4 w-4" />
                            <span className="sr-only">Delete</span>
                          </Button>
                          <Button
                            variant="ghost"
                            size="icon"
                            className="h-7 w-7"
                            onClick={(e) => {
                              e.stopPropagation()
                            }}
                          >
                            <MoreHorizontal className="h-4 w-4" />
                            <span className="sr-only">More options</span>
                          </Button>
                        </div>
                      </div>
                    </div>
                    <p className={`text-sm mb-1 ${!email.read ? "font-medium" : ""}`}>{email.subject}</p>
                    <p className="text-xs text-slate-500 dark:text-slate-400 line-clamp-1">{email.preview}</p>
                  </div>
                </div>
              </div>
            </motion.div>
          ))
        ) : (
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.5 }}
            className="py-12 flex flex-col items-center justify-center text-center"
          >
            <div className="h-16 w-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4">
              <Mail className="h-8 w-8 text-slate-400" />
            </div>
            <h3 className="text-lg font-medium mb-1">
              {searchQuery ? "No matching emails found" : "Your inbox is empty"}
            </h3>
            <p className="text-sm text-slate-500 dark:text-slate-400 max-w-xs">
              {searchQuery
                ? "Try a different search term or clear your search"
                : "New emails will appear here. Refresh your inbox to check for new messages."}
            </p>
            {searchQuery && (
              <Button variant="outline" className="mt-4" onClick={() => setSearchQuery("")}>
                Clear search
              </Button>
            )}
          </motion.div>
        )}
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
    </>
  )
}
