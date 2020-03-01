import React from 'react';

export default props => {

    let cols    = (props.cols ? props.cols.split(' ') : []);
    let classes = '';

    classes += (cols[0] ? `col-sm-${cols[0]}` : classes);
    classes += (cols[1] ? ` col-md-${cols[1]}` : '');
    classes += (cols[2] ? ` col-lg-${cols[2]}` : '');
    classes += (cols[3] ? ` col-xl-${cols[3]}` : '');

    classes = (classes !== '' ? classes : 'col-sm-12');

    return (
        <div className={classes}>
            {props.children}
        </div>
    );
}
