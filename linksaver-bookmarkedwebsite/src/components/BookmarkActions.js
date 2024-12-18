import React from "react";
import "./BookmarkActions.css";

function BookmarkActions({ isDisabled, handleAction }) {


  const handleUpdateClick = () => {
    handleAction("update");
  };

  const handleDeleteClick = () => {
    handleAction("delete");
  };

  return (
    <div>
      <button
        onClick={handleUpdateClick}
        disabled={isDisabled}
        className={`bt updte ${isDisabled ? "of" : ""}`}
      > Upadte</button>

      <button
        onClick={handleDeleteClick}
        disabled={isDisabled}
        className={`bt delet ${isDisabled ? "of" : ""}`}> Deleete</button>

    </div>
  );
}

export default BookmarkActions;
