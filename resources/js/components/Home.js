import React, { Component } from 'react'
import axios from 'axios'
import { Link } from 'react-router-dom'
import OwlCarousel from 'react-owl-carousel'

const numberFormat = (value) => new Intl.NumberFormat('vi-IN', {
    style: 'currency',
    currency: 'VND'
}).format(value);

class Home extends Component {
    constructor(props) {
        super(props)
        this.state = {
            medicines: []
        }
    }
    componentDidMount() {
        axios.get('/api/medicines')
            .then(res => {
                this.setState({
                    medicines: res.data
                })
            })
            .catch(error => {
                console.log(error)
            })
    }

    componentDidUpdate(prevProps, prevState) {
        this.initProductGrid()
    }

    initProductGrid() {
        $('.nArrivals').owlCarousel({
            autoplay: false,
            responsiveClass: true,
            items: 4, //10 items above 1000px browser width
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                400: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true
                },
                1200: {
                    items: 4,
                    nav: true,
                }
            }
        });
    }

    render() {
        const medicines = this.state.medicines
        let items = []
        for (let index = 0; index < medicines.length / 2; index++) {
            const chunk = [
                medicines[((index + 1) * 2 - 1) - 1],
                medicines[((index + 1) * 2 - 1)],
            ]
            items.push(
                <div key={index} className="product-grid">
                    <div className="item">
                        <div className="product-thumb">
                            <div className="image product-imageblock">
                                <Link to={`/medicines/${chunk[0].id}`}>
                                    <img data-name="product_image" src={`/${chunk[0].images[0].path}`} alt={chunk[0].name} title={chunk[0].name} className="img-responsive" />
                                    <img src={`/${chunk[0].images[1].path}`} alt={chunk[0].name} title={chunk[0].name} className="img-responsive" />
                                </Link>
                            </div>
                            <div className="caption product-detail text-left">
                                <h6 data-name="product_name" className="product-name mt_20"><Link to={`/medicines/${chunk[0].id}`} title={chunk[0].name}>{chunk[0].name}</Link></h6>
                                <span className="price"><span className="amount"><span className="currencySymbol"></span>{numberFormat(chunk[0].price)}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div className="item">
                        <div className="product-thumb">
                            <div className="image product-imageblock">
                                <Link to={`/medicines/${chunk[1].id}`}>
                                    <img data-name="product_image" src={`/${chunk[1].images[0].path}`} alt={chunk[1].name} title={chunk[1].name} className="img-responsive" />
                                    <img src={`/${chunk[1].images[1].path}`} alt={chunk[1].name} title={chunk[1].name} className="img-responsive" />
                                </Link>
                            </div>
                            <div className="caption product-detail text-left">
                                <h6 data-name="product_name" className="product-name mt_20"><Link to={`/medicines/${chunk[1].id}`} title={chunk[1].name}>{chunk[1].name}</Link></h6>
                                <span className="price"><span className="amount"><span className="currencySymbol"></span>{numberFormat(chunk[1].price)}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            )
        }
        return (
            <div id="column-right" className="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div className="banner">
                    <OwlCarousel
                        className="main-banner"
                        items={1}
                        autoplay={true}
                    >
                        <div className="item"><a href="#"><img src="/images/main_banner1.jpg" alt="Main Banner" className="img-responsive" /></a></div>
                        <div className="item"><a href="#"><img src="/images/main_banner1.jpg" alt="Main Banner" className="img-responsive" /></a></div>
                    </OwlCarousel>
                </div>
                <div className="row">
                    <div className="cms_banner mt_10">
                        <div className="col-xs-6 col-sm-12 col-md-6 mt_20">
                            <div id="subbanner1" className="sub-hover"> <Link to='/order-prescription'><img src="/images/sub1.jpg" alt="Sub Banner1" className="img-responsive" /></Link>
                                <div className="bannertext">
                                    <h2>Dễ dàng mua thuốc theo toa</h2>
                                    <p className="mt_10">Tạo đơn thuốc ngay</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-xs-6 col-sm-12 col-md-6 mt_20">
                            <div id="subbanner2" className="sub-hover"> <a href="#"><img src="/images/sub2.jpg" alt="Sub Banner2" className="img-responsive" /></a>
                                <div className="bannertext">
                                    <h2>Dược sĩ tư vấn miễn phí</h2>
                                    <p className="mt_10"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="product-tab" className="mt_40">
                    <div className="heading-part mb_20 ">
                        <h2 className="main_title">Sản phẩm nổi bật</h2>
                    </div>
                    <div className="tab-content clearfix box">
                        <div className="tab-pane active" id="nArrivals">
                            <div className="nArrivals owl-carousel">
                                {items}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Home
