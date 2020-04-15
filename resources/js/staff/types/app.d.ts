namespace App {
    type EventResource = {
        general: {
            name: string;
            product_type: string;
            event_type: 'single' | 'multi';
        };
        product_details: {
            sections: Array<string>;
            chapters: Array<string>;
        };
    };
}
