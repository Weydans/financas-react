import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Home from '../components/Home';
import Teste from '../components/OtherPage';

export default props => (
    <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/teste" exact component={Teste} />
        <Route path="*" component={Home} />
    </Switch>
);