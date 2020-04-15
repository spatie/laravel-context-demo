import React from 'react';

type Props = {
    children: React.ReactNode;
};

export default function Card({ children }: Props) {
    return <section className="bg-white border border-blue-lightestest shadow rounded">{children}</section>;
}

type HeaderProps = {
    title: string;
    right?: React.ReactNode;
};

Card.Header = function CardHeader({ title, right }: HeaderProps) {
    return (
        <header className="p-6 border-b border-purplegray-light">
            <h3 className="inline-block text-lg font-medium text-purplegray-dark">{title}</h3>

            {right && <div className="inline-block float-right">{right}</div>}
        </header>
    );
};

type ContentsProps = {
    children: React.ReactNode;
};

Card.Contents = function CardContents({ children }: ContentsProps) {
    return <div className="px-6 py-8">{children}</div>;
};
