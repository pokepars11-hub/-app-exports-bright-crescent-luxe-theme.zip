import { useEffect, useMemo, useState } from "react";
import { fetchSpareParts } from "@/lib/api";
import { toast } from "@/components/ui/sonner";

const CATALOG_DOWNLOAD_URL = "";

export default function SparePartsPage() {
  const [parts, setParts] = useState([]);
  const [query, setQuery] = useState("");

  useEffect(() => {
    const loadParts = async () => {
      try {
        const data = await fetchSpareParts();
        setParts(data);
      } catch (error) {
        console.error("Unable to load spare parts", error);
      }
    };
    loadParts();
  }, []);

  const filteredParts = useMemo(() => {
    const value = query.trim().toLowerCase();
    if (!value) return parts;
    return parts.filter((part) => `${part.name} ${part.category}`.toLowerCase().includes(value));
  }, [parts, query]);

  const onCatalogDownload = (event) => {
    if (!CATALOG_DOWNLOAD_URL) {
      event.preventDefault();
      toast.info("Catalog link will be added once you share the final file.");
    }
  };

  return (
    <div className="mx-auto w-full max-w-7xl px-6 py-16 md:px-12" data-testid="spare-parts-page">
      <div className="max-w-3xl">
        <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="spare-parts-tag">
          Cooling & Appliance Components
        </p>
        <h1 className="mt-4 text-4xl text-primary sm:text-5xl" data-testid="spare-parts-title">
          Precision spare parts catalog inspired by leading UAE HVAC suppliers.
        </h1>
      </div>

      <div className="mt-8 max-w-md">
        <input
          value={query}
          onChange={(event) => setQuery(event.target.value)}
          placeholder="Search by item name or category"
          className="w-full border border-border bg-white px-4 py-3 text-sm outline-none transition-colors duration-300 focus:border-secondary"
          data-testid="spare-parts-search-input"
        />
      </div>

      <div
        className="mt-8 flex flex-wrap items-center justify-between gap-4 border border-border/70 bg-white px-5 py-4"
        data-testid="spare-parts-catalog-download-area"
      >
        <div data-testid="spare-parts-catalog-text-block">
          <p className="font-accent text-xs uppercase tracking-[0.16em] text-secondary" data-testid="spare-parts-catalog-title">
            Spare Parts Catalog
          </p>
          <p className="mt-1 text-sm text-muted-foreground" data-testid="spare-parts-catalog-description">
            Download full catalog PDF (final file link will be added by your team).
          </p>
        </div>
        <a
          href={CATALOG_DOWNLOAD_URL || "#"}
          onClick={onCatalogDownload}
          className="border border-secondary bg-secondary px-5 py-2 font-accent text-xs uppercase tracking-[0.16em] text-primary transition-colors duration-300 hover:bg-[#d8b776]"
          data-testid="spare-parts-download-catalog-button"
        >
          Download Catalog
        </a>
      </div>

      <div className="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3" data-testid="spare-parts-cards-grid">
        {filteredParts.map((part) => (
          <article
            key={part.id}
            className="overflow-hidden border border-border/70 bg-white"
            data-testid={`spare-part-card-${part.id}`}
          >
            <img
              src={part.image_url}
              alt={part.name}
              className="aspect-[4/3] w-full object-cover"
              data-testid={`spare-part-image-${part.id}`}
            />
            <div className="p-5">
              <h2 className="text-2xl text-primary" data-testid={`spare-part-name-${part.id}`}>
                {part.name}
              </h2>
              <p className="mt-2 font-accent text-xs uppercase tracking-[0.16em] text-secondary" data-testid={`spare-part-category-${part.id}`}>
                {part.category}
              </p>
            </div>
          </article>
        ))}
      </div>
    </div>
  );
}
