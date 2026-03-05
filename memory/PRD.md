# PRD - Bright Crescent Trading Co LLC Website

## Original Problem Statement
Create a professional, high-end luxury website for **Bright Crescent Trading Co LLC** with the following pages:
- Home
- News
- Appliances Products page
- Crystal Products page (using items/categories inspired by yitaicrystal.com)
- Appliances Spare Parts page (using albaztrading.com style/categories)
- Contact Us page with form fields: Name, Email, Comment
- Include separate sections for Shop details and Office details (no working hours required)

User choices captured:
- Build as custom React/FastAPI website now (Option A)
- Curate representative crystal/appliance/spare-part content now and user will update later
- Keep contact hours omitted; addresses/phones/emails editable

## Architecture Decisions
- **Frontend:** React + React Router multi-page marketing site
- **Backend:** FastAPI REST API with structured endpoints for company data, news, catalogs, and contact submissions
- **Database:** MongoDB for persisted contact form submissions (`contact_inquiries`)
- **Design system:** Luxury light theme (alabaster/navy/gold), premium typography (Playfair Display/Lato/Cinzel), section-based modular layout for easier future WordPress recreation
- **UX behavior:** Category filters, catalog search, and responsive page layouts with route-based separation

## What Has Been Implemented
- Built full site navigation and pages:
  - `/` Home
  - `/news`
  - `/appliances`
  - `/crystal-products`
  - `/spare-parts`
  - `/contact`
- Implemented luxury visual style, custom fonts, color variables, transitions, and premium section spacing
- Implemented backend API endpoints:
  - `GET /api/`
  - `GET /api/company-info`
  - `GET /api/news`
  - `GET /api/products/appliances`
  - `GET /api/products/crystals`
  - `GET /api/products/spare-parts`
  - `POST /api/contact-us`
- Contact form connected to backend and persisted in MongoDB
- Added curated product/news datasets inspired by reference websites and enhanced with high-quality media
- Added comprehensive `data-testid` attributes across interactive and critical content areas
- Updated Spare Parts page to card layout with **item image + item name + category only** (removed stock and compatibility display)
- Added a catalog download section/button on Spare Parts page with placeholder link behavior (ready to connect your final catalog URL)
- Prepared GitHub-ready export artifacts in both `/app/exports/` and repository root (`/app/bright-crescent-website.zip`, `/app/bright-crescent-database.sql`) and updated `.gitignore` exceptions so ZIP can be saved to GitHub

## Validation & Testing
- Manual API smoke tests via `curl` passed
- Frontend Playwright screenshot flows passed across all routes
- Testing agent run completed with backend + frontend coverage; all core tests passed (100%)
- Minor contrast feedback fixed for contact submit button

## Prioritized Backlog
### P0 (Must-do next)
- Replace placeholder Shop and Office address/phone with final business information
- Replace curated sample product metadata with exact product list, brands, and descriptions from business team
- Provide final catalog file URL for Spare Parts so Download Catalog button can serve the real file

### P1 (High value)
- Add CMS-style admin content editor (or JSON-driven content dashboard) for easier non-technical updates
- Add inquiry management dashboard for submitted contact leads
- Add WhatsApp quick-contact CTA with direct routing

### P2 (Future enhancement)
- Add SEO pages/meta schema and structured data for products/news
- Add multilingual support (English/Arabic)
- Add downloadable product catalogs (PDF)

## Next Tasks
1. Insert final shop/office contact details provided by client
2. Replace sample catalog content with approved inventory and brand assets
3. Add lightweight content management layer to improve WordPress migration readiness