import React from 'react';

export default props => (
    <aside className="main-sidebar">
        <section className="sidebar">
            {props.children}
        </section>
    </aside>
);