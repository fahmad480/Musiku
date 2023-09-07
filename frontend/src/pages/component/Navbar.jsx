import React from "react";

//import react router dom
import { BrowserRouter as Router, Link, Route, Switch } from "react-router-dom";

//import axios
import axios from "axios";

function Navbar({ token, user, history }) {
  //function logout
  const logoutHanlder = async () => {
    //set axios header dengan type Authorization + Bearer token
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    //fetch Rest API
    await axios.post("http://localhost:8000/api/logout").then(() => {
      //remove token from localStorage
      localStorage.removeItem("token");

      //redirect halaman login
      history.push("/");
    });
  };

  return (
    <nav className="navbar navbar-expand-lg bg-body-tertiary">
      <div className="container-fluid">
        <a className="navbar-brand" href="#">
          Musiku
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon" />
        </button>
        <div className="collapse navbar-collapse" id="navbarSupportedContent">
          <ul className="navbar-nav me-auto mb-2 mb-lg-0">
            <li className="nav-item">
              <Link
                className="nav-link active"
                aria-current="page"
                to="dashboard"
              >
                Dashboard
              </Link>
            </li>
            <li className="nav-item">
              <Link
                className="nav-link active"
                aria-current="page"
                to="library"
              >
                My Library
              </Link>
            </li>
          </ul>
          <span class="navbar-text">
            Hi! <strong className="text-uppercase">{user.name}</strong>
            {" | "}
            <button onClick={logoutHanlder} className="btn btn-md btn-danger">
              LOGOUT
            </button>
          </span>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;
