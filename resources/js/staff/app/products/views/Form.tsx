import React, { useState } from 'react';
import { useForm } from '../../../ui/forms/hooks';
import { Spacer } from '../../../ui/layout/components';
import { General, ProductDetails } from '../components';
import FormCard from '../../../ui/forms/components/FormCard';

const event: App.EventResource = {
    general: {
        name: 'Webinar',
        product_type: 'conference',
        event_type: 'single',
    },
    product_details: {
        sections: ['Section 01', 'Section 02'],
        chapters: ['Denver', 'CO', 'Philadelphia', 'New York City'],
    },
};

export default function Form() {
    const form = useForm(event, '/');
    const [editingBlock, setEditingBlock] = useState<'general' | 'product_details' | null>(null);

    return (
        <div className="p-4">
            <FormCard
                title="General"
                canEdit={!editingBlock}
                isEditing={editingBlock === 'general'}
                onEdit={() => setEditingBlock('general')}
                onCancel={() => setEditingBlock(null)}
            >
                <General readonly={editingBlock !== 'general'} form={form} />
            </FormCard>

            <Spacer size="4" />

            <FormCard
                title="Product details"
                canEdit={!editingBlock}
                isEditing={editingBlock === 'product_details'}
                onEdit={() => setEditingBlock('product_details')}
                onCancel={() => setEditingBlock(null)}
            >
                <ProductDetails readonly={editingBlock !== 'product_details'} form={form} />
            </FormCard>

            <Spacer size="4" />
        </div>
    );
}
