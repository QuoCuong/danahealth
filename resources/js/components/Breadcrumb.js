import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class Breadcrumb extends Component {
    constructor(props) {
        super(props)
        this.state = {
            title: '',
            medicineGroup: {},
            medicine: {}
        }
    }

    componentWillReceiveProps(nextProps) {
        if (!$.isEmptyObject(nextProps.medicine)) {
            this.setState({
                title: nextProps.title,
                medicineGroup: nextProps.medicine.medicine_group,
                medicine: nextProps.medicine
            })
        } else {
            this.setState({
                title: nextProps.title,
                medicineGroup: nextProps.medicineGroup,
                medicine: nextProps.medicine
            })
        }
    }

    render() {
        let items = []
        if (!$.isEmptyObject(this.state.medicine)) {
            items.push(
                <li key={0}><Link to='/'>Trang chủ</Link></li>,
                <li key={1}><Link to={{
                    pathname: `/medicine-groups/${this.state.medicineGroup.slug}/medicines`,
                    search: '?sortBy=price&type=asc&limit=12&page=1'
                }}>{this.state.medicineGroup.name}</Link></li>,
                <li key={2} className="active">{this.state.medicine.name}</li>
            )
        } else {
            items.push(
                <li key={0}><Link to='/'>Trang chủ</Link></li>,
                <li key={1} className="active">{this.state.medicineGroup.name}</li>,
            )
        }

        return (
            <div className="breadcrumb ptb_20">
                <h1>{this.props.title}</h1>
                <ul>
                    {items}
                </ul>
            </div>
        );
    }
}

export default Breadcrumb
