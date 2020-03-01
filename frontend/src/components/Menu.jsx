import React from 'react';

import Menu     from '../template/components/Menu';
import MenuItem from '../template/components/MenuItem';
import MenuTree from '../template/components/MenuTree';

export default props => (
    <Menu>
        <MenuItem path="/" label="Dashboard" icon="tachometer-alt"/>

        <MenuTree label="Receitas" icon="dollar-sign">
            <MenuItem path="/receita" label="Listagem" icon="list"/>
            <MenuItem path="/receita/cadastro" label="Cadastro" icon="save"/>
        </MenuTree>

        <MenuTree label="Despesas" icon="file-invoice-dollar">
            <MenuItem path="/despesa" label="Listagem" icon="list"/>
            <MenuItem path="/despesa/cadastro" label="Cadastro" icon="save"/>
        </MenuTree>

        <MenuItem path="/balanco" label="Balanço" icon="funnel-dollar"/>
        
        <MenuTree label="Relatórios" icon="search-dollar">
            <MenuItem path="/relatorio/receita" label="Receitas" icon="usd"/>
            <MenuItem path="/relatorio/despesa" label="Despesas" icon="file-invoice-dollar"/>
            <MenuItem path="/relatorio/balanco" label="Balanço" icon="funnel-dollar"/>
        </MenuTree>
    </Menu>
);