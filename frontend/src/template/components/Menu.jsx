import React from 'react';

export default props => (    
    <ul className="sidebar-menu tree" data-widget="tree">
        {props.children}
    </ul>
);