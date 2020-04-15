import React from 'react';
import TextInput from './TextInput';

export default {
    title: 'TextInput',
    component: TextInput,
};

export function withText() {
    const [value, setValue] = React.useState('');

    return (
        <div className="w-48">
            <TextInput value={value} placeholder="Type something…" onChange={(value: string) => setValue(value)} />
        </div>
    );
}
