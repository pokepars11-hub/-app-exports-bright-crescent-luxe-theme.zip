import { useEffect, useState } from "react";
import { BrowserRouter, Navigate, Route, Routes } from "react-router-dom";
import "@/App.css";
import { Toaster } from "@/components/ui/sonner";
import { fetchCompanyInfo } from "@/lib/api";
import { SiteLayout } from "@/components/layout/SiteLayout";
import HomePage from "@/pages/HomePage";
import NewsPage from "@/pages/NewsPage";
import AppliancesPage from "@/pages/AppliancesPage";
import CrystalProductsPage from "@/pages/CrystalProductsPage";
import SparePartsPage from "@/pages/SparePartsPage";
import ContactPage from "@/pages/ContactPage";

function App() {
  const [companyInfo, setCompanyInfo] = useState(null);

  useEffect(() => {
    const loadCompanyInfo = async () => {
      try {
        const info = await fetchCompanyInfo();
        setCompanyInfo(info);
      } catch (error) {
        console.error("Failed to load company information", error);
      }
    };
    loadCompanyInfo();
  }, []);

  return (
    <div className="min-h-screen bg-background text-foreground">
      <BrowserRouter>
        <Routes>
          <Route element={<SiteLayout companyInfo={companyInfo} />}>
            <Route path="/" element={<HomePage companyInfo={companyInfo} />} />
            <Route path="/news" element={<NewsPage />} />
            <Route path="/appliances" element={<AppliancesPage />} />
            <Route path="/crystal-products" element={<CrystalProductsPage />} />
            <Route path="/spare-parts" element={<SparePartsPage />} />
            <Route path="/contact" element={<ContactPage companyInfo={companyInfo} />} />
            <Route path="*" element={<Navigate to="/" replace />} />
          </Route>
        </Routes>
      </BrowserRouter>
      <Toaster richColors position="top-right" />
    </div>
  );
}

export default App;
