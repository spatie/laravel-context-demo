import React from 'react';

type Props = {
    size: string;
};

export default function Spacer({ size }: Props) {
    return <div className={`h-${size} w-full`}></div>;
}
