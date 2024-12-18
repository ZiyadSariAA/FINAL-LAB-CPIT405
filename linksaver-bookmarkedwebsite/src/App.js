import React, { useState } from "react";
import useFetchBookmarks from "./hooks/useFetchBookmarks";
import BookmarkForm from "./components/BookmarkForm";
import BookmarkActions from "./components/BookmarkActions";
import BookmarkList from "./components/BookmarkList";
import api from "./services/api";
import "./App.css";

function App() {
  const { bookmarks, fetchBookmarks } = useFetchBookmarks();
  const [formData, setFormData] = useState({
    theLINK: "",
    theName: "",
    Description: "",

  });

  const onInputChange = (event) => {
    const { name, value } = event.target;
    setFormData({ ...formData, [name]: value });
  };

  const onFormSubmit = async () => {
    try {
      await api.createBookmark(formData);
      fetchBookmarks();
    } catch (error) {
      console.error("Error", error);
    }
  };

  const onActionClick = async (action) => {
    if (!bookmarks.length) return;

    try {
      if (action === "delete") {
        await api.deleteBookmark(bookmarks[0].id);
      } else if (action === "update") {

        await api.updateBookmark({
          id: bookmarks[0].id,
          theLINK: formData.theLINK,
          theName: formData.theName,

          Description: formData.Description,
        });
      }
      fetchBookmarks();
    } catch (error) {

      console.error(`Error performing ${action}:`, error);
    }
  };

  return (
    <div className="app-bx">
      <h1>BookMarks App</h1>
      <BookmarkForm
        formData={formData}
        handleChange={onInputChange}
        handleSubmit={onFormSubmit}
      />
      <BookmarkActions
        isDisabled={!bookmarks.length}
        handleAction={onActionClick}
      />
      <BookmarkList bookmarks={bookmarks} />

    </div>
  );
}

export default App;
