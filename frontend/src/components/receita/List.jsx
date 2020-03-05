import React, { Component } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';

import { getIncomes } from '../../store/Actions/receitasActions';

import Page      from '../../template/components/Page';
import Grid      from '../../layout/Grid';
import Box       from '../../template/components/Box';
import BoxHeader from '../../template/components/BoxHeader';
import BoxBody   from '../../template/components/BoxBody';

class List extends Component {

    UNSAFE_componentWillMount() {
        this.props.getIncomes();
    }

    getList() {
        let list = this.props.list || [];
        return list.map(item => (
            <tr key={item.id}>
                <td>{item.id}</td>
                <td>{item.description}</td>
                <td>{item.tipo_id}</td>
                <td>{item.data_lancamento}</td>
                <td>{`${item.value.toFixed(2)}`.replace('.', ',')}</td>
                <td style={{width: "250px"}}>
                    <Link to={`/receita/${item.id}`}>
                        <button className="btn btn-info mr-2">Ver</button>
                    </Link>
                    <Link to={`/receita/editar/${item.id}`}>
                        <button className="btn btn-warning mr-2">Editar</button>
                    </Link>
                    <Link to={`/receita/delete/${item.id}`}>
                        <button className="btn btn-danger mr-2">Remover</button>
                    </Link>
                </td>
            </tr>
        ));
    }

    render () {
        return (
            <Page title="Receita">
                <Grid>
                    <Box>
                        <BoxHeader title="Listagem" icon="list"/>
                        <BoxBody>
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
                                        {this.getList()}
                                    </tbody>
                                </table>
                            </div>
                        </BoxBody>
                    </Box>
                </Grid>
            </Page>
        );
    }
}

const mapStateToProps = state => ({ list: state.receitas.incomes });
const mapDispatchToProps = dispatch => bindActionCreators({ getIncomes }, dispatch);
export default connect(mapStateToProps, mapDispatchToProps)(List);
