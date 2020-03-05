/** Import defaults */
import React, { Component } from 'react';
import { connect }  from 'react-redux';
import { bindActionCreators } from 'redux';

/** Import actions */
import { getSummary } from '../../store/Actions/dashboardAction';

/** Import components */
import Page         from '../../template/components/Page';
import Grid         from '../../layout/Grid';
import Row          from '../../layout/Row';
import ValueBox     from '../../template/components/ValueBox';

class Dashboard extends Component {    

    UNSAFE_componentWillMount() {
        this.props.getSummary();
    }
    
    render() {        
        const { credit, debit } = this.props.summary;

        return (
            <Page title='Dashboard' subtitle="Home">
                <Grid>
                    <Row>
                        <ValueBox 
                            cols="12 4"
                            color="green"
                            icon="bank"
                            value={`R$ ${(credit)}`.replace('.', ',')}
                            text="Total de créditos"
                        />           
                        <ValueBox 
                            cols="12 4"
                            color="red"
                            icon="credit-card"
                            value={`R$ ${(debit)}`.replace('.', ',')}
                            text="Total de débitos"
                        /> 
                        <ValueBox 
                            cols="12 4"
                            color="blue"
                            icon="money"
                            value={`R$ ${(credit - debit).toFixed(2)}`.replace('.', ',')}
                            text="Total de consolidado"
                        /> 
                    </Row>
                </Grid>
            </Page>
        );
    }
}

const mapStateToProps = state => ({summary: state.dashboard.summary});
const mapDispatchToProps = dispatch => bindActionCreators({getSummary}, dispatch);
export default connect(mapStateToProps, mapDispatchToProps)(Dashboard);