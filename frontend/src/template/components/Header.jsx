import React from 'react';
import { Link } from 'react-router-dom';

export default props => (
    <header className="main-header">
        <Link to="/" className="logo">
            <span className="logo-mini">
                <i className={`fa fa-${props.icon}`}></i>
            </span>
            <span className="logo-lg">
                <i className={`fa fa-${props.icon}`}></i><b> {props.name}</b> {props.surname}
            </span>
        </Link>
        <nav className="navbar">
            <Link to="#" className="sidebar-toggle" data-toggle="push-menu" role="button">
                <span className="sr-only">Toggle navigation</span>
            </Link>
        </nav>
    </header>
);
