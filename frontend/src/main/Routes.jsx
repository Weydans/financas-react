import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Home         from '../components/dashboard/Dashboard';
import ReceitaList  from '../components/receita/List';
import ReceitaDetail  from '../components/receita/Detail';
import Form  from '../components/receita/Form';

export default props => (
    <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/receita" exact component={ReceitaList} />
        <Route path="/receita/:id" exact component={ReceitaDetail} />
        <Route path="/receita/cadastro" exact component={Form} />
        <Route path="*" component={Home} />
    </Switch>
);