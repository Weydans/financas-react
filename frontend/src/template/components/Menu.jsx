import React from 'react';

import MenuItem from'./MenuItem';
import MenuTree from './MenuTree';

export default props => (    
    <ul className="sidebar-menu tree" data-widget="tree">
        <MenuItem path="/" label="Dashboard" icon="dashboard"/>
        <MenuTree label="teste" icon="save">
            <MenuItem path="/teste" label="Teste" icon="save"/>
        </MenuTree>
    </ul>
);