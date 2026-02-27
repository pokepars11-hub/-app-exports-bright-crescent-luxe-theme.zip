import { useState } from "react";
import { toast } from "@/components/ui/sonner";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { submitContactInquiry } from "@/lib/api";

const initialForm = { name: "", email: "", comment: "" };

export default function ContactPage({ companyInfo }) {
  const [form, setForm] = useState(initialForm);
  const [isSubmitting, setIsSubmitting] = useState(false);

  const onInputChange = (event) => {
    const { name, value } = event.target;
    setForm((prev) => ({ ...prev, [name]: value }));
  };

  const onSubmit = async (event) => {
    event.preventDefault();
    setIsSubmitting(true);
    try {
      await submitContactInquiry(form);
      toast.success("Thank you. Your message has been submitted.");
      setForm(initialForm);
    } catch (error) {
      toast.error("Submission failed. Please try again.");
      console.error("Contact form error", error);
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <div className="mx-auto grid w-full max-w-7xl gap-8 px-6 py-16 md:grid-cols-2 md:px-12" data-testid="contact-page">
      <section className="border border-secondary/20 bg-primary p-8 text-primary-foreground" data-testid="contact-details-section">
        <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="contact-details-tag">
          Contact & Locations
        </p>
        <h1 className="mt-4 text-4xl text-white" data-testid="contact-details-title">Get in touch with our team.</h1>
        <p className="mt-4 text-sm text-primary-foreground/80" data-testid="contact-details-summary">
          Share your requirement for products, custom crystal requests, or technical spare part sourcing.
        </p>

        <div className="mt-8 space-y-8">
          <div data-testid="contact-shop-block">
            <p className="font-accent text-xs uppercase tracking-[0.18em] text-secondary">Shop</p>
            <p className="mt-3 text-sm" data-testid="contact-shop-address">{companyInfo?.shop?.address ?? "[Add Shop Address], UAE"}</p>
            <p className="mt-1 text-sm" data-testid="contact-shop-phone">{companyInfo?.shop?.phone ?? "[Add Shop Phone]"}</p>
            <p className="mt-1 text-sm" data-testid="contact-shop-email">{companyInfo?.shop?.email ?? "shop@brightcrescenttrading.com"}</p>
          </div>

          <div data-testid="contact-office-block">
            <p className="font-accent text-xs uppercase tracking-[0.18em] text-secondary">Office</p>
            <p className="mt-3 text-sm" data-testid="contact-office-address">{companyInfo?.office?.address ?? "[Add Office Address], UAE"}</p>
            <p className="mt-1 text-sm" data-testid="contact-office-phone">{companyInfo?.office?.phone ?? "[Add Office Phone]"}</p>
            <p className="mt-1 text-sm" data-testid="contact-office-email">{companyInfo?.office?.email ?? "office@brightcrescenttrading.com"}</p>
          </div>
        </div>
      </section>

      <section className="border border-border/70 bg-white p-8" data-testid="contact-form-section">
        <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="contact-form-tag">
          Send Inquiry
        </p>
        <h2 className="mt-4 text-3xl text-primary" data-testid="contact-form-title">Contact Us</h2>

        <form onSubmit={onSubmit} className="mt-8 space-y-6" data-testid="contact-form">
          <div>
            <label htmlFor="name" className="mb-2 block text-sm text-primary" data-testid="contact-form-name-label">
              Name
            </label>
            <Input
              id="name"
              name="name"
              value={form.name}
              onChange={onInputChange}
              required
              className="h-11 rounded-none border-0 border-b-2 border-input px-0 shadow-none focus-visible:ring-0"
              data-testid="contact-form-name-input"
            />
          </div>
          <div>
            <label htmlFor="email" className="mb-2 block text-sm text-primary" data-testid="contact-form-email-label">
              Email
            </label>
            <Input
              id="email"
              name="email"
              type="email"
              value={form.email}
              onChange={onInputChange}
              required
              className="h-11 rounded-none border-0 border-b-2 border-input px-0 shadow-none focus-visible:ring-0"
              data-testid="contact-form-email-input"
            />
          </div>
          <div>
            <label htmlFor="comment" className="mb-2 block text-sm text-primary" data-testid="contact-form-comment-label">
              Comment
            </label>
            <Textarea
              id="comment"
              name="comment"
              value={form.comment}
              onChange={onInputChange}
              required
              className="min-h-[140px] rounded-none border-0 border-b-2 border-input px-0 shadow-none focus-visible:ring-0"
              data-testid="contact-form-comment-input"
            />
          </div>
          <button
            type="submit"
            disabled={isSubmitting}
            className="w-full border border-secondary bg-secondary px-6 py-3 font-accent text-xs uppercase tracking-[0.18em] text-primary transition-colors duration-300 hover:bg-[#d8b776] disabled:opacity-60"
            data-testid="contact-form-submit-button"
          >
            {isSubmitting ? "Submitting..." : "Submit Inquiry"}
          </button>
        </form>
      </section>
    </div>
  );
}
