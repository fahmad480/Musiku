import React from "react";

//import axios
import axios from "axios";

function Music({ key, data, saveHandler, myLibrary = false, saveId = null }) {
  //token
  const token = localStorage.getItem("token");

  return (
    <div className="col-md-5 py-4 m-2 border">
      <div className="row">
        <div className="col-md-2">
          <img
            src={`http://localhost:8000/storage/albums/${data.album.image}`}
            alt="cover"
            className="img-fluid rounded"
          />
        </div>
        <div className="col-md-7">
          <h4 className="fw-bold">{data.title}</h4>
          <p className="text-muted mb-0">{data.album.artist.name}</p>
          <p className="text-muted mb-0">{data.album.title}</p>
        </div>
        <div className="col-md-3">
          <div className="d-flex align-items-center h-100">
            <div className="d-grid gap-2">
              {myLibrary ? (
                <button
                  className="btn btn-danger"
                  style={{ width: "100%" }}
                  onClick={() => saveHandler(saveId, false)}
                >
                  Remove
                </button>
              ) : data.saved_music.length >= 1 ? (
                <button className="btn btn-success" style={{ width: "100%" }}>
                  Saved
                </button>
              ) : (
                <button
                  className="btn btn-primary"
                  style={{ width: "100%" }}
                  onClick={() => saveHandler(data.id, true)}
                >
                  Save
                </button>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Music;
