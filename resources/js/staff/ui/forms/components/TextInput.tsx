import React from 'react';

type Props = {
    name?: string;
    placeholder?: string;
    value: string | null;
    onChange: (value: string) => void;
};

export default function TextInput({ name, placeholder, value, onChange, ...props }: Props) {
    function handleChange(event: React.ChangeEvent<HTMLInputElement>) {
        onChange(event.target.value);
    }

    return (
        <input
            id={name}
            name={name}
            className="form-input"
            type="text"
            placeholder={placeholder}
            value={value || ''}
            onChange={handleChange}
            {...props}
        />
    );
}
