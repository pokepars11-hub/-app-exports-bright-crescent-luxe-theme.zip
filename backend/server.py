from datetime import datetime, timezone
import logging
import os
from pathlib import Path
from typing import List
import uuid

from dotenv import load_dotenv
from fastapi import APIRouter, FastAPI, HTTPException
from motor.motor_asyncio import AsyncIOMotorClient
from pydantic import BaseModel, ConfigDict, EmailStr, Field
from starlette.middleware.cors import CORSMiddleware


ROOT_DIR = Path(__file__).parent
load_dotenv(ROOT_DIR / ".env")

mongo_url = os.environ["MONGO_URL"]
client = AsyncIOMotorClient(mongo_url)
db = client[os.environ["DB_NAME"]]

app = FastAPI(title="Bright Crescent Trading Co LLC API")
api_router = APIRouter(prefix="/api")


class CompanyLocation(BaseModel):
    title: str
    address: str
    phone: str
    email: str


class CompanyInfo(BaseModel):
    company_name: str
    brand_line: str
    hero_summary: str
    shop: CompanyLocation
    office: CompanyLocation


class NewsItem(BaseModel):
    id: str
    title: str
    date: str
    category: str
    excerpt: str
    image_url: str


class ApplianceProduct(BaseModel):
    id: str
    name: str
    category: str
    origin: str
    specs: List[str]
    image_url: str


class CrystalProduct(BaseModel):
    id: str
    name: str
    collection: str
    material: str
    note: str
    image_url: str


class SparePart(BaseModel):
    id: str
    sku: str
    name: str
    category: str
    compatibility: str
    in_stock: bool


class ContactInquiryCreate(BaseModel):
    name: str = Field(min_length=2, max_length=80)
    email: EmailStr
    comment: str = Field(min_length=5, max_length=1000)


class ContactInquiry(ContactInquiryCreate):
    model_config = ConfigDict(extra="ignore")

    id: str
    created_at: datetime


COMPANY_INFO = CompanyInfo(
    company_name="Bright Crescent Trading Co LLC",
    brand_line="Premium Trading in Appliances, Crystal Craft, and Precision Spare Parts",
    hero_summary="Serving retail and commercial buyers with curated quality products and dependable sourcing across the UAE and beyond.",
    shop=CompanyLocation(
        title="Retail Shop",
        address="[Add Shop Address], UAE",
        phone="[Add Shop Phone]",
        email="shop@brightcrescenttrading.com",
    ),
    office=CompanyLocation(
        title="Corporate Office",
        address="[Add Office Address], UAE",
        phone="[Add Office Phone]",
        email="office@brightcrescenttrading.com",
    ),
)


NEWS_ITEMS: List[NewsItem] = [
    NewsItem(
        id="news-001",
        title="Bright Crescent Expands Premium Appliance Procurement Network",
        date="2026-01-15",
        category="Company",
        excerpt="Our sourcing division now supports broader supply coverage for premium kitchen and lifestyle appliances across GCC markets.",
        image_url="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80",
    ),
    NewsItem(
        id="news-002",
        title="Crystal Collections for Hospitality and Luxury Interiors",
        date="2025-12-07",
        category="Product",
        excerpt="We introduced curated crystal décor lines inspired by international exhibitions to support hotels, lounges, and high-end residences.",
        image_url="https://images.unsplash.com/photo-1529699211952-734e80c4d42b?auto=format&fit=crop&w=1200&q=80",
    ),
    NewsItem(
        id="news-003",
        title="Faster Spare Parts Availability for Cooling Systems",
        date="2025-11-26",
        category="Operations",
        excerpt="Inventory optimization now improves turnaround for AC and refrigeration spare parts requested by technicians and facility teams.",
        image_url="https://images.unsplash.com/photo-1581094271901-8022df4466f9?auto=format&fit=crop&w=1200&q=80",
    ),
    NewsItem(
        id="news-004",
        title="Strategic Vendor Alliances for Long-Term Quality Assurance",
        date="2025-10-13",
        category="Partnership",
        excerpt="Bright Crescent reinforces quality checks and compliance standards through strategic partner evaluation and lifecycle testing.",
        image_url="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80",
    ),
]


APPLIANCE_PRODUCTS: List[ApplianceProduct] = [
    ApplianceProduct(
        id="app-001",
        name="Elite Smart Refrigerator 520L",
        category="Refrigeration",
        origin="Germany",
        specs=["Multi-zone cooling", "Energy-efficient inverter", "Fingerprint-resistant steel"],
        image_url="https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?auto=format&fit=crop&w=900&q=80",
    ),
    ApplianceProduct(
        id="app-002",
        name="Signature Convection Oven Pro",
        category="Cooking",
        origin="Italy",
        specs=["Dual convection", "Steam-assist baking", "Soft-close precision doors"],
        image_url="https://images.unsplash.com/photo-1594041680534-e8c8cdebd659?auto=format&fit=crop&w=900&q=80",
    ),
    ApplianceProduct(
        id="app-003",
        name="Premium Front-Load Washer",
        category="Laundry",
        origin="Japan",
        specs=["Silent-drive motor", "Auto-dose detergent", "Fabric care modes"],
        image_url="https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?auto=format&fit=crop&w=900&q=80",
    ),
    ApplianceProduct(
        id="app-004",
        name="Built-in Wine Chiller",
        category="Lifestyle",
        origin="France",
        specs=["UV-protected glass", "Dual temperature zones", "Vibration-control system"],
        image_url="https://images.unsplash.com/photo-1615874959474-d609969a20ed?auto=format&fit=crop&w=900&q=80",
    ),
    ApplianceProduct(
        id="app-005",
        name="Platinum Dishwasher Series X",
        category="Cleaning",
        origin="Sweden",
        specs=["Low water usage", "Crystal-safe cycle", "Auto-dry technology"],
        image_url="https://images.unsplash.com/photo-1563453392212-326f5e854473?auto=format&fit=crop&w=900&q=80",
    ),
    ApplianceProduct(
        id="app-006",
        name="Modular Air Purification Tower",
        category="Air Care",
        origin="UAE",
        specs=["HEPA H14 filtration", "Smart sensors", "Large-space coverage"],
        image_url="https://images.unsplash.com/photo-1585336261022-680e295ce3fe?auto=format&fit=crop&w=900&q=80",
    ),
]


CRYSTAL_PRODUCTS: List[CrystalProduct] = [
    CrystalProduct(
        id="cry-001",
        name="Aurora Crystal Vase",
        collection="Home Accessories",
        material="Lead-free crystal",
        note="Inspired by contemporary Asian crystal craft trends.",
        image_url="https://images.unsplash.com/photo-1643904767336-d819d2f5585d?auto=format&fit=crop&w=900&q=80",
    ),
    CrystalProduct(
        id="cry-002",
        name="Celestial Gift Figurine",
        collection="Gift Customization",
        material="Hand-cut optical crystal",
        note="Ideal for executive gifting and premium commemoratives.",
        image_url="https://images.unsplash.com/photo-1583918489284-2be9908abfa2?auto=format&fit=crop&w=900&q=80",
    ),
    CrystalProduct(
        id="cry-003",
        name="Lumen Hanging Accent",
        collection="Lighting Fixture",
        material="Polished faceted crystal",
        note="Decorative suspended crystal format for interiors.",
        image_url="https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/d4d3e6a8bfa2dbf54a545c975e7b1b1e2381cadaa542699575fe742f14a52cbb.png",
    ),
    CrystalProduct(
        id="cry-004",
        name="Regal Crystal Bowl",
        collection="Collection",
        material="Molded artisan crystal",
        note="Designed for premium tabletop presentation.",
        image_url="https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/089c5e44576414ff0bda32ccd3cc44d7566912d2c2175da7f7ce08f3304586ae.png",
    ),
    CrystalProduct(
        id="cry-005",
        name="Imperial Decorative Orb",
        collection="Home Accessories",
        material="K9 optical crystal",
        note="Statement centerpiece with high clarity and depth.",
        image_url="http://www.yitaicrystal.com/upload/a/a99.jpg",
    ),
    CrystalProduct(
        id="cry-006",
        name="Signature Trophy Form",
        collection="Gift Customization",
        material="Precision-engraved crystal",
        note="Corporate and ceremonial recognition piece.",
        image_url="https://static.prod-images.emergentagent.com/jobs/a7634a05-8d2f-444b-ac74-4d249d81491e/images/6a56feb77cfb7555b7ebaca2eee0d56d9fc0ec5e57144fd82602bea8a3f5a7cc.png",
    ),
]


SPARE_PARTS: List[SparePart] = [
    SparePart(id="sp-001", sku="AC-CMP-410", name="AC Compressor", category="Air Conditioning", compatibility="Split & Ducted Units", in_stock=True),
    SparePart(id="sp-002", sku="AC-DCT-122", name="AC Duct", category="Air Conditioning", compatibility="Commercial Cooling", in_stock=True),
    SparePart(id="sp-003", sku="CC-COIL-774", name="Cooling Coil", category="HVAC", compatibility="Centralized Systems", in_stock=True),
    SparePart(id="sp-004", sku="FR-CMP-993", name="Fridge Compressor", category="Refrigeration", compatibility="Single/Double Door", in_stock=False),
    SparePart(id="sp-005", sku="FR-TMR-632", name="Fridge Timer", category="Refrigeration", compatibility="Domestic & Commercial", in_stock=True),
    SparePart(id="sp-006", sku="FR-THM-118", name="Fridge Thermostat", category="Refrigeration", compatibility="Multi-brand Models", in_stock=True),
    SparePart(id="sp-007", sku="WM-PLS-555", name="Washing Machine Pulsator", category="Laundry", compatibility="Top-load Machines", in_stock=True),
    SparePart(id="sp-008", sku="WM-HUB-209", name="Washing Machine Hub", category="Laundry", compatibility="Heavy-duty Machines", in_stock=False),
    SparePart(id="sp-009", sku="WM-GEAR-330", name="Washing Machine Gear", category="Laundry", compatibility="Multiple Gearbox Types", in_stock=True),
    SparePart(id="sp-010", sku="HV-FAN-842", name="Condenser Fan Motor", category="HVAC", compatibility="AC Outdoor Units", in_stock=True),
]


@api_router.get("/")
async def root():
    return {"message": "Bright Crescent Trading API is live."}


@api_router.get("/company-info", response_model=CompanyInfo)
async def get_company_info():
    return COMPANY_INFO


@api_router.get("/news", response_model=List[NewsItem])
async def get_news_items():
    return NEWS_ITEMS


@api_router.get("/products/appliances", response_model=List[ApplianceProduct])
async def get_appliances():
    return APPLIANCE_PRODUCTS


@api_router.get("/products/crystals", response_model=List[CrystalProduct])
async def get_crystal_products():
    return CRYSTAL_PRODUCTS


@api_router.get("/products/spare-parts", response_model=List[SparePart])
async def get_spare_parts():
    return SPARE_PARTS


@api_router.post("/contact-us", response_model=ContactInquiry, status_code=201)
async def create_contact_inquiry(payload: ContactInquiryCreate):
    now_utc = datetime.now(timezone.utc)
    inquiry = ContactInquiry(
        id=str(uuid.uuid4()),
        name=payload.name,
        email=payload.email,
        comment=payload.comment,
        created_at=now_utc,
    )

    try:
        doc = inquiry.model_dump()
        doc["created_at"] = doc["created_at"].isoformat()
        await db.contact_inquiries.insert_one(doc)
        return inquiry
    except Exception as exc:  # pragma: no cover
        raise HTTPException(status_code=500, detail="Unable to submit inquiry right now.") from exc


app.include_router(api_router)

app.add_middleware(
    CORSMiddleware,
    allow_credentials=True,
    allow_origins=os.environ.get("CORS_ORIGINS", "*").split(","),
    allow_methods=["*"],
    allow_headers=["*"],
)

logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s",
)
logger = logging.getLogger(__name__)


@app.on_event("shutdown")
async def shutdown_db_client():
    client.close()