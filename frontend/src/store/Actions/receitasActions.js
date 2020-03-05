import axios from 'axios';

const BASE_URL = 'http://localhost/financas-react/backend/public/api';

export async function getIncomes() {
    const incomes = await axios.get(`${BASE_URL}/income`);
    return {
        type: 'GET_INCOMES',
        payload: incomes
    }
}


export async function getIncome(id) {
    const income = await axios.get(`${BASE_URL}/income/${id}`);
    return {
        type: 'GET_INCOME',
        payload: income
    }
}