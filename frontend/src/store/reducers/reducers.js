import { combineReducers } from 'redux';

import DasboardReducer from './dashboardReducer';

const reducers = combineReducers({
    dashboard: DasboardReducer
});

export default reducers;