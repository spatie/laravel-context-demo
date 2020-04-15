import React, { useState } from 'react';
import { cloneDeep, get, set } from 'lodash';
import { Inertia } from '@inertiajs/inertia';
/* import { usePage } from "@inertiajs/inertia-react"; */

export default function useForm<T extends object>(initialValues: T, resourceAction: string): Forms.Form<T> {
    /* const page = usePage();
    const [errors, setErrors] = useState(page.errors); */

    const [errors, setErrors] = useState({});

    const [values, setValues] = useState(initialValues);

    function submit(event?: React.FormEvent) {
        if (event) {
            event.preventDefault();
        }

        Inertia.visit(resourceAction, {
            method: 'POST',
            data: values,
            preserveState: true,
        });
    }

    function getInputProps(fieldName: string) {
        function handleChange(value: any) {
            const newValues = cloneDeep(values);
            set(newValues, fieldName, value);

            setValues(newValues);
        }

        return {
            name: fieldName,
            value: get(values, fieldName),
            onChange: handleChange,
        };
    }

    function getLabelProps(fieldName: string) {
        return {
            hasError: !!get(errors, [fieldName.replace(/\[/, '.').replace(/\]/, ''), 0], ''),
            htmlFor: fieldName,
        };
    }

    function getInputError(fieldName: string) {
        return get(errors, [fieldName.replace(/\[/, '.').replace(/\]/, ''), 0], '');
    }

    return { values, setValues, submit, getInputProps, getLabelProps, getInputError, errors, setErrors };
}
