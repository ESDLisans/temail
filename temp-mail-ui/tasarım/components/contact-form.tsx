"use client"

import type React from "react"

import { useState } from "react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Textarea } from "@/components/ui/textarea"
import { useToast } from "@/components/ui/use-toast"
import { CheckCircle2 } from "lucide-react"

export default function ContactForm() {
  const { toast } = useToast()
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    subject: "",
    message: "",
  })
  const [isSubmitting, setIsSubmitting] = useState(false)
  const [isSubmitted, setIsSubmitted] = useState(false)

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    const { name, value } = e.target
    setFormData((prev) => ({ ...prev, [name]: value }))
  }

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    setIsSubmitting(true)

    // Simulate form submission
    setTimeout(() => {
      setIsSubmitting(false)
      setIsSubmitted(true)
      toast({
        description: "Your message has been sent successfully. We'll get back to you soon!",
        duration: 5000,
      })
    }, 1500)
  }

  if (isSubmitted) {
    return (
      <div className="text-center py-8">
        <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-100 dark:bg-emerald-900 mb-4">
          <CheckCircle2 className="h-8 w-8 text-emerald-600 dark:text-emerald-400" />
        </div>
        <h3 className="text-xl font-medium mb-2">Thank You!</h3>
        <p className="text-slate-600 dark:text-slate-300 mb-6">
          Your message has been sent successfully. We'll get back to you as soon as possible.
        </p>
        <Button
          variant="outline"
          onClick={() => {
            setIsSubmitted(false)
            setFormData({ name: "", email: "", subject: "", message: "" })
          }}
        >
          Send Another Message
        </Button>
      </div>
    )
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-6">
      <div className="grid grid-cols-1 gap-6">
        <div className="space-y-2">
          <Label htmlFor="name">Your Name</Label>
          <Input id="name" name="name" placeholder="John Doe" required value={formData.name} onChange={handleChange} />
        </div>

        <div className="space-y-2">
          <Label htmlFor="email">Email Address</Label>
          <Input
            id="email"
            name="email"
            type="email"
            placeholder="john@example.com"
            required
            value={formData.email}
            onChange={handleChange}
          />
        </div>

        <div className="space-y-2">
          <Label htmlFor="subject">Subject</Label>
          <Input
            id="subject"
            name="subject"
            placeholder="How can we help you?"
            required
            value={formData.subject}
            onChange={handleChange}
          />
        </div>

        <div className="space-y-2">
          <Label htmlFor="message">Message</Label>
          <Textarea
            id="message"
            name="message"
            placeholder="Please provide details about your inquiry..."
            rows={5}
            required
            value={formData.message}
            onChange={handleChange}
          />
        </div>
      </div>

      <Button
        type="submit"
        className="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white"
        disabled={isSubmitting}
      >
        {isSubmitting ? "Sending..." : "Send Message"}
      </Button>

      <p className="text-xs text-slate-500 dark:text-slate-400 text-center">
        By submitting this form, you agree to our{" "}
        <a href="#" className="underline hover:text-emerald-600 dark:hover:text-emerald-400">
          Privacy Policy
        </a>
        .
      </p>
    </form>
  )
}
