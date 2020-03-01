import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Home     from '../components/Dashboard';
import Receita  from '../components/Receita';

export default props => (
    <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/receita" exact component={Receita} />
        <Route path="*" component={Home} />
    </Switch>
);