import React, { Component } from "react";
import _ from "lodash";
import "../../css/mainPage.css";
import { Sidebar, Segment, Grid, Container, Header } from "semantic-ui-react";
import axios from "axios";
import SideNav from "../Components/SideNav";
import FavList from "../Components/FavList";
import MainGrid from "../Components/MainGridList";
import AppBar from "../Components/AppBar";

class MainPage extends Component {
  constructor(props) {
    super(props);

    this.state = {
      loading: true,
      data: [],
      dataf: [],
      visible: false
    };
  }

  handleVisibility = () => {
    this.setState({
      visible: true
    });
  };

  handleOnHide = () => {
    this.setState({
      visible: false
    });
  };

  componentDidMount() {
    axios
      .get("http://localhost:8000/api/flyers?page=1&limit=100")
      .then(response => {
        this.setState({
          loading: false,
          data: response.data
        });
      })
      .catch(error => {
        console.log(error.response);
      });

    window.addEventListener("storage", this.localStorageUpdated());
  }

  /**localStorage on click add sync and update state */
  handleAddFavorite = arr => {
    let id = [];
    id.push(arr.id);
    var encode = JSON.stringify(arr);
    localStorage.setItem(id, encode);
    var newArray = this.state.dataf;
    newArray.push(arr);
    var filtered = _.uniqBy(newArray, "id");
    this.setState({ dataf: filtered });
  };

  /**update localstorage */
  localStorageUpdated = () => {
    var archive = [],
      keys = Object.keys(localStorage),
      i = 0,
      key;

    for (; (key = keys[i]); i++) {
      archive.push(localStorage.getItem(key));
    }
    var newArray = this.state.dataf;
    var decode = JSON.parse("[" + archive + "]");
    decode.forEach(element => {
      newArray.push(element);
    });

    this.setState({ dataf: newArray }, () => {});
  };

  /**Delete from local storage on click */
  handleDeleteFavorite = id => {
    localStorage.removeItem(id);
    var result = _.reject(this.state.dataf, ["id", id]);
    this.setState({
      dataf: result
    });
  };

  render() {
    return (
      <Sidebar.Pushable>
        <SideNav
          visible={this.state.visible}
          onHide={() => this.handleOnHide()}
        >
          <FavList
            dataf={this.state.dataf}
            onClick={e => this.handleDeleteFavorite(e)}
          />
        </SideNav>
        <Sidebar.Pusher>
          {/* AppBar */}
          <AppBar onClick={() => this.handleVisibility()} />
          {/* End AppBar */}
          <Grid centered>
            <Segment basic loading={this.state.isLoading} className="segment">
              <MainGrid
                data={this.state.data}
                isLoading={this.state.loading}
                onClick={e => this.handleAddFavorite(e)}
              />
            </Segment>
          </Grid>
        </Sidebar.Pusher>
      </Sidebar.Pushable>
    );
  }
}

export default MainPage;
