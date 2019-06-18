import axios from 'axios'

export const SET_MEDICINE_GROUPS = 'SET_MEDICINE_GROUPS'

export function setMedicineGroups(data) {
    return {
        type: SET_MEDICINE_GROUPS,
        data: data
    }
}

export function fetchMedicineGroups() {
    let url = window.Laravel.baseUrl + '/api/medicine-groups'

    return dispatch => {
        return axios.get(url)
            .then(res => {
            dispatch(setMedicineGroups(res.data));
        });
    }
}
