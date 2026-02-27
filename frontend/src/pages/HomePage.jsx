import { Link } from "react-router-dom";
import { motion } from "framer-motion";
import { ArrowRight, ShieldCheck, Gem, Wrench } from "lucide-react";

const categoryCards = [
  {
    title: "Premium Appliances",
    description: "Curated home and commercial appliances from trusted global manufacturers.",
    image:
      "https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/5cd8d8d62750665cede2fba00df6dfca24edab9bcc2982e83be98a2019bf3abb.png",
    path: "/appliances",
    icon: ShieldCheck,
    testId: "home-category-appliances",
  },
  {
    title: "Crystal Products",
    description: "Elegant crystal pieces inspired by international design and craftsmanship.",
    image:
      "https://images.unsplash.com/photo-1643904767336-d819d2f5585d?auto=format&fit=crop&w=1200&q=80",
    path: "/crystal-products",
    icon: Gem,
    testId: "home-category-crystals",
  },
  {
    title: "Appliance Spare Parts",
    description: "Reliable AC, refrigerator, and washing-machine parts for technicians and businesses.",
    image:
      "https://albaztrading.com/images/b2.webp",
    path: "/spare-parts",
    icon: Wrench,
    testId: "home-category-spare-parts",
  },
];

export default function HomePage({ companyInfo }) {
  return (
    <div data-testid="home-page">
      <section
        className="hero-overlay relative min-h-[78vh] overflow-hidden"
        style={{
          backgroundImage:
            "url('https://images.unsplash.com/photo-1760067537565-1d4cbb8da0c3?auto=format&fit=crop&w=2000&q=80')",
          backgroundSize: "cover",
          backgroundPosition: "center",
        }}
        data-testid="home-hero-section"
      >
        <div className="mx-auto flex min-h-[78vh] w-full max-w-7xl items-end px-6 py-16 md:px-12">
          <motion.div
            initial={{ opacity: 0, y: 16 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8 }}
            className="max-w-3xl"
          >
            <p className="font-accent text-xs uppercase tracking-[0.24em] text-secondary" data-testid="home-hero-tag">
              High-End Trading Experience
            </p>
            <h1 className="mt-5 text-4xl leading-tight text-white sm:text-5xl lg:text-6xl" data-testid="home-hero-title">
              {companyInfo?.company_name ?? "Bright Crescent Trading Co LLC"}
            </h1>
            <p className="mt-6 max-w-2xl text-sm text-white/90 sm:text-base" data-testid="home-hero-summary">
              {companyInfo?.brand_line ??
                "Premium Trading in Appliances, Crystal Craft, and Precision Spare Parts"}
            </p>
            <div className="mt-8 flex flex-wrap gap-4">
              <Link
                to="/contact"
                className="inline-flex items-center gap-2 border border-secondary bg-secondary px-6 py-3 font-accent text-xs uppercase tracking-[0.18em] text-white transition-colors duration-300 hover:bg-secondary/90"
                data-testid="home-hero-contact-button"
              >
                Contact Us <ArrowRight size={16} />
              </Link>
              <Link
                to="/appliances"
                className="inline-flex items-center gap-2 border border-white/70 px-6 py-3 font-accent text-xs uppercase tracking-[0.18em] text-white transition-colors duration-300 hover:bg-white hover:text-primary"
                data-testid="home-hero-explore-button"
              >
                Explore Products
              </Link>
            </div>
          </motion.div>
        </div>
      </section>

      <section className="mx-auto w-full max-w-7xl px-6 py-20 md:px-12" data-testid="home-categories-section">
        <div className="mb-10 max-w-3xl">
          <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="home-categories-tag">
            Core Divisions
          </p>
          <h2 className="mt-4 text-3xl text-primary sm:text-4xl" data-testid="home-categories-title">
            A balanced portfolio of luxury products and technical reliability.
          </h2>
        </div>

        <div className="grid gap-8 md:grid-cols-3">
          {categoryCards.map((item, index) => {
            const Icon = item.icon;
            return (
              <motion.article
                key={item.title}
                initial={{ opacity: 0, y: 12 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: index * 0.1 }}
                className="group overflow-hidden border border-border/70 bg-white shadow-sm transition-transform duration-300 hover:-translate-y-1"
                data-testid={item.testId}
              >
                <img
                  src={item.image}
                  alt={item.title}
                  className="aspect-[4/3] w-full object-cover"
                  data-testid={`${item.testId}-image`}
                />
                <div className="p-6">
                  <div className="mb-4 inline-flex rounded-sm bg-accent p-2 text-primary" data-testid={`${item.testId}-icon`}>
                    <Icon size={18} />
                  </div>
                  <h3 className="text-2xl text-primary" data-testid={`${item.testId}-title`}>{item.title}</h3>
                  <p className="mt-3 text-sm text-muted-foreground" data-testid={`${item.testId}-description`}>
                    {item.description}
                  </p>
                  <Link
                    to={item.path}
                    className="mt-6 inline-flex items-center gap-2 font-accent text-xs uppercase tracking-[0.18em] text-primary transition-colors duration-300 hover:text-secondary"
                    data-testid={`${item.testId}-link`}
                  >
                    View Category <ArrowRight size={14} />
                  </Link>
                </div>
              </motion.article>
            );
          })}
        </div>
      </section>
    </div>
  );
}
