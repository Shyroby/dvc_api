import React from "react";
import {
  Placeholder,
  Button,
  Card,
  Grid,
  Loader,
} from "semantic-ui-react";
import "../Containers/MainPage";

function MainGrid(props) {
  const ListItems = props.data.map((arr, i) => (
    <Grid.Column mobile={8} tablet={4} computer={4} key={i}>
      <Card style={{ fontSize: '13px', borderRadius: "20px!important", height: "260px" }}>
        <Placeholder>
          <Placeholder.Image />
        </Placeholder>
        <Card.Content>
          <Card.Meta>{arr.retailer}</Card.Meta>
          <Card.Header>{arr.title}</Card.Header>
          <Card.Description>{arr.category}</Card.Description>
        </Card.Content>
        <Card.Content extra>
          <Button
            circular
            icon="heart"
            onClick={() => props.onClick(arr)}
          />
        </Card.Content>
      </Card>
    </Grid.Column>
  ));

  if (props.isLoading) {
    return <Loader active inline="centered" />;
  }
  return (
    <Grid container  textAlign="left">
      {ListItems}
    </Grid>
  );
}

export default MainGrid;
