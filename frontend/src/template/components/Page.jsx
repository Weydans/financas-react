import React from 'react';

import PageHeader from './PageHeader';
import PageContent from './PageContent';

export default props => (
    <>
        <PageHeader title={props.title} subtitle={props.subtitle} />
        <PageContent>
            {props.children}
        </PageContent>
    </>
);