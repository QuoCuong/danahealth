import React, { Component } from 'react';
import { Link } from 'react-router-dom'

class Footer extends Component {
    render() {
        return (
            <div>
                <div className="footer pt_60">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-3 footer-block">
                                <div className="content_footercms_right">
                                    <div className="footer-contact">
                                        <div className="footer-logo mb_40">
                                            <Link to='/'> <img src="/images/logo.png" alt="DanaHealth"/></Link>
                                        </div>
                                        <ul>
                                            <li>B-14 Collins Street West Victoria 2386</li>
                                            <li>(+123) 456 789 - (+024) 666 888</li>
                                            <li>Contact@yourcompany.com</li>
                                        </ul>
                                        <div className="social_icon">
                                            <ul>
                                                <li><a href="#"><i className="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i className="fa fa-google"></i></a></li>
                                                <li><a href="#"><i className="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i className="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i className="fa fa-rss"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-2 footer-block">
                                <h6 className="footer-title ptb_20">Categories</h6>
                                <ul>
                                    <li><a href="#">Medicines</a></li>
                                    <li><a href="#">DanaHealth</a></li>
                                    <li><a href="#">Mother & Baby</a></li>
                                    <li><a href="#">Vitamins</a></li>
                                    <li><a href="#">Toiletries</a></li>
                                    <li><a href="#">Skincare</a></li>
                                </ul>
                            </div>
                            <div className="col-md-2 footer-block">
                                <h6 className="footer-title ptb_20">Information</h6>
                                <ul>
                                    <li><a href="contact.html">Specials</a></li>
                                    <li><a href="#">New Products</a></li>
                                    <li><a href="#">Best Sellers</a></li>
                                    <li><a href="#">Our Stores</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">About Us</a></li>
                                </ul>
                            </div>
                            <div className="col-md-2 footer-block">
                                <h6 className="footer-title ptb_20">My Account</h6>
                                <ul>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">My Orders</a></li>
                                    <li><a href="#">My Credit Slips</a></li>
                                    <li><a href="#">My Addresses</a></li>
                                    <li><a href="#">My Personal Info</a></li>
                                </ul>
                            </div>
                            <div className="col-md-3">
                                <h6 className="ptb_20">SIGN UP OUR NEWSLETTER</h6>
                                <p className="mt_10 mb_20">For get offers from our favorite brands & get 20% off for next </p>
                                <div className="form-group">
                                    <input className="mb_20" type="text" placeholder="Enter Your Email Address"/>
                                    <button className="btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="footer-bottom mt_60 ptb_10">
                        <div className="container">
                            <div className="row">
                                <div className="col-sm-6">
                                    <div className="copyright-part">@ 2017 All Rights Reserved DanaHealth</div>
                                </div>
                                <div className="col-sm-6">
                                    <div className="payment-icon text-right">
                                        <ul>
                                            <li><i className="fa fa-cc-paypal "></i></li>
                                            <li><i className="fa fa-cc-stripe"></i></li>
                                            <li><i className="fa fa-cc-visa"></i></li>
                                            <li><i className="fa fa-cc-discover"></i></li>
                                            <li><i className="fa fa-cc-mastercard"></i></li>
                                            <li><i className="fa fa-cc-amex"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Footer;
