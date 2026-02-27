# Public API smoke + data assertion tests for Bright Crescent website backend
from datetime import datetime
import uuid


def test_api_root(api_client, base_url):
    response = api_client.get(f"{base_url}/api/")
    assert response.status_code == 200
    data = response.json()
    assert data["message"] == "Bright Crescent Trading API is live."


def test_company_info_structure(api_client, base_url):
    response = api_client.get(f"{base_url}/api/company-info")
    assert response.status_code == 200
    data = response.json()
    assert data["company_name"] == "Bright Crescent Trading Co LLC"
    assert "shop" in data and isinstance(data["shop"], dict)
    assert "office" in data and isinstance(data["office"], dict)


def test_news_returns_featured_and_grid_data(api_client, base_url):
    response = api_client.get(f"{base_url}/api/news")
    assert response.status_code == 200
    data = response.json()
    assert isinstance(data, list)
    assert len(data) >= 2
    assert data[0]["id"] and data[0]["title"]


def test_appliances_returns_valid_cards(api_client, base_url):
    response = api_client.get(f"{base_url}/api/products/appliances")
    assert response.status_code == 200
    data = response.json()
    assert isinstance(data, list)
    assert len(data) > 0
    sample = data[0]
    assert isinstance(sample["specs"], list)
    assert all(key in sample for key in ["id", "name", "category", "origin", "image_url"])


def test_crystals_returns_valid_cards(api_client, base_url):
    response = api_client.get(f"{base_url}/api/products/crystals")
    assert response.status_code == 200
    data = response.json()
    assert isinstance(data, list)
    assert len(data) > 0
    sample = data[0]
    assert all(key in sample for key in ["id", "name", "collection", "material", "note", "image_url"])


def test_spare_parts_returns_rows(api_client, base_url):
    response = api_client.get(f"{base_url}/api/products/spare-parts")
    assert response.status_code == 200
    data = response.json()
    assert isinstance(data, list)
    assert len(data) > 0
    sample = data[0]
    assert isinstance(sample["in_stock"], bool)
    assert all(key in sample for key in ["id", "sku", "name", "category", "compatibility"])


def test_contact_us_success(api_client, base_url):
    unique = uuid.uuid4().hex[:8]
    payload = {
        "name": "TEST QA User",
        "email": f"test-{unique}@example.com",
        "comment": "TEST contact inquiry from automated backend validation.",
    }
    response = api_client.post(f"{base_url}/api/contact-us", json=payload)
    assert response.status_code == 201
    data = response.json()
    assert data["name"] == payload["name"]
    assert data["email"] == payload["email"]
    assert data["comment"] == payload["comment"]
    assert isinstance(data["id"], str) and len(data["id"]) > 0
    datetime.fromisoformat(data["created_at"].replace("Z", "+00:00"))


def test_contact_us_validation_error(api_client, base_url):
    payload = {
        "name": "A",
        "email": "bad-email",
        "comment": "bad",
    }
    response = api_client.post(f"{base_url}/api/contact-us", json=payload)
    assert response.status_code == 422
    data = response.json()
    assert "detail" in data
