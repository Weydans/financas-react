import React from 'react';
import { Link } from 'react-router-dom';

export default props => (
    <li className="treeview">
        <Link to="#">
            <i className={`fa fa-${props.icon} mr-2`}></i>
            <span>{props.label}</span>            
            <span className="pull-right-container">
                <i className="fa fa-angle-left pull-right"></i>
            </span>
        </Link>
        <ul className="treeview-menu">
            {props.children}
        </ul>
    </li>
);