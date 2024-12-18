import { useState, useEffect } from "react";
import api from "../services/api";

function useFetchBookmarks() {
  const [bookmarks, setBookmarks] = useState([]);

   const fetchBookmarks = async () => {
    try {
      const response = await api.getAllBookmarks();
      setBookmarks(response.data);
    } catch (error) {
      console.error("Error fetching bookmarks:", error);
      setBookmarks([]);
    }
  };

   useEffect(() => {
    fetchBookmarks();
  }, []);

  return { bookmarks, fetchBookmarks };
}

export default useFetchBookmarks;
