import {
    SET_USER,
    TOGGLE_IS_LOGGEDIN,
    TOGGLE_IS_REGISTERED,
    SET_ERRORS,
    SET_TOKEN,
    LOG_OUT,
    CLEAR_ERRORS
} from '../actions/userActions'

const initialState = {
    user: {},
    errors: {},
    isRegistered: false,
    isLoggedIn: false,
}

const userReducer = (state = initialState, action) => {
    switch (action.type) {
        case SET_USER:
            return {
                ...state,
                user: action.user
            }
        case SET_TOKEN:
            return {
                ...state,
                token: action.token
            }
        case TOGGLE_IS_REGISTERED:
            return {
                ...state,
                isRegistered: !state.isRegistered
            }
        case TOGGLE_IS_LOGGEDIN:
            return {
                ...state,
                isLoggedIn: !state.isLoggedIn
            }
        case LOG_OUT:
            return {
                ...state,
                user: {},
                isLoggedIn: false
            }
        case CLEAR_ERRORS:
            return {...state, errors: {}}
        case SET_ERRORS:
            return {...state, errors: action.errors}
        default:
            return state
    }
}

export default userReducer
