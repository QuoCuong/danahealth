import { createStore, applyMiddleware, compose } from 'redux'
import thunk from 'redux-thunk'
import reducer from './reducers'

// const store = createStore(reducer, compose(
//     window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
// ))
const store = createStore(reducer, applyMiddleware(thunk))

store.subscribe(() => {
    console.log(store.getState())
})

export default store
