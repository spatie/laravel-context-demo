import React from 'react';
import { Card, Spacer } from '../../../ui/layout/components';
import { TextInput, Label } from '../../../ui/forms/components';

type Props = {
    form: Forms.Form<App.EventResource>;
    readonly: boolean;
};

export default function ProductDetails({ form }: Props) {
    // TODO: use readonly

    return (
        <Card>
            <Card.Header title="Product details" />

            <Card.Contents>
                <div>
                    <Label {...form.getLabelProps('product_details.sections')}>Sections</Label>
                    <TextInput placeholder="sections" {...form.getInputProps('product_details.sections')} />
                </div>

                <Spacer size="1" />

                <div>
                    <Label {...form.getLabelProps('product_details.chapters')}>Chapters</Label>
                    <TextInput placeholder="chapters" {...form.getInputProps('product_details.chapters')} />
                </div>
            </Card.Contents>
        </Card>
    );
}
