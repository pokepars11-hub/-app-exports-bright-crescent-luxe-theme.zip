import { useEffect, useMemo, useState } from "react";
import { fetchCrystals } from "@/lib/api";

export default function CrystalProductsPage() {
  const [products, setProducts] = useState([]);
  const [collection, setCollection] = useState("All");

  useEffect(() => {
    const loadProducts = async () => {
      try {
        const data = await fetchCrystals();
        setProducts(data);
      } catch (error) {
        console.error("Unable to load crystal products", error);
      }
    };
    loadProducts();
  }, []);

  const collections = useMemo(() => ["All", ...new Set(products.map((item) => item.collection))], [products]);
  const filteredProducts = useMemo(
    () => (collection === "All" ? products : products.filter((item) => item.collection === collection)),
    [collection, products],
  );

  return (
    <div className="bg-primary py-16 text-primary-foreground" data-testid="crystal-page">
      <div className="mx-auto w-full max-w-7xl px-6 md:px-12">
        <div className="max-w-3xl">
          <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="crystal-page-tag">
            Crystal Selection
          </p>
          <h1 className="mt-4 text-4xl text-white sm:text-5xl" data-testid="crystal-page-title">
            Refined crystal collections inspired by yitaicrystal-style categories.
          </h1>
        </div>

        <div className="mt-8 flex flex-wrap gap-3" data-testid="crystal-filter-group">
          {collections.map((item) => (
            <button
              key={item}
              type="button"
              onClick={() => setCollection(item)}
              className={`border px-4 py-2 font-accent text-xs uppercase tracking-[0.15em] transition-colors duration-300 ${
                collection === item
                  ? "border-secondary bg-secondary text-white"
                  : "border-white/30 bg-transparent text-white hover:border-secondary"
              }`}
              data-testid={`crystal-filter-${item.toLowerCase().replace(/\s+/g, "-")}`}
            >
              {item}
            </button>
          ))}
        </div>

        <section className="mt-10 grid gap-8 md:grid-cols-2 lg:grid-cols-3" data-testid="crystal-grid">
          {filteredProducts.map((item) => (
            <article
              key={item.id}
              className="overflow-hidden border border-white/20 bg-white/5 backdrop-blur-sm"
              data-testid={`crystal-card-${item.id}`}
            >
              <img
                src={item.image_url}
                alt={item.name}
                className="aspect-[4/3] w-full object-cover"
                data-testid={`crystal-image-${item.id}`}
              />
              <div className="p-6">
                <p className="font-accent text-xs uppercase tracking-[0.18em] text-secondary" data-testid={`crystal-collection-${item.id}`}>
                  {item.collection}
                </p>
                <h2 className="mt-3 text-2xl text-white" data-testid={`crystal-name-${item.id}`}>{item.name}</h2>
                <p className="mt-2 text-sm text-white/75" data-testid={`crystal-material-${item.id}`}>{item.material}</p>
                <p className="mt-4 text-sm text-white/85" data-testid={`crystal-note-${item.id}`}>{item.note}</p>
              </div>
            </article>
          ))}
        </section>
      </div>
    </div>
  );
}
