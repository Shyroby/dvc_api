import React from "react";
import { Menu, Sidebar, Icon, Segment, List } from "semantic-ui-react";
import "./Components.css";

function SideNav(props) {
  return (
    <Sidebar
      as={Menu}
      animation="overlay"
      inverted={false}
      vertical
      onHide={() => props.onHide()}
      visible={props.visible}
      width="wide"
    >
      <Menu.Item>
        <Icon name="heart" />
      </Menu.Item>
      {props.children}
    </Sidebar>
  );
}

export default SideNav;
