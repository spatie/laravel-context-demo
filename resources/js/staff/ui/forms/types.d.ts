namespace Forms {
    type Errors = { [key: string]: Array<string> };

    type Form<T extends object> = {
        values: T;
        setValues: React.Dispatch<React.SetStateAction<T>>;
        submit: Promise;
        getInputProps: (
            fieldName: string
        ) => {
            name: string;
            value: any;
            onChange: (value: any) => void;
        };
        getLabelProps: (fieldName: string) => { htmlFor: string; hasError: boolean };
        getInputError: (fieldName: string) => string;
        errors: Errors;
        setErrors: React.Dispatch<React.SetStateAction<Errors>>;
    };
}
