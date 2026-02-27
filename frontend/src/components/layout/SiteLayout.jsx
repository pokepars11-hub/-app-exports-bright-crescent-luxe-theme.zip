import { Link, NavLink, Outlet } from "react-router-dom";
import { Phone, Mail, MapPin } from "lucide-react";

const navItems = [
  { label: "Home", path: "/", testId: "nav-link-home" },
  { label: "News", path: "/news", testId: "nav-link-news" },
  { label: "Appliances", path: "/appliances", testId: "nav-link-appliances" },
  { label: "Crystal Products", path: "/crystal-products", testId: "nav-link-crystal-products" },
  { label: "Spare Parts", path: "/spare-parts", testId: "nav-link-spare-parts" },
  { label: "Contact", path: "/contact", testId: "nav-link-contact" },
];

const navClass = ({ isActive }) =>
  `font-accent text-xs uppercase tracking-[0.18em] transition-colors duration-300 ${
    isActive ? "text-secondary" : "text-primary hover:text-secondary"
  }`;

export const SiteLayout = ({ companyInfo }) => {
  return (
    <div className="min-h-screen subtle-noise">
      <header className="sticky top-0 z-50 border-b border-border/70 bg-background/90 backdrop-blur-xl">
        <div className="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-6 px-6 py-5 md:px-12">
          <Link to="/" className="space-y-1" data-testid="site-logo-link">
            <p className="font-accent text-xs uppercase tracking-[0.22em] text-secondary" data-testid="brand-badge">
              Bright Crescent Trading Co LLC
            </p>
            <h1 className="font-heading text-xl text-primary" data-testid="brand-title">
              Luxury Product Trading
            </h1>
          </Link>
          <nav className="flex flex-wrap items-center gap-5" data-testid="primary-navigation">
            {navItems.map((item) => (
              <NavLink key={item.path} to={item.path} className={navClass} data-testid={item.testId}>
                {item.label}
              </NavLink>
            ))}
          </nav>
        </div>
      </header>

      <main data-testid="site-main-content">
        <Outlet />
      </main>

      <footer className="mt-16 border-t border-border/60 bg-primary text-primary-foreground" data-testid="site-footer">
        <div className="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-3 md:px-12">
          <section data-testid="footer-about-section">
            <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary">Bright Crescent</p>
            <h2 className="mt-3 text-2xl" data-testid="footer-company-name">
              {companyInfo?.company_name ?? "Bright Crescent Trading Co LLC"}
            </h2>
            <p className="mt-3 text-sm text-primary-foreground/80" data-testid="footer-company-summary">
              {companyInfo?.hero_summary ??
                "Premium sourcing partner for appliances, crystal craftsmanship, and precision spare parts."}
            </p>
          </section>

          <section data-testid="footer-shop-section">
            <h3 className="font-accent text-xs uppercase tracking-[0.2em] text-secondary">Shop</h3>
            <p className="mt-4 flex items-start gap-2 text-sm" data-testid="footer-shop-address">
              <MapPin size={16} className="mt-0.5" /> {companyInfo?.shop?.address ?? "[Add Shop Address], UAE"}
            </p>
            <p className="mt-2 flex items-center gap-2 text-sm" data-testid="footer-shop-phone">
              <Phone size={16} /> {companyInfo?.shop?.phone ?? "[Add Shop Phone]"}
            </p>
            <p className="mt-2 flex items-center gap-2 text-sm" data-testid="footer-shop-email">
              <Mail size={16} /> {companyInfo?.shop?.email ?? "shop@brightcrescenttrading.com"}
            </p>
          </section>

          <section data-testid="footer-office-section">
            <h3 className="font-accent text-xs uppercase tracking-[0.2em] text-secondary">Office</h3>
            <p className="mt-4 flex items-start gap-2 text-sm" data-testid="footer-office-address">
              <MapPin size={16} className="mt-0.5" /> {companyInfo?.office?.address ?? "[Add Office Address], UAE"}
            </p>
            <p className="mt-2 flex items-center gap-2 text-sm" data-testid="footer-office-phone">
              <Phone size={16} /> {companyInfo?.office?.phone ?? "[Add Office Phone]"}
            </p>
            <p className="mt-2 flex items-center gap-2 text-sm" data-testid="footer-office-email">
              <Mail size={16} /> {companyInfo?.office?.email ?? "office@brightcrescenttrading.com"}
            </p>
          </section>
        </div>
      </footer>
    </div>
  );
};
