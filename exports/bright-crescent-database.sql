-- Bright Crescent Trading Co LLC SQL Export
CREATE DATABASE IF NOT EXISTS bright_crescent_trading;
USE bright_crescent_trading;

DROP TABLE IF EXISTS company_info;
CREATE TABLE company_info (
  company_name VARCHAR(255),
  brand_line TEXT,
  hero_summary TEXT,
  shop_title VARCHAR(255),
  shop_address TEXT,
  shop_phone VARCHAR(100),
  shop_email VARCHAR(255),
  office_title VARCHAR(255),
  office_address TEXT,
  office_phone VARCHAR(100),
  office_email VARCHAR(255)
);
INSERT INTO company_info VALUES ('Bright Crescent Trading Co LLC', 'Premium Trading in Appliances, Crystal Craft, and Precision Spare Parts', 'Serving retail and commercial buyers with curated quality products and dependable sourcing across the UAE and beyond.', 'Retail Shop', '[Add Shop Address], UAE', '[Add Shop Phone]', 'shop@brightcrescenttrading.com', 'Corporate Office', '[Add Office Address], UAE', '[Add Office Phone]', 'office@brightcrescenttrading.com');

DROP TABLE IF EXISTS news_items;
CREATE TABLE news_items (
  id VARCHAR(80) PRIMARY KEY,
  title TEXT,
  publish_date VARCHAR(30),
  category VARCHAR(120),
  excerpt TEXT,
  image_url TEXT
);
INSERT INTO news_items VALUES ('news-001', 'Bright Crescent Expands Premium Appliance Procurement Network', '2026-01-15', 'Company', 'Our sourcing division now supports broader supply coverage for premium kitchen and lifestyle appliances across GCC markets.', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80');
INSERT INTO news_items VALUES ('news-002', 'Crystal Collections for Hospitality and Luxury Interiors', '2025-12-07', 'Product', 'We introduced curated crystal décor lines inspired by international exhibitions to support hotels, lounges, and high-end residences.', 'https://images.unsplash.com/photo-1529699211952-734e80c4d42b?auto=format&fit=crop&w=1200&q=80');
INSERT INTO news_items VALUES ('news-003', 'Faster Spare Parts Availability for Cooling Systems', '2025-11-26', 'Operations', 'Inventory optimization now improves turnaround for AC and refrigeration spare parts requested by technicians and facility teams.', 'https://images.unsplash.com/photo-1581094271901-8022df4466f9?auto=format&fit=crop&w=1200&q=80');
INSERT INTO news_items VALUES ('news-004', 'Strategic Vendor Alliances for Long-Term Quality Assurance', '2025-10-13', 'Partnership', 'Bright Crescent reinforces quality checks and compliance standards through strategic partner evaluation and lifecycle testing.', 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80');

DROP TABLE IF EXISTS appliance_products;
CREATE TABLE appliance_products (
  id VARCHAR(80) PRIMARY KEY,
  name VARCHAR(255),
  category VARCHAR(120),
  origin VARCHAR(120),
  specs TEXT,
  image_url TEXT
);
INSERT INTO appliance_products VALUES ('app-001', 'Elite Smart Refrigerator 520L', 'Refrigeration', 'Germany', 'Multi-zone cooling; Energy-efficient inverter; Fingerprint-resistant steel', 'https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?auto=format&fit=crop&w=900&q=80');
INSERT INTO appliance_products VALUES ('app-002', 'Signature Convection Oven Pro', 'Cooking', 'Italy', 'Dual convection; Steam-assist baking; Soft-close precision doors', 'https://images.unsplash.com/photo-1594041680534-e8c8cdebd659?auto=format&fit=crop&w=900&q=80');
INSERT INTO appliance_products VALUES ('app-003', 'Premium Front-Load Washer', 'Laundry', 'Japan', 'Silent-drive motor; Auto-dose detergent; Fabric care modes', 'https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?auto=format&fit=crop&w=900&q=80');
INSERT INTO appliance_products VALUES ('app-004', 'Built-in Wine Chiller', 'Lifestyle', 'France', 'UV-protected glass; Dual temperature zones; Vibration-control system', 'https://images.unsplash.com/photo-1615874959474-d609969a20ed?auto=format&fit=crop&w=900&q=80');
INSERT INTO appliance_products VALUES ('app-005', 'Platinum Dishwasher Series X', 'Cleaning', 'Sweden', 'Low water usage; Crystal-safe cycle; Auto-dry technology', 'https://images.unsplash.com/photo-1563453392212-326f5e854473?auto=format&fit=crop&w=900&q=80');
INSERT INTO appliance_products VALUES ('app-006', 'Modular Air Purification Tower', 'Air Care', 'UAE', 'HEPA H14 filtration; Smart sensors; Large-space coverage', 'https://images.unsplash.com/photo-1585336261022-680e295ce3fe?auto=format&fit=crop&w=900&q=80');

DROP TABLE IF EXISTS crystal_products;
CREATE TABLE crystal_products (
  id VARCHAR(80) PRIMARY KEY,
  name VARCHAR(255),
  collection VARCHAR(120),
  material VARCHAR(255),
  note_text TEXT,
  image_url TEXT
);
INSERT INTO crystal_products VALUES ('cry-001', 'Aurora Crystal Vase', 'Home Accessories', 'Lead-free crystal', 'Inspired by contemporary Asian crystal craft trends.', 'https://images.unsplash.com/photo-1643904767336-d819d2f5585d?auto=format&fit=crop&w=900&q=80');
INSERT INTO crystal_products VALUES ('cry-002', 'Celestial Gift Figurine', 'Gift Customization', 'Hand-cut optical crystal', 'Ideal for executive gifting and premium commemoratives.', 'https://images.unsplash.com/photo-1583918489284-2be9908abfa2?auto=format&fit=crop&w=900&q=80');
INSERT INTO crystal_products VALUES ('cry-003', 'Lumen Hanging Accent', 'Lighting Fixture', 'Polished faceted crystal', 'Decorative suspended crystal format for interiors.', 'https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/d4d3e6a8bfa2dbf54a545c975e7b1b1e2381cadaa542699575fe742f14a52cbb.png');
INSERT INTO crystal_products VALUES ('cry-004', 'Regal Crystal Bowl', 'Collection', 'Molded artisan crystal', 'Designed for premium tabletop presentation.', 'https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/089c5e44576414ff0bda32ccd3cc44d7566912d2c2175da7f7ce08f3304586ae.png');
INSERT INTO crystal_products VALUES ('cry-005', 'Imperial Decorative Orb', 'Home Accessories', 'K9 optical crystal', 'Statement centerpiece with high clarity and depth.', 'https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/089c5e44576414ff0bda32ccd3cc44d7566912d2c2175da7f7ce08f3304586ae.png');
INSERT INTO crystal_products VALUES ('cry-006', 'Signature Trophy Form', 'Gift Customization', 'Precision-engraved crystal', 'Corporate and ceremonial recognition piece.', 'https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/6a56feb77cfb7555b7ebaca2eee0d56d9fc0ec5e57144fd82602bea8a3f5a7cc.png');

DROP TABLE IF EXISTS spare_parts;
CREATE TABLE spare_parts (
  id VARCHAR(80) PRIMARY KEY,
  name VARCHAR(255),
  category VARCHAR(120),
  image_url TEXT
);
INSERT INTO spare_parts VALUES ('sp-001', 'AC Compressor', 'Air Conditioning', 'https://albaztrading.com/images/p1.webp');
INSERT INTO spare_parts VALUES ('sp-002', 'AC Duct', 'Air Conditioning', 'https://albaztrading.com/images/p2.webp');
INSERT INTO spare_parts VALUES ('sp-003', 'Cooling Coil', 'HVAC', 'https://albaztrading.com/images/p3.webp');
INSERT INTO spare_parts VALUES ('sp-004', 'Fridge Compressor', 'Refrigeration', 'https://albaztrading.com/images/p4.webp');
INSERT INTO spare_parts VALUES ('sp-005', 'Fridge Timer', 'Refrigeration', 'https://albaztrading.com/images/p5.webp');
INSERT INTO spare_parts VALUES ('sp-006', 'Fridge Thermostat', 'Refrigeration', 'https://albaztrading.com/images/p6.webp');
INSERT INTO spare_parts VALUES ('sp-007', 'Washing Machine Pulsator', 'Laundry', 'https://albaztrading.com/images/p7.webp');
INSERT INTO spare_parts VALUES ('sp-008', 'Washing Machine Hub', 'Laundry', 'https://albaztrading.com/images/p8.webp');
INSERT INTO spare_parts VALUES ('sp-009', 'Washing Machine Gear', 'Laundry', 'https://albaztrading.com/images/p9.webp');
INSERT INTO spare_parts VALUES ('sp-010', 'Condenser Fan Motor', 'HVAC', 'https://albaztrading.com/images/b1.webp');

DROP TABLE IF EXISTS contact_inquiries;
CREATE TABLE contact_inquiries (
  id VARCHAR(80) PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  comment TEXT,
  created_at VARCHAR(60)
);
INSERT INTO contact_inquiries VALUES ('4fabaf83-4030-4e55-9f3f-e5ff22d1a0b5', 'Test User', 'test@example.com', 'Need details on crystal collections', '2026-02-27T15:11:11.989440+00:00');
INSERT INTO contact_inquiries VALUES ('09f51467-7f1f-439c-bcff-3aeb43ac6e9f', 'Preview User', 'preview.user@example.com', 'Please share your best available appliance catalogs.', '2026-02-27T15:11:44.116294+00:00');
INSERT INTO contact_inquiries VALUES ('3ce184ca-eae7-417c-a428-7c41523f7545', 'QA User', 'qa.user@example.com', 'Please share spare parts list', '2026-02-27T15:13:47.611128+00:00');
INSERT INTO contact_inquiries VALUES ('9630a930-1dcf-40f9-bb2d-2e1cff807701', 'TEST QA User', 'test-f39ba614@example.com', 'TEST contact inquiry from automated backend validation.', '2026-02-27T15:15:26.840796+00:00');
INSERT INTO contact_inquiries VALUES ('6c43dc82-8cba-4969-b360-05d180ac376c', 'QA Tester', 'qa.tester@example.com', 'Automated contact inquiry from Playwright flow test.', '2026-02-27T15:16:26.162021+00:00');