//import hook react
import React, { useState, useEffect } from "react";

//import hook useHitory from react router dom
import { useHistory } from "react-router";

//import component music
import Music from "./component/Music";
import Navbar from "./component/Navbar";

//import axios
import axios from "axios";

function Dashboard() {
  //state user
  const [user, setUser] = useState({});

  //define history
  const history = useHistory();

  //token
  const token = localStorage.getItem("token");

  //state music
  const [music, setMusic] = useState([]);

  //state search
  const [search, setSearch] = useState("");

  //function "fetchData"
  const fetchData = async () => {
    //set axios header dengan type Authorization + Bearer token
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    //fetch user from Rest API
    await axios.get("http://localhost:8000/api/user").then((response) => {
      //if response status 401 or 500
      if (response.status === 401 || response.status === 500) {
        //remove token from localStorage
        localStorage.removeItem("token");

        //redirect login page
        history.push("/");
      } else {
        //set response user to state
        setUser(response.data);
      }
    });
  };

  //function fetchMusics
  const fetchMusics = async () => {
    //set axios header dengan type Authorization + Bearer token
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    //fetch music from Rest API
    await axios.get("http://localhost:8000/api/music").then((response) => {
      //set response music to state
      setMusic(response.data.data.data);
    });
  };

  //function searchHandler
  const searchHandler = async () => {
    //set axios header dengan type Authorization + Bearer token
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    //fetch music from Rest API
    await axios
      .get(`http://localhost:8000/api/music?title=${search}`)
      .then((response) => {
        //set response music to state
        setMusic(response.data.data.data);
      });
  };

  const saveHandler = async (music_id, save) => {
    //set axios header dengan type Authorization + Bearer token
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    //fetch to Rest API
    if (save === true) {
      //set form-data
      const formData = new FormData();
      formData.append("music_id", music_id);
      await axios
        .post("http://localhost:8000/api/saved-music", formData)
        .then((response) => {
          fetchMusics();
        });
    } else {
      await axios
        .delete(`http://localhost:8000/api/saved-music/${music_id}`)
        .then((response) => {
          fetchMusics();
        });
    }
  };

  //hook useEffect
  useEffect(() => {
    //check token empty
    if (!token) {
      //redirect login page
      history.push("/");
    }

    //call function "fetchData"
    fetchData();

    //call function "fetchMusics"
    fetchMusics();
  }, []);

  return (
    <>
      <Navbar token={token} user={user} history={history} />
      <div className="container" style={{ marginTop: "50px" }}>
        <div className="row justify-content-center">
          <div className="col-md-12">
            <div className="card border-0 rounded shadow-sm">
              <div className="card-body">
                <h2 className="text-center">Song List</h2>
                <hr />
                <div className="row justify-content-center">
                  <div className="col-md-6">
                    <div className="input-group mb-3">
                      <input
                        type="text"
                        className="form-control"
                        placeholder="Search song..."
                        value={search}
                        onChange={(e) => setSearch(e.target.value)}
                      />
                      <button
                        className="btn btn-primary"
                        type="button"
                        onClick={searchHandler}
                      >
                        Search
                      </button>
                    </div>
                  </div>
                </div>
                <div className="row justify-content-center mt-4">
                  {music.map((data, index) => (
                    <Music key={index} data={data} saveHandler={saveHandler} />
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Dashboard;
