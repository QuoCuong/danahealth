import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class Navigation extends Component {
    render() {
        return (
            <div>
                <div className="collapse navbar-collapse js-navbar-collapse pull-right">
                    <ul id="menu" className="nav navbar-nav">
                        <li><Link to="/">Trang chủ</Link></li>
                        <li><a href="#">Các dịch vụ</a></li>
                        <li><a href="#">Đội ngũ bác sĩ</a></li>
                        <li> <a href="#">Giới thiệu</a></li>
                    </ul>
                </div>
            </div>
        );
    }
}

export default Navigation;
