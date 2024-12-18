import axios from "axios";

const BASE_URL = "http://localhost:3000/api"; 
const api = {
  createBookmark: (data) => axios.post(`${BASE_URL}/create.php`, data),
  getAllBookmarks: () => axios.get(`${BASE_URL}/readAll.php`),
  updateBookmark: (data) => axios.put(`${BASE_URL}/update.php`, data),
  deleteBookmark: (id) => axios.delete(`${BASE_URL}/delete.php`, { data: { id } }),
};

export default api;
