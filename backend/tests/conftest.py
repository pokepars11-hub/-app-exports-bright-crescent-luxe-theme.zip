import os
import pytest
import requests


@pytest.fixture(scope="session")
def base_url():
    """Base URL fixture sourced from environment only."""
    value = os.environ.get("REACT_APP_BACKEND_URL")
    if not value:
        pytest.skip("REACT_APP_BACKEND_URL is not set")
    return value.rstrip("/")


@pytest.fixture(scope="session")
def api_client():
    """Shared API client for public endpoint testing."""
    session = requests.Session()
    session.headers.update({"Content-Type": "application/json"})
    return session
