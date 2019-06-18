import React, { Component } from 'react'

import CategoryMenu from './CategoryMenu'

class Sidebar extends Component {
    render() {
        return (
            <div id="column-left" className="col-sm-4 col-md-4 col-lg-3 ">
                <CategoryMenu />
                <div className="left_banner left-sidebar-widget mt_30 mb_50"> <a href="#"><img src="/images/left1.jpg" alt="Left Banner" className="img-responsive" /></a> </div>
                <div className="left-cms left-sidebar-widget mb_50">
                    <ul>
                        <li>
                            <div className="feature-i-left ptb_40">
                                <div className="icon-right Shipping"></div>
                                <h6>Miễn phí giao hàng</h6>
                            </div>
                        </li>
                        <li>
                            <div className="feature-i-left ptb_40">
                                <div className="icon-right Order"></div>
                                <h6>Đặt đơn thuốc trực tuyến</h6>
                                <p>Giờ : 8:00 - 22:00</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div className="left_banner left-sidebar-widget mb_50"> <a href="#"><img src="/images/left2.jpg" alt="Left Banner" className="img-responsive" /></a> </div>
            </div>
        );
    }
}

export default Sidebar;
