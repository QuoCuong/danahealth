import React, { Component } from 'react';
import axios from 'axios'

import Breadcrumb from './Breadcrumb';
import ProductFilter from './ProductFilter';
import ListProducts from './ListProducts';
import Pagination from './Pagination'

class CategoryProduct extends Component {
    constructor(props) {
        super(props)
        this.state = {
            isList: false,
            medicineGroup: [],
            medicines: []
        }
        this.handleListViewButtonClick = this.handleListViewButtonClick.bind(this)
        this.handleGridViewButtonClick = this.handleGridViewButtonClick.bind(this)
    }

    componentDidMount() {
        this.initListGridEvent()
        if (this.props.location.search === '') {
            this.props.history.push({
                pathname: this.props.match.url,
                search: '?sortBy=price&type=asc&limit=12&page=1'
            })
        } else {
            this.getData(this.props)
        }
    }

    componentWillReceiveProps(newProps) {
        if (this.props.location.search === '') {
            this.props.history.push({
                pathname: this.props.match.url,
                search: '?sortBy=price&type=asc&limit=12&page=1'
            })
        }
        this.getData(newProps)
    }

    getData(props) {
        let url = props.match.url
        let search = props.location.search
        let uri = '/api' + url + search

        axios.get(uri)
            .then(response => {
                this.setState({
                    medicineGroup: response.data.medicineGroup,
                    medicines: response.data.medicines
                })
            })
            .catch(error => {
                console.log(error)
            })
    }

    initListGridEvent() {
        $('.btn-list-grid button').on('click', function () {
            if ($(this).hasClass('grid-view')) {
                $('.btn-list-grid button').addClass('active');
                $('.btn-list-grid button.list-view').removeClass('active');
            }
            else if ($(this).hasClass('list-view')) {
                $('.btn-list-grid button').addClass('active');
                $('.btn-list-grid button.grid-view').removeClass('active');
            }
        });
    }

    handleListViewButtonClick() {
        this.setState({
            isList: true
        })
        $('.product-layout > .clearfix').remove();
        $('.product-layout').attr('class', 'product-layout product-list col-xs-12');
        $('#column-left .product-layout').attr('class', 'product-layout mb_20');
        $('#column-right .product-layout').attr('class', 'product-layout mb_20');
    }

    handleGridViewButtonClick() {
        this.setState({
            isList: false
        })
        $('.product-layout').attr('class', 'product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12');
    }

    render() {
        return (
            <div>
                <div className="col-sm-8 col-md-8 col-lg-9 mtb_30">
                    <Breadcrumb title={this.state.medicineGroup.name} medicineGroup={this.state.medicineGroup} />
                    <ProductFilter handleListViewButtonClick={this.handleListViewButtonClick} handleGridViewButtonClick={this.handleGridViewButtonClick} />
                    <ListProducts medicines={this.state.medicines.data} isList={this.state.isList} />
                    <Pagination currentPage={this.state.medicines.current_page} lastPage={this.state.medicines.last_page} />
                </div>
                <div id="brand_carouse" className="ptb_30 text-center">
                    <div className="type-01">
                        <div className="heading-part mb_20 ">
                            <h2 className="main_title">Brand Logo</h2>
                        </div>
                        <div className="row">
                            <div className="col-sm-12">
                                <div className="brand owl-carousel ptb_20 owl-loaded owl-drag">
                                    <div className="owl-stage-outer"><div className="owl-stage" style={{ transform: 'translate3d(-2660px, 0px, 0px)', transition: 'all 0s ease 0s', width: 3990 }}><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand4.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand5.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand6.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand7.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand8.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand9.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand1.png" alt="Disney" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand2.png" alt="Dell" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand3.png" alt="Harley" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand4.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand5.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand6.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand7.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand8.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item active" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand9.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned active" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand1.png" alt="Disney" className="img-responsive" /></a> </div></div><div className="owl-item cloned active" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand2.png" alt="Dell" className="img-responsive" /></a> </div></div><div className="owl-item cloned active" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand3.png" alt="Harley" className="img-responsive" /></a> </div></div><div className="owl-item cloned active" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand4.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned active" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand5.png" alt="Canon" className="img-responsive" /></a> </div></div><div className="owl-item cloned" style={{ width: 190 }}><div className="item text-center"> <a href="#"><img src="/images/brand/brand6.png" alt="Canon" className="img-responsive" /></a> </div></div></div></div><div className="owl-nav"><div className="owl-prev">prev</div><div className="owl-next">next</div></div><div className="owl-dots"><div className="owl-dot"><span></span></div><div className="owl-dot active"><span></span></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default CategoryProduct;
