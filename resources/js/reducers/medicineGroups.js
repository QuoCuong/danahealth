import { SET_MEDICINE_GROUPS } from '../actions/medicineGroupsActions'

const initialState = []

const medicineGroupsReducer = (state = initialState, action) => {
    switch (action.type) {
        case SET_MEDICINE_GROUPS:
            return action.data
        default:
            return state
    }
}

export default medicineGroupsReducer
