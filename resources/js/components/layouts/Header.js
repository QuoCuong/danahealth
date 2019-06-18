import React, { Component } from 'react'
import { connect } from 'react-redux'
import { withRouter } from 'react-router'
import { Link } from 'react-router-dom'
import { logout } from '../../actions/userActions'

import Navigation from './Navigation'

class Header extends Component {
    handleLogout(e) {
        e.preventDefault()
        this.props.dispatch(logout())
        this.props.history.push('/')
    }

    render() {
        let headerTop = []
        if (this.props.isLoggedIn) {
            headerTop.push(
                <div key={0} className="col-sm-12">
                    <ul className="header-top-right text-right">
                        <div className="dropdown" style={{fontSize: '1.5rem'}}>
                            <a className="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Xin chào, <b>{`${this.props.user.last_name || ''} ${this.props.user.first_name}!`}</b>
                                <span className="caret"></span>
                            </a>
                            <ul className="dropdown-menu" aria-labelledby="dropdownMenu1" style={{left: 'unset', right: 0, padding: '5px 0', backgroundColor: '#ffffff', border: '1px silver solid'}}>
                                <li><a style={{display: 'flex', alignItems: 'center'}} onClick={this.handleLogout.bind(this)} href="#"><ion-icon name="log-out"></ion-icon>&nbsp;Đăng xuất</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            )
        } else {
            headerTop.push(
                <div key={0} className="col-sm-12">
                    <ul className="header-top-right text-right">
                        <li className="account"><Link to="/login">Đăng nhập</Link></li>
                        <li className="sitemap"><Link to="/register">Tạo tài khoản</Link></li>
                    </ul>
                </div>
            )
        }
        return (
            <div>
                <header id="header">
                    <div className="header-top">
                        <div className="container">
                            <div className="row">
                                {headerTop}
                            </div>
                        </div>
                    </div>
                    <div className="header">
                        <div className="container">
                            <nav className="navbar">
                                <div className="navbar-header mtb_20"><Link className="navbar-brand" to="/"><img alt="DanaHealth" src="/images/logo.png" /></Link></div>
                                <div className="pull-right" style={{margin: '46px 0', paddingRight: 15}}>
                                    <Link className="btn" to={{
                                        pathname: '/order-prescription'
                                    }}>Tạo đơn thuốc</Link>
                                </div>
                                <div className="header-right pull-right mtb_50">
                                    <button className="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span className="i-bar"><i className="fa fa-bars"></i></span></button>
                                    <div className="main-search pull-right">
                                        <div className="search-overlay">
                                            <a href="javascript:void(0)" className="search-overlay-close"></a>
                                            <div className="container">
                                                <form role="search" id="searchform" action="/search" method="get">
                                                    <label className="h5 normal search-input-label">Enter keywords To Search Entire Store</label>
                                                    <input defaultValue="" name="q" placeholder="Search here..." type="search" />
                                                    <button type="submit"></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div className="header-search"> <a id="search-overlay-btn"></a> </div>
                                    </div>
                                </div>
                                <Navigation />
                            </nav>
                        </div>
                    </div>
                    <div className="header-bottom">
                        <div className="container">
                            <div className="row">
                                <div className="col-sm-4 col-md-4 col-lg-3">
                                    <div className="category">
                                        <div className="menu-bar" data-target="#category-menu,#category-menu-responsive" data-toggle="collapse" aria-expanded="true" role="button">
                                            <h4 className="category_text">Danh mục</h4>
                                            <span className="i-bar"><i className="fa fa-bars"></i></span>
                                        </div>
                                    </div>
                                    <div id="category-menu-responsive" className="navbar collapse " aria-expanded="true" style={{}} role="button">
                                        <div className="nav-responsive">
                                            <ul className="nav main-navigation collapse in">
                                                {
                                                    this.props.medicineGroups.map((medicineGroup, i) => {
                                                        if (medicineGroup.children.length) {
                                                            return (
                                                                <li key={i} className="dropdown">
                                                                    <a href="#">{medicineGroup.name}</a>
                                                                    <ul className="dropdown-menu">
                                                                        {
                                                                            medicineGroup.children.map((child, i) => {
                                                                                return (
                                                                                    <li key={i}><Link to={{
                                                                                        pathname: `/medicine-groups/${child.slug}/medicines`,
                                                                                        search: '?sortBy=price&type=asc&limit=12&page=1'
                                                                                    }}>{child.name}</Link></li>
                                                                                )
                                                                            })
                                                                        }
                                                                    </ul>
                                                                </li>
                                                            )
                                                        } else {
                                                            return (
                                                                <li key={i}><Link to={{
                                                                    pathname: `/medicine-groups/${medicineGroup.slug}/medicines`,
                                                                    search: '?sortBy=price&type=asc&limit=12&page=1'
                                                                }}>{medicineGroup.name}</Link></li>
                                                            )
                                                        }
                                                    })
                                                }
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-sm-8 col-md-8 col-lg-9">
                                    <div className="header-bottom-right offers">
                                        <div className="marquee">
                                            {/* <span><i className="fa fa-circle" aria-hidden="true"></i>It's Sexual Health Week!</span> */}
                                            <span><i className="fa fa-circle" aria-hidden="true"></i>5 lời khuyên của chúng tôi cho SỨC KHỎE MÙA HÈ</span>
                                            {/* <span><i className="fa fa-circle" aria-hidden="true"></i>Sugar health at risk?</span> */}
                                            {/* <span><i className="fa fa-circle" aria-hidden="true"></i>The Olay Ranges - What do they do?</span> */}
                                            <span><i className="fa fa-circle" aria-hidden="true"></i>Mỡ cơ thể - nó là gì và tại sao chúng ta cần nó?</span>
                                            <span><i className="fa fa-circle" aria-hidden="true"></i>Một viên thuốc có thể giúp bạn giảm cân?</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        );
    }
}

Header.defaultProps = {
    isLoggedIn: false,
    user: {}
}

const maptStateToProps = state => ({
    isLoggedIn: state.user.isLoggedIn,
    user: state.user.user
})

export default withRouter(connect(maptStateToProps)(Header))
