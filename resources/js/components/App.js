import React, { Component } from 'react'
import { withRouter } from 'react-router'
import { connect } from 'react-redux'
import { fetchMedicineGroups } from '../actions/medicineGroupsActions'
import { fetchLoggedInUser } from '../actions/userActions'

import Header from './layouts/Header'
import Sidebar from './layouts/Sidebar'
import Footer from './layouts/Footer'

class App extends Component {
    constructor(props) {
        super(props)
        this.sidebarElement = React.createRef()
    }

    componentWillMount() {
        this.props.dispatch(fetchLoggedInUser())
        this.unlisten = this.props.history.listen((location, action) => {
            switch(location.pathname) {
                case (location.pathname.match(/^\/category/) || {}).input:
                    // console.log('category', location)
                    break
                case '/':
                    // console.log('default', location)
                    break
                default:

            }
        });
    }

    componentDidMount() {
        this.props.dispatch(fetchMedicineGroups())
    }

    componentWillUnmount() {
        this.unlisten();
    }

    render() {
        return (
            <div>
                <Header medicineGroups={this.props.medicineGroups} />
                <div className="container" data-component="Container">
                    <div className="row">
                        <Sidebar ref={this.sidebarElement} />
                        {this.props.children}
                    </div>
                </div>
                <Footer />
            </div>
        )
    }
}

const mapStateToProps = state => ({
    medicineGroups: state.medicineGroups
})

export default withRouter(connect(mapStateToProps)(App))
