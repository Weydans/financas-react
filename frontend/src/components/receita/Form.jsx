import React from 'react';

import Page      from '../../template/components/Page';
import Grid      from '../../layout/Grid';
import Box       from '../../template/components/Box';
import BoxHeader from '../../template/components/BoxHeader';
import BoxBody   from '../../template/components/BoxBody';

export default props => (
    <Page title="Receita">
        <Grid>
            <Box>
                <BoxHeader title="Cadastro" icon="save"/>
                <BoxBody>
                    <div className="table-responsive">
                        <h1>Form</h1>
                    </div>
                </BoxBody>
            </Box>
        </Grid>
    </Page>
);