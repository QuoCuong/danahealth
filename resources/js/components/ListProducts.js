import React, { Component } from 'react'

import Product from './Product'

class ListProducts extends Component {
    constructor(props) {
        super(props)
        this.state = {
            medicines: []
        }
    }

    componentWillReceiveProps(nextProps) {
        this.setState({
            medicines: nextProps.medicines
        })
    }

    render() {
        return (
            <div className="row">
                {
                    this.state.medicines.map((medicine, i) => {
                        return (
                            <Product key={i} medicine={medicine} isList={this.props.isList} />
                        )
                    })
                }
            </div>
        );
    }
}

export default ListProducts
