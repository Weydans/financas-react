import React from 'react';

import Page      from '../template/components/Page';
import Box       from '../template/components/Box';
import BoxHeader from '../template/components/BoxHeader';
import BoxBody   from '../template/components/BoxBody';

export default props => {
    let rows = []

    for(let i=1; i<=5; i++){
        rows.push(
            <tr key={i + 1}>
                <td>{i}</td>
                <td>Conta de água</td>
                <td>Despesa</td>
                <td>10/02/2020</td>
                <td>R$ 55,90</td>
                <td></td>
            </tr>
        );
    }

    return (
        <Page title="Receita">
            <div className="col-md-12">
                <Box>
                    <BoxHeader title="Listagem" icon="list"/>
                    <BoxBody>
                        <div className="box-body">
                            <div className="table-responsive">
                                <table className="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Descrição</th>
                                            <th>Tipo</th>
                                            <th>Data Lançamento</th>
                                            <th>Valor</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {rows}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </BoxBody>
                </Box>
            </div>
        </Page>
    );
}
