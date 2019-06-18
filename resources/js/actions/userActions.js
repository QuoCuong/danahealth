import axios from 'axios'

export const TOGGLE_IS_LOGGEDIN = 'TOGGLE_IS_LOGGEDIN'
export const TOGGLE_IS_REGISTERED = 'TOGGLE_IS_REGISTERED'
export const SET_USER = 'SET_USER'
export const SET_TOKEN = 'SET_TOKEN'
export const SET_ERRORS = 'SET_REGISTER_ERRORS'
export const LOG_OUT = 'LOG_OUT'
export const CLEAR_ERRORS = 'CLEAR_ERRORS'

export function toggleIsLoggedIn() {
    return {
        type: TOGGLE_IS_LOGGEDIN
    }
}

export function toggleIsRegistered() {
    return {
        type: TOGGLE_IS_REGISTERED
    }
}

export function setUser(user) {
    return {
        type: SET_USER,
        user: user
    }
}

export function setToken(token) {
    return {
        type: SET_TOKEN,
        token: token
    }
}

export function setErrors(errors) {
    return {
        type: SET_ERRORS,
        errors: errors
    }
}

export function clearErrors() {
    return {
        type: CLEAR_ERRORS
    }
}

export function fetchLoggedInUser() {
    let url = window.Laravel.baseUrl + '/api/auth'
    let config = {
        headers: {
            'Authorization': "Bearer " + window.sessionStorage.getItem('accessToken')
        }
    }

    return dispatch => {
        return axios.get(url, config)
            .then(res => {
                dispatch(setUser(res.data))
                dispatch(toggleIsLoggedIn())
            })
            .catch(error => {
                dispatch(clearErrors())
                dispatch(setErrors({
                    token: [error.response.data.message]
                }))
            })
    }
}

export function login(data) {
    let url = window.Laravel.baseUrl + '/api/login'

    return dispatch => {
        return axios.post(url, data)
            .then(res => {
                dispatch(setUser(res.data.user))
                dispatch(setToken(res.data.token))
                window.sessionStorage.setItem('accessToken', res.data.token)
                dispatch(toggleIsLoggedIn())
                dispatch(clearErrors())
            })
            .catch(error => {
                dispatch(clearErrors())
                dispatch(setErrors(error.response.data.errors))
            })
    }
}

export function register(data) {
    let url = window.Laravel.baseUrl + '/api/register'

    return dispatch => {
        return axios.post(url, data)
            .then(res => {
                dispatch(setUser(res.data))
                dispatch(toggleIsRegistered())
                dispatch(clearErrors())
            })
            .catch(error => {
                dispatch(clearErrors())
                dispatch(setErrors(error.response.data.errors))
            })
    }
}

export function logout() {
    let url = window.Laravel.baseUrl + '/api/logout'
    let config = {
        headers: {
            'Authorization': "Bearer " + window.sessionStorage.getItem('accessToken')
        }
    }

    return dispatch => {
        return axios.post(url, { token: window.sessionStorage.getItem('accessToken') }, config)
            .then(res => {
                dispatch({ type: LOG_OUT })
            })
            .catch(error => {
                console.log(error.response)
            })
    }
}
