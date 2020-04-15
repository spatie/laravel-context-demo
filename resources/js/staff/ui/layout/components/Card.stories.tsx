import React from "react";
import Card from "./Card";

export default { title: "Card" };

export const withContents = () => (
    <Card>
        <Card.Contents>Hello, Sail AMX</Card.Contents>
    </Card>
);

export const withHeader = () => (
    <Card>
        <Card.Header title="Card Title" />
        <Card.Contents>Hello, Sail AMX</Card.Contents>
    </Card>
);
