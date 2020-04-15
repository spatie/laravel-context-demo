import React from 'react';
import { Card } from '../../layout/components';

type Props = {
    children: React.ReactNode;
    title?: string;
    canEdit?: boolean;
    isEditing?: boolean;
    onEdit?: () => void;
    onCancel?: () => void;
    onSave?: () => void;
};

export default function FormCard({ children, title, isEditing, canEdit, onEdit, onCancel, onSave }: Props) {
    return (
        <Card>
            <Card.Header
                title={title || ''}
                right={
                    isEditing ? (
                        <>
                            <button
                                className="bg-red-500 text-white border font-bold py-2 px-4 rounded"
                                type="button"
                                onClick={onCancel}
                            >
                                Cancel
                            </button>

                            <button
                                className="bg-blue-500 text-white border font-bold py-2 px-4 rounded ml-2"
                                type="button"
                                onClick={onSave}
                            >
                                Save
                            </button>
                        </>
                    ) : (
                        canEdit && (
                            <button
                                className="bg-white text-black border font-bold py-2 px-4 rounded"
                                type="button"
                                onClick={onEdit}
                            >
                                Edit
                            </button>
                        )
                    )
                }
            />

            <Card.Contents>{children}</Card.Contents>
        </Card>
    );
}
