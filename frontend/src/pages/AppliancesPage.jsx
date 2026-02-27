import { useEffect, useMemo, useState } from "react";
import { fetchAppliances } from "@/lib/api";

export default function AppliancesPage() {
  const [products, setProducts] = useState([]);
  const [activeCategory, setActiveCategory] = useState("All");

  useEffect(() => {
    const loadProducts = async () => {
      try {
        const data = await fetchAppliances();
        setProducts(data);
      } catch (error) {
        console.error("Unable to load appliances", error);
      }
    };
    loadProducts();
  }, []);

  const categories = useMemo(() => ["All", ...new Set(products.map((item) => item.category))], [products]);

  const filteredProducts = useMemo(
    () => (activeCategory === "All" ? products : products.filter((item) => item.category === activeCategory)),
    [activeCategory, products],
  );

  return (
    <div className="mx-auto w-full max-w-7xl px-6 py-16 md:px-12" data-testid="appliances-page">
      <div className="max-w-3xl">
        <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="appliances-page-tag">
          Appliances Portfolio
        </p>
        <h1 className="mt-4 text-4xl text-primary sm:text-5xl" data-testid="appliances-page-title">
          Premium appliances for modern residential and commercial needs.
        </h1>
      </div>

      <div className="mt-8 flex flex-wrap gap-3" data-testid="appliances-filter-group">
        {categories.map((category) => (
          <button
            key={category}
            type="button"
            onClick={() => setActiveCategory(category)}
            className={`border px-4 py-2 font-accent text-xs uppercase tracking-[0.15em] transition-colors duration-300 ${
              activeCategory === category
                ? "border-secondary bg-secondary text-white"
                : "border-border bg-white text-primary hover:border-secondary"
            }`}
            data-testid={`appliances-filter-${category.toLowerCase().replace(/\s+/g, "-")}`}
          >
            {category}
          </button>
        ))}
      </div>

      <section className="mt-10 grid gap-8 md:grid-cols-2 lg:grid-cols-3" data-testid="appliances-grid">
        {filteredProducts.map((item) => (
          <article key={item.id} className="overflow-hidden border border-border/70 bg-white" data-testid={`appliance-card-${item.id}`}>
            <img
              src={item.image_url}
              alt={item.name}
              className="aspect-[4/3] w-full object-cover"
              data-testid={`appliance-image-${item.id}`}
            />
            <div className="p-6">
              <p className="font-accent text-xs uppercase tracking-[0.18em] text-secondary" data-testid={`appliance-category-${item.id}`}>
                {item.category} · {item.origin}
              </p>
              <h2 className="mt-3 text-2xl text-primary" data-testid={`appliance-name-${item.id}`}>{item.name}</h2>
              <ul className="mt-4 space-y-2 text-sm text-muted-foreground" data-testid={`appliance-specs-${item.id}`}>
                {item.specs.map((spec) => (
                  <li key={spec}>• {spec}</li>
                ))}
              </ul>
            </div>
          </article>
        ))}
      </section>
    </div>
  );
}
