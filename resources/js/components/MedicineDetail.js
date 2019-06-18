import React, { Component } from 'react'
import { connect } from 'react-redux'
import { withRouter } from 'react-router'

import Breadcrumb from './Breadcrumb';
import Medicine from './Medicine';
import { fetchMedicine } from '../actions/medicineDetailsActions'

class MedicineDetail extends Component {
    componentDidMount() {
        let url = window.Laravel.baseUrl + '/api' + this.props.match.url
        this.props.dispatch(fetchMedicine(url))
    }

    render() {
        return (
            <div className="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <Breadcrumb title={this.props.medicine.name} medicine={this.props.medicine} />
                <Medicine medicine={this.props.medicine} supplier={this.props.medicine.supplier} images={this.props.medicine.images} />
                <div className="row">
                    <div className="col-md-12">
                        <div id="exTab5" className="mtb_30">
                            <ul className="nav nav-tabs">
                                <li className="active"> <a href="#1c" data-toggle="tab">Thành phần</a> </li>
                                <li><a href="#2c" data-toggle="tab">Hướng dẫn sử dụng</a> </li>
                                <li><a href="#3c" data-toggle="tab">Bảo quản, thận trọng</a> </li>
                            </ul>
                            <div className="tab-content mt_20">
                                <div className="tab-pane active" id="1c">
                                    <div dangerouslySetInnerHTML={{ __html: this.props.medicineDetail.ingredients }} />
                                </div>
                                <div className="tab-pane" id="2c">
                                    <h4 className="mt_20 mb_20">Đối tượng sử dụng</h4>
                                    <div dangerouslySetInnerHTML={{ __html: this.props.medicineDetail.objects_used }} />
                                    <h4 className="mt_20 mb_20">Liều dùng và cách dùng</h4>
                                    <div dangerouslySetInnerHTML={{ __html: this.props.medicineDetail.dosage_and_usage }} />
                                </div>
                                <div className="tab-pane" id="3c">
                                    <h4 className="mt_20 mb_20">Bảo quản</h4>
                                    <div dangerouslySetInnerHTML={{ __html: this.props.medicineDetail.preservation }} />
                                    <h4 className="mt_20 mb_20">Thận trọng</h4>
                                    <div dangerouslySetInnerHTML={{ __html: this.props.medicineDetail.careful }} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

MedicineDetail.defaultProps = {
    medicine: {},
    medicineDetail: {}
}

const mapStateToProps = state => ({
    medicine: state.medicine,
    medicineDetail: state.medicine.medicine_detail
})

export default withRouter(connect(mapStateToProps)(MedicineDetail))
