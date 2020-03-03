import axios from 'axios';

const BASE_URL = 'minha-api';

export function getSummary() {
    const request = axios.get(`${BASE_URL}/billingCicles/summary`);
    return {
        type: '',
        payload: request
    };
}