import React from 'react';

type Props = {
    children: React.ReactNode;
    htmlFor?: string;
    hasError?: boolean;
};

export default function Label({ children, hasError = false, htmlFor }: Props) {
    return (
        <label className="text-blue-lighter uppercase text-sm font-medium flex items-center h-6" htmlFor={htmlFor}>
            {children}
            {hasError && (
                <span
                    className="bg-red-600 rounded-full ml-auto"
                    style={{
                        width: '5px',
                        height: '5px',
                        transform: 'translateY(-1px)',
                    }}
                />
            )}
        </label>
    );
}
