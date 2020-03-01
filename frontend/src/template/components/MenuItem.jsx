import React from 'react';
import { Link } from 'react-router-dom';
 
export default props => (
    <li>        
        <Link to={props.path}>
            <i className={`fa fa-${props.icon} mr-2`}></i>
            <span>{props.label}</span>
        </Link>
    </li>
);