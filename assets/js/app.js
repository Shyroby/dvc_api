import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import MainPage from './Components/MainPage';
class App extends React.Component {
  render() {
    return (
      <BrowserRouter>
        <Switch> />
          <Route path="/" component={MainPage} />
        </Switch>
      </BrowserRouter>
    );
  }
}
ReactDOM.render(<App />, document.getElementById("root"));
