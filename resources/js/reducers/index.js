import { combineReducers } from 'redux'
import medicineGroups from './medicineGroups'
import medicine from './medicine'
import user from './user'

export default combineReducers({
    medicineGroups,
    medicine,
    user
})
