import { applyMiddleware, createStore } from 'redux';
import promise from 'redux-promise';

import reducers from './reducers/reducers';

const devTools = window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__();

const store = applyMiddleware(promise)(createStore)(reducers, devTools);

export default store;
