import React from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route } from "react-router-dom";
import { Provider } from 'react-redux'
import store from './store'

import App from './components/App'
import Home from './components/Home'
import LoginForm from './components/LoginForm'
import RegisterForm from './components/RegisterForm'
import Prescription from './components/Prescription'
import CategoryProduct from './components/CategoryProduct'
import MedicineDetail from './components/MedicineDetail'

ReactDOM.render(
    <BrowserRouter>
        <Provider store={store}>
            <App>
                <Route path='/login' render={(props) => <LoginForm {...props} />} />
                <Route path='/register' render={(props) => <RegisterForm {...props} />} />
                <Route path='/order-prescription' render={(props) => <Prescription {...props} />} />
                <Route path='/medicine-groups/:slug/medicines' render={(props) => <CategoryProduct {...props} />} />
                <Route path='/medicines/:id' render={(props) => <MedicineDetail {...props} />} />
                <Route exact path='/' render={(props) => <Home {...props} />} />
            </App>
        </Provider>
    </BrowserRouter>,
    document.getElementById('app')
)
