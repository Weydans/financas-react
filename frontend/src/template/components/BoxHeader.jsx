import React from 'react';

export default props => (
    <div className="box-header with-border">
        <h3 className="box-title">
            <i className={`fa fa-${props.icon} mr-2`}></i> {props.title}
        </h3>
        {props.children}
    </div>
);