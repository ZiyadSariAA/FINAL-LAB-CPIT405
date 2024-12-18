import React from "react";
import "./BookmarkForm.css";

function BookmarkForm({ formData, handleChange, handleSubmit }) {

  const onInputChange = (event) => {
    handleChange(event);
  };


  const onFormSubmit = () => {
    handleSubmit();
  };

  return (
    <div className="frum-bx">
      <input placeholder="Add The Link Here "
        type="text"
        name="theLINK"
        className="inpt"
        value={formData.theLINK}
        onChange={onInputChange}
      />
      <input  type="text" name="theName"
        className="inpt" placeholder="Add The Title Please "
        value={formData.theName}
        onChange={onInputChange}
      />
      <textarea name="Description" className="txtar"
        value={formData.Description}
        onChange={onInputChange} placeholder="Descibe The Item "
      />
      <button className="btn" onClick={onFormSubmit}>
        Create
      </button>
    </div>
  );
}

export default BookmarkForm;
