import React from 'react';

import Page         from '../template/components/Page';
import Grid         from '../layout/Grid';
import Row          from '../layout/Row';
import ValueBox     from '../template/components/ValueBox';

export default props => (
    <Page title='Dashboard' subtitle="Home">
        <Grid>
            <Row>
                <ValueBox 
                    cols="12 4"
                    color="green"
                    icon="bank"
                    value="R$ 10"
                    text="Total de créditos"
                />           
                <ValueBox 
                    cols="12 4"
                    color="red"
                    icon="credit-card"
                    value="R$ 10"
                    text="Total de débitos"
                /> 
                <ValueBox 
                    cols="12 4"
                    color="blue"
                    icon="money"
                    value="R$ 10"
                    text="Total de consolidado"
                /> 
            </Row>
        </Grid>
    </Page>
);