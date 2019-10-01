import React from "react";
import { Menu, Sidebar, Icon } from "semantic-ui-react";
import "./Components.css";

function SideNav(props) {
  return (
    <Sidebar
      as={Menu}
      animation="overlay"
      icon="labeled"
      inverted={false}
      vertical
      onHide={() => props.onHide()}
      visible={props.visible}
      width="wide"
      className="sideNav"
    >
      <Menu.Item>
        <Icon name="heart" />
      </Menu.Item>
      {props.children}
    </Sidebar>
  );
}

export default SideNav;
