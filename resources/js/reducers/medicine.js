import { SET_MEDICINE } from '../actions/medicineDetailsActions'

const initialState = {}

const medicineReducer = (state = initialState, action) => {
    switch (action.type) {
        case SET_MEDICINE:
            return action.data
        default:
            return state
    }
}

export default medicineReducer
