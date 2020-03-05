import axios from 'axios';

const BASE_URL = 'http://localhost/financas-react/backend/public/api';

export async function getSummary() {
    const request = await axios.get(`${BASE_URL}/billingCicles/summary`);    
    return {
        type: 'BILLING_SUMMARY_FETCHED',
        payload: request.data
    };
}