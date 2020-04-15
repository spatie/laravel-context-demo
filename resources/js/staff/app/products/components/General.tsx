import React from 'react';
import { Spacer } from '../../../ui/layout/components';
import { TextInput, Label } from '../../../ui/forms/components';

type Props = {
    form: Forms.Form<App.EventResource>;
    readonly: boolean;
};

export default function General({ form }: Props) {
    // TODO: use readonly

    return (
        <>
            <div>
                <Label {...form.getLabelProps('general.name')}>Name</Label>
                <TextInput placeholder="name" {...form.getInputProps('general.name')} />
            </div>

            <Spacer size="4" />

            <div>
                <Label {...form.getLabelProps('general.product_type')}>Product type</Label>
                <TextInput placeholder="product type" {...form.getInputProps('general.product_type')} />
            </div>

            <Spacer size="4" />

            <div>
                <Label {...form.getLabelProps('general.event_type')}>Event type</Label>
                <TextInput placeholder="event type" {...form.getInputProps('general.event_type')} />
            </div>
        </>
    );
}
