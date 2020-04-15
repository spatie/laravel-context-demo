import React from 'react';
import FormCard from './FormCard';

export default { title: 'FormCard' };

export const withHeaderAndContent = () => <FormCard title="Card header">Card content</FormCard>;

export const withEditButton = () => (
    <FormCard title="Card header" canEdit>
        Card content
    </FormCard>
);

export const withSaveAndCancelButtons = () => (
    <FormCard title="Card header" canEdit isEditing>
        Card content
    </FormCard>
);
