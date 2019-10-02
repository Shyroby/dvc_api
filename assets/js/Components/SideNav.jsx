import React from "react";
import {
  Menu,
  Sidebar,
  MenuHeader
} from "semantic-ui-react";
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
        <Menu.Menu>
          <Menu.Item>
            <MenuHeader as="h3">Favourites</MenuHeader>
          </Menu.Item>
          <Menu.Item name="The list of your preferred flyers" />
        </Menu.Menu>
      </Menu.Item>
      <Menu.Item>{props.children}</Menu.Item>
    </Sidebar>
  );
}

export default SideNav;
