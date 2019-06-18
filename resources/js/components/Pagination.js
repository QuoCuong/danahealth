import React, { Component } from 'react';
import { withRouter } from 'react-router'
import { Link } from 'react-router-dom'
import queryString from 'query-string'

class Pagination extends Component {
    render() {
        const currentPage = this.props.currentPage
        const lastPage = this.props.lastPage
        const parsed = queryString.parse(this.props.location.search)
        var items = [];

        if (lastPage > 1) {
            if (currentPage != 1) {
                items.push(
                    <li key={0}><Link to={{
                        pathname: this.props.match.url,
                        search: queryString.stringify({...parsed, page: currentPage - 1})
                    }}><i className="fa fa-angle-left"></i></Link></li>
                )
            }

            for (let index = 1; index <= lastPage; index++) {
                if (currentPage == index) {
                    items.push(
                        <li key={index} className="active"><a href="#">{index}</a></li>
                    )
                } else {
                    items.push(
                        <li key={index}><Link to={{
                            pathname: this.props.match.url,
                            search: queryString.stringify({...parsed, page: index})
                        }}>{index}</Link></li>
                    )
                }
            }

            if (currentPage != lastPage) {
                items.push(
                    <li key={lastPage + 1}><Link to={{
                        pathname: this.props.match.url,
                        search: queryString.stringify({...parsed, page: currentPage + 1})
                    }}><i className="fa fa-angle-right"></i></Link></li>
                )
            }
        }

        return (
            <div className="pagination-nav text-center mt_50">
                <ul>
                    {items}
                </ul>
            </div>
        );
    }
}

export default withRouter(Pagination);
