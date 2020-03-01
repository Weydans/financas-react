import React from 'react';
import { BrowserRouter as Router } from 'react-router-dom';

import '../template/dependencies';

import Header  from '../template/components/Header';
import Sidebar from '../template/components/Sidebar';
import Main    from '../template/components/Main';
import Footer  from '../template/components/Footer';
import Routes  from './Routes';

export default props => (
	<Router>
		<Header name="MY" surname="Money" icon="money"/>
		<Sidebar />
		<Main>			
			<Routes />			
		</Main>			
		<Footer company="WKTecnologia" path="https://github.com/Weydans"/>
	</Router>
);
