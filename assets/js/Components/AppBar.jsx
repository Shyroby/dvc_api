import React, { Component } from "react";
import PropTypes from "prop-types";
import { Menu, Icon } from "semantic-ui-react";

export default class AppBar extends Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  static propTypes = {
    color: PropTypes.string
  };

  handleItemClick = (e, { name }) => this.setState({ activeItem: name });

  render() {
    const { activeItem } = this.state;

    return (
      <>
        <Menu icon fixed="top" size='massive'>
          <Menu.Item
            name="bars"
            active={activeItem === "bars"}
            onClick={() => this.props.onClick()}
          >
            <Icon name="bars" />
          </Menu.Item>
        </Menu>
      </>
    );
  }
}
