import React, { Component } from 'react'
import MedicineImage from './MedicineImage'

const numberFormat = (value) => new Intl.NumberFormat('vi-IN', {
    style: 'currency',
    currency: 'VND'
}).format(value);

class Medicine extends Component {
    render() {
        return (
            <div>
                <div className="row mt_10">
                    <MedicineImage images={this.props.images} />
                    <div className="col-md-6 prodetail caption product-thumb">
                        <h4 data-name="product_name" className="product-name">{this.props.medicine.name}</h4>
                        <span className="price mb_20"><span className="amount">{numberFormat(this.props.medicine.price)}</span>
                        </span>
                        <hr />
                        <ul className="list-unstyled product_info mtb_20">
                            <li>
                                <label>Thương hiệu:</label>
                                <span> <a href="#">{this.props.supplier.name}</a></span>
                            </li>
                            <li>
                                <label>Sản xuất tại:</label>
                                <span> <a href="#">{this.props.supplier.country}</a></span>
                            </li>
                        </ul>
                        <hr />
                        <div id="product">
                            <div className="form-group">
                                <div className="row">
                                    <div className="Sort-by col-md-6">
                                        <button className="btn mtb_30" >{this.props.medicine.unit}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p className="product-desc">{this.props.medicine.description}</p>
                    </div>
                </div>
            </div>
        );
    }
}

Medicine.defaultProps = {
    medicine: {},
    supplier: {},
    images: []
}

export default Medicine
