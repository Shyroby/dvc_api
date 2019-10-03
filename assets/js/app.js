import React from "react";
import ReactDOM from "react-dom";
import ErrorBoundary from './Containers/errors/ErrorBoundary';
import { BrowserRouter, Route, Switch } from "react-router-dom";
import MainPage from "./Containers/MainPage";
class App extends React.Component {
  render() {
    return (
      <ErrorBoundary>
        <BrowserRouter>
          <Switch>
            <Route path="/" component={MainPage} />
          </Switch>
        </BrowserRouter>
      </ErrorBoundary>
    );
  }
}
ReactDOM.render(<App />, document.getElementById("root"));
