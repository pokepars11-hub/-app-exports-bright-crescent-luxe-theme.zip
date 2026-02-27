import { useEffect, useState } from "react";
import { fetchNews } from "@/lib/api";

export default function NewsPage() {
  const [news, setNews] = useState([]);

  useEffect(() => {
    const loadNews = async () => {
      try {
        const data = await fetchNews();
        setNews(data);
      } catch (error) {
        console.error("Unable to load news", error);
      }
    };
    loadNews();
  }, []);

  const featured = news[0];
  const regularItems = news.slice(1);

  return (
    <div className="mx-auto w-full max-w-7xl px-6 py-16 md:px-12" data-testid="news-page">
      <div className="max-w-3xl">
        <p className="font-accent text-xs uppercase tracking-[0.2em] text-secondary" data-testid="news-page-tag">
          Company Updates
        </p>
        <h1 className="mt-4 text-4xl text-primary sm:text-5xl" data-testid="news-page-title">
          News and market highlights from Bright Crescent.
        </h1>
      </div>

      {featured && (
        <article className="mt-12 grid overflow-hidden border border-border/70 bg-white md:grid-cols-2" data-testid="news-featured-card">
          <img
            src={featured.image_url}
            alt={featured.title}
            className="h-full min-h-[320px] w-full object-cover"
            data-testid="news-featured-image"
          />
          <div className="p-8 md:p-10">
            <p className="font-accent text-xs uppercase tracking-[0.18em] text-secondary" data-testid="news-featured-meta">
              {featured.category} · {featured.date}
            </p>
            <h2 className="mt-4 text-3xl text-primary" data-testid="news-featured-title">{featured.title}</h2>
            <p className="mt-5 text-sm text-muted-foreground" data-testid="news-featured-excerpt">{featured.excerpt}</p>
          </div>
        </article>
      )}

      <section className="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-testid="news-grid-section">
        {regularItems.map((item) => (
          <article key={item.id} className="overflow-hidden border border-border/70 bg-white" data-testid={`news-grid-card-${item.id}`}>
            <img
              src={item.image_url}
              alt={item.title}
              className="aspect-[16/10] w-full object-cover"
              data-testid={`news-grid-image-${item.id}`}
            />
            <div className="p-6">
              <p className="font-accent text-xs uppercase tracking-[0.18em] text-secondary" data-testid={`news-grid-meta-${item.id}`}>
                {item.category} · {item.date}
              </p>
              <h3 className="mt-3 text-2xl text-primary" data-testid={`news-grid-title-${item.id}`}>{item.title}</h3>
              <p className="mt-3 text-sm text-muted-foreground" data-testid={`news-grid-excerpt-${item.id}`}>{item.excerpt}</p>
            </div>
          </article>
        ))}
      </section>
    </div>
  );
}
