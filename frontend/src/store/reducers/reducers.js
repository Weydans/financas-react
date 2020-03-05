import { combineReducers } from 'redux';

import dasboardReducer from './dashboardReducer';
import receitaReducer from './receitaReducers';

const reducers = combineReducers({
    dashboard: dasboardReducer,
    receitas: receitaReducer
});

export default reducers;