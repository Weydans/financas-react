import React, { Component }     from 'react';
import { bindActionCreators }   from 'redux';
import { connect }              from 'react-redux';

import { getIncome } from '../../store/Actions/receitasActions';

import Page      from '../../template/components/Page';
import Grid      from '../../layout/Grid';
import Box       from '../../template/components/Box';
import BoxHeader from '../../template/components/BoxHeader';
import BoxBody   from '../../template/components/BoxBody';

class Detail extends Component {
    UNSAFE_componentWillMount() {
        this.props.getIncome(this.props.match.params.id);
    }

    showDetail() {
        const { income } = this.props;
        if (income) {
            return (
                <>
                    <h1 style={{marginBottom: '40px'}}>{income.description}</h1>

                    <div className="col-md-4 text-success" style={{padding: '40px 100px', }}>
                        <h1>R$ {`${parseFloat(income.value).toFixed(2)}`.replace('.', ',')}</h1>
                    </div>

                    <div className="col-md-8">
                        <p><b>Id:</b> {income.id}</p>
                        <p><b>Data lançamento:</b> {income.data_lancamento}</p>
                        <p><b>Data pagamento:</b> {income.data_pagamento}</p>
                        <p><b>Data vencimento:</b> {income.data_vencimento}</p>
                        <p><b>Tipo:</b> {income.tipo_id}</p>
                        <p><b>Status:</b> {income.status_id}</p>
                    </div>
                </>
            );
        }
    }

    render() {
        return (
            <Page title='Receita' subtitle="Detalhes">
                <Grid>
                    <Box>
                        <BoxHeader title="Detalhes" icon="file"/>
                        <BoxBody>
                            {this.showDetail()}
                        </BoxBody>
                    </Box>
                </Grid>
            </Page>
        );
    }
}

const mapStateToProps = state => ({ income: state.receitas.income });
const mapDispatchToProps = dispatch => bindActionCreators({ getIncome }, dispatch)
export default connect(mapStateToProps, mapDispatchToProps)(Detail);