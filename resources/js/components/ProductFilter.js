import React, { Component } from 'react'
import { withRouter } from 'react-router'

class ProductFilter extends Component {
    constructor(props) {
        super(props)
        this.state = {
            sortBy: 'price',
            type: 'asc',
            limit: 12
        }
        this.onSortByChange = this.onSortByChange.bind(this)
        this.onLimitChage = this.onLimitChage.bind(this)
    }

    onSortByChange(e) {
        this.setState({
            sortBy: 'price',
            type: e.target.value
        }, (props = this.props) => {
            props.history.push({
                pathname: props.match.url + '/medicines',
                search: '?sortBy=' + this.state.sortBy + '&type=' + this.state.type + '&limit=' + this.state.limit + '&page=1'
            })
        })
    }

    onLimitChage(e) {
        this.setState({
            limit: e.target.value
        }, (props = this.props) => {
            props.history.push({
                pathname: props.match.url + '/medicines',
                search: '?sortBy=' + this.state.sortBy + '&type=' + this.state.type + '&limit=' + this.state.limit + '&page=1'
            })
        })
    }

    render() {
        return (
            <div className="category-page-wrapper mb_30">
                <div className="col-xs-6 sort-wrapper">
                    <label className="control-label" htmlFor="input-sort">Sắp xếp theo:</label>
                    <div className="sort-inner">
                        <select id="input-sort" className="form-control" onChange={this.onSortByChange}>
                            <option value="asc" defaultValue>Giá (thấp đến cao)</option>
                            <option value="desc">Giá (cao xuống thấp)</option>
                        </select>
                    </div>
                    <span><i className="fa fa-angle-down" aria-hidden="true"></i></span> </div>
                <div className="col-xs-4 page-wrapper">
                    <label className="control-label" htmlFor="input-limit">Số sản phẩm trên 1 trang:</label>
                    <div className="limit">
                        <select id="input-limit" className="form-control" onChange={this.onLimitChage}>
                            <option value="12" defaultValue>12</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <span><i className="fa fa-angle-down" aria-hidden="true"></i></span> </div>
                <div className="col-xs-2 text-right list-grid-wrapper">
                    <div className="btn-group btn-list-grid">
                        <button type="button" id="list-view" onClick={this.props.handleListViewButtonClick} className="btn btn-default list-view"></button>
                        <button type="button" id="grid-view" onClick={this.props.handleGridViewButtonClick} className="btn btn-default grid-view active"></button>
                    </div>
                </div>
            </div>
        );
    }
}

export default withRouter(ProductFilter)
