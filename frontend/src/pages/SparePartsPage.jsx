import { useEffect, useMemo, useState } from "react";
import { fetchSpareParts } from "@/lib/api";

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
    return parts.filter((part) => {
      const stack = `${part.sku} ${part.name} ${part.category} ${part.compatibility}`.toLowerCase();
      return stack.includes(value);
    });
  }, [parts, query]);

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
          placeholder="Search by SKU, category, or part name"
          className="w-full border border-border bg-white px-4 py-3 text-sm outline-none transition-colors duration-300 focus:border-secondary"
          data-testid="spare-parts-search-input"
        />
      </div>

      <div className="mt-8 overflow-hidden border border-border/70 bg-white" data-testid="spare-parts-table-wrapper">
        <div
          className="grid grid-cols-5 gap-2 border-b border-border/70 bg-accent/50 px-4 py-3 font-accent text-xs uppercase tracking-[0.16em] text-primary"
          data-testid="spare-parts-table-header"
        >
          <span data-testid="spare-parts-column-sku">SKU</span>
          <span data-testid="spare-parts-column-name">Name</span>
          <span data-testid="spare-parts-column-category">Category</span>
          <span data-testid="spare-parts-column-compatibility">Compatibility</span>
          <span data-testid="spare-parts-column-stock">Stock</span>
        </div>

        <div data-testid="spare-parts-table-rows">
          {filteredParts.map((part) => (
            <div
              key={part.id}
              className="grid grid-cols-1 gap-2 border-b border-border/60 px-4 py-4 text-sm md:grid-cols-5 md:items-center"
              data-testid={`spare-part-row-${part.id}`}
            >
              <p className="font-code text-primary" data-testid={`spare-part-sku-${part.id}`}>{part.sku}</p>
              <p className="text-primary" data-testid={`spare-part-name-${part.id}`}>{part.name}</p>
              <p className="text-muted-foreground" data-testid={`spare-part-category-${part.id}`}>{part.category}</p>
              <p className="text-muted-foreground" data-testid={`spare-part-compatibility-${part.id}`}>{part.compatibility}</p>
              <div data-testid={`spare-part-stock-${part.id}`}>
                <span
                  className={`inline-flex border px-2 py-1 font-accent text-[10px] uppercase tracking-[0.14em] ${
                    part.in_stock
                      ? "border-emerald-600 bg-emerald-50 text-emerald-700"
                      : "border-amber-600 bg-amber-50 text-amber-700"
                  }`}
                >
                  {part.in_stock ? "In Stock" : "On Request"}
                </span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
