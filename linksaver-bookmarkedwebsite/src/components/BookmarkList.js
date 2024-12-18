import React from "react";
import "./BookmarkList.css"; 

function BookmarkList({ bookmarks }) {
  const renderBookmark = (bookmark) => (
    <li key={bookmark.id} className="theitm">
      <span className="itmname">{bookmark.theName}:</span>{" "}
      <a
        href={bookmark.theLINK}
        target="_blank"
        rel="noopener noreferrer"
        className="itm-link"
      >
        {bookmark.theLINK}
      </a>
      <p className="idesc">{bookmark.Description}</p>
    </li>
  );

return (
<div className="juslist">
  <h2 className="ttle">The List</h2>
      {bookmarks.length > 0 ? (
        <ul className="lst">{bookmarks.map(renderBookmark)}</ul>) : (
        <p className="nobmks">you do not have anything .</p>
      )}

    </div>
  );
}

export default BookmarkList;
