const INITIAL_STATE = { 
    incomes: [],
    income: {}
};

export default function(state = INITIAL_STATE, action) {
    switch (action.type) {
        case 'GET_INCOMES':
            return { ...state, incomes: action.payload.data };
        
        case 'GET_INCOME':
                return { ...state, income: action.payload.data }
    
        default:
            return state;
    }
}