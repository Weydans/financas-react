import React, { Component }        from 'react';
import { connect }  from 'react-redux';

import Page         from '../../template/components/Page';
import Grid         from '../../layout/Grid';
import Row          from '../../layout/Row';
import ValueBox     from '../../template/components/ValueBox';

class Dashboard extends Component {    
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
                            value={`R$ ${credit}`}
                            text="Total de créditos"
                        />           
                        <ValueBox 
                            cols="12 4"
                            color="red"
                            icon="credit-card"
                            value={`R$ ${debit}`}
                            text="Total de débitos"
                        /> 
                        <ValueBox 
                            cols="12 4"
                            color="blue"
                            icon="money"
                            value={credit - debit}
                            text="Total de consolidado"
                        /> 
                    </Row>
                </Grid>
            </Page>
        );
    }
}

const mapStateToProps = state => ({summary: state.dashboard.summary});
export default connect(mapStateToProps)(Dashboard);