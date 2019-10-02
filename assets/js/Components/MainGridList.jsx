import React from "react";
import { Placeholder, Button, Card, Grid, Loader } from "semantic-ui-react";
import "../Containers/MainPage";

function MainGrid(props) {
  const ListItems = props.data.map((arr, i) => (
    <Grid.Column mobile={8} tablet={4} computer={4} key={i}>
      <Card style={{ height: "350px" }}>
        <Placeholder>
          <Placeholder.Image />
        </Placeholder>
        <Card.Content>
          <Card.Header>{arr.title}</Card.Header>
          <Card.Meta>
            <span className="date">{arr.end_date}</span>
          </Card.Meta>
          <Card.Description>{arr.description}</Card.Description>
        </Card.Content>
        <Card.Content extra>
          <Button
            circular
            icon="heart"
            value={arr.id}
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
    <Grid container className="segment" textAlign="left">
      {ListItems}
    </Grid>
  );
}

export default MainGrid;
