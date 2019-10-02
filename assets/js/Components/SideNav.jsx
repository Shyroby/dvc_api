import React from "react";
import { Menu, Sidebar, Icon, Segment, List } from "semantic-ui-react";
import "./Components.css";

function SideNav(props) {
  return (
    <Sidebar as={List}
      animation="overlay"
      inverted={false}
      vertical
      onHide={() => props.onHide()}
      visible={props.visible}
      width="wide"
    >
      <Menu as={Segment} position="left">
        <Menu.Item>
          <Icon name="heart" />
        </Menu.Item>
        <Menu.Item >{props.children}</Menu.Item>
      </Menu>
    </Sidebar>
  );
}

export default SideNav;
