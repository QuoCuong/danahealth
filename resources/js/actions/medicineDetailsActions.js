export const SET_MEDICINE = 'SET_MEDICINE'

import axios from 'axios'

export function setMedicine(data) {
    return {
        type: SET_MEDICINE,
        data: data
    }
}

export function fetchMedicine(url) {
    return dispatch => {
        return axios.get(url)
            .then(res => {
            dispatch(setMedicine(res.data));
        });
    }
}
