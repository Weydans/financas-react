import React from 'react';
import { Link } from 'react-router-dom';

export default props => (
    <footer className="main-footer">        
        <strong>
            Copyright © <Link to={props.path} target="_blank">{props.company}</Link>.
        </strong>
    </footer>
);