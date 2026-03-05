import axios from "axios";

const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;
const API_ROOT = `${BACKEND_URL}/api`;

export const fetchCompanyInfo = async () => {
  const response = await axios.get(`${API_ROOT}/company-info`);
  return response.data;
};

export const fetchNews = async () => {
  const response = await axios.get(`${API_ROOT}/news`);
  return response.data;
};

export const fetchAppliances = async () => {
  const response = await axios.get(`${API_ROOT}/products/appliances`);
  return response.data;
};

export const fetchCrystals = async () => {
  const response = await axios.get(`${API_ROOT}/products/crystals`);
  return response.data;
};

export const fetchSpareParts = async () => {
  const response = await axios.get(`${API_ROOT}/products/spare-parts`);
  return response.data;
};

export const submitContactInquiry = async (payload) => {
  const response = await axios.post(`${API_ROOT}/contact-us`, payload);
  return response.data;
};
