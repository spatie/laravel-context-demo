import React from 'react';
import Spacer from './Spacer';

export default { title: 'Spacer' };

export const small = () => (
    <>
        stuff
        <Spacer size="2" />
        more stuff
    </>
);

export const large = () => (
    <>
        stuff
        <Spacer size="8" />
        more stuff
    </>
);
