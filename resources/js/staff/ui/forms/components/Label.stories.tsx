import React from "react";
import Label from "./Label";

export default { title: "Label" };

export const withText = () => <Label>Start date</Label>;

export const withError = () => (
    <div className="w-48">
        <Label hasError>Start date</Label>
    </div>
);
