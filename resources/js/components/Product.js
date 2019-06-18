import React, { Component } from 'react'
import { Link } from 'react-router-dom'

const numberFormat = (value) => new Intl.NumberFormat('vi-IN', {
    style: 'currency',
    currency: 'VND'
}).format(value);

class Product extends Component {
    constructor(props) {
        super(props)
    }

    render() {
        return (
            <div className={this.props.isList ? `product-layout product-list col-xs-12` : `product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12 `}>
                <div className="item">
                    <div className="product-thumb clearfix mb_30">
                        <div className="image product-imageblock">
                            <Link to={`/medicines/${this.props.medicine.id}`}>
                                <img data-name="product_image" src={`/${this.props.medicine.images[0].path}`} alt={this.props.medicine.name} title={this.props.medicine.name} className="img-responsive" />
                                <img src={`/${this.props.medicine.images.length > 1 ? this.props.medicine.images[1].path : this.props.medicine.images[0].path}`} alt={this.props.medicine.name} title={this.props.medicine.name} className="img-responsive" />
                            </Link>
                        </div>
                        <div className="caption product-detail text-left">
                            <h6 data-name="product_name" className="product-name mt_20">
                                <Link to={`/medicines/${this.props.medicine.id}`} title={this.props.medicine.name}>{this.props.medicine.name}</Link>
                            </h6>
                            <span className="price"><span className="amount">{numberFormat(this.props.medicine.price)}</span>
                            </span>
                            <p className="product-desc mt_20 mb_60">{this.props.medicine.description}</p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

Product.defaultProps = {
    isList: false
}

export default Product
