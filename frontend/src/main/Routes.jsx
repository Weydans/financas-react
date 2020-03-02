import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Home     from '../components/dashboard/Dashboard';
import List  from '../components/receita/List';
import Form  from '../components/receita/Form';

export default props => (
    <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/receita" exact component={List} />
        <Route path="/receita/cadastro" exact component={Form} />
        <Route path="*" component={Home} />
    </Switch>
);