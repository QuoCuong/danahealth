import React, { Component } from 'react'
import { connect } from 'react-redux'
import { withRouter } from 'react-router'
import axios from 'axios';

class Prescription extends Component {
    constructor(props) {
        super(props)
        this.state = {
            activeStep: 1,
            cities: [],
            districts: [],
            imagePreviewUrl1: '',
            imagePreviewUrl2: '',
            imagePreviewUrl3: '',
            isOrderSuccess: false,
            data: {
                image1: {},
                image2: {},
                image3: {},
                address: '',
                district: '',
                district_id: '',
                city: '',
                fullname: '',
                email: '',
                phone: ''
            }
        }
    }

    componentDidMount() {
        axios.get('/api/cities')
            .then(res => {
                this.setState({
                    cities: res.data
                }, (firstCity = res.data[0]) => {
                    axios.get(`/api/cities/${firstCity.id}/districts`)
                        .then(res => {
                            this.setState({
                                districts: res.data,
                                data: {
                                    ...this.state.data,
                                    city: firstCity.name
                                }
                            })
                        })
                        .catch(error => {
                            console.log(error.response)
                        })
                })
            })
            .catch(error => {
                console.log(error.response)
            })
    }

    componentWillUpdate(nextProps, nextState) {
        this.updateSteps(nextState.activeStep)
        this.validateStep(nextState)
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        if (prevProps.isLoggedIn && !prevState.data.fullname) {
            this.setState({
                data: {
                    ...this.state.data,
                    fullname: `${prevProps.user.last_name ? prevProps.user.last_name + ' ' : ''}${prevProps.user.first_name}`,
                    email: prevProps.user.email,
                    phone: prevProps.user.phone
                }
            })
        }
    }

    updateSteps(activeStep) {
        if (activeStep >= 1 && activeStep <= 4) {
            if (activeStep === 1) {
                $('.prescription-prev').addClass('disabled')
            } else {
                $('.prescription-prev').removeClass('disabled')
            }
            $('.tab-pane').removeClass('active')
            $(`#order-prescription-step${activeStep}`).addClass('active')
        }
        if (activeStep === 4) {
            $('.prescription-next').hide()
            $('.prescription-finish').show()
        } else {
            $('.prescription-next').show()
            $('.prescription-finish').hide()
        }
    }

    validateStep(nextState) {
        const activeStep = nextState.activeStep
        $('.prescription-next').addClass('disabled')
        switch (activeStep) {
            case 1:
                if (!$.isEmptyObject(nextState.data.image1) || !$.isEmptyObject(nextState.data.image2) || !$.isEmptyObject(nextState.data.image1)) {
                    $('.prescription-next').removeClass('disabled')
                }
                break;
            case 2:
                if (!this.props.isLoggedIn) {
                    this.props.history.push('/login')
                } else {
                    if (nextState.data.address && nextState.data.district_id && nextState.data.city) {
                        $('.prescription-next').removeClass('disabled')
                    }
                }
                break;
            case 3:
                if (nextState.data.fullname && nextState.data.phone) {
                    $('.prescription-next').removeClass('disabled')
                }
                break;
            case 4:

                break;
            default:
                break;
        }
    }

    handleNextClick(e) {
        if ($(e.target).hasClass('disabled')) {
            return
        }
        const activeStep = this.state.activeStep
        if (activeStep < 4) {
            $('.multi-steps > li.is-active').removeClass('is-active').next().addClass('is-active')
            this.setState({
                activeStep: activeStep + 1
            })
        }
    }

    handlePrevClick(e) {
        e.preventDefault()
        if (this.state.activeStep > 1) {
            $('.multi-steps > li.is-active').removeClass('is-active').prev().addClass('is-active')
            this.setState({
                activeStep: this.state.activeStep - 1
            })
        }
    }

    handleImageChange(e) {
        e.preventDefault()

        const id = e.target.id[e.target.id.length - 1]
        let reader = new FileReader();
        let file = e.target.files[0];

        switch (id) {
            case '0':
                reader.onloadend = () => {
                    this.setState({
                        data: {
                            ...this.state.data,
                            image1: file
                        },
                        imagePreviewUrl1: reader.result
                    });
                }
                break
            case '1':
                reader.onloadend = () => {
                    this.setState({
                        data: {
                            ...this.state.data,
                            image2: file
                        },
                        imagePreviewUrl2: reader.result
                    });
                }
                break
            case '2':
                reader.onloadend = () => {
                    this.setState({
                        data: {
                            ...this.state.data,
                            image3: file
                        },
                        imagePreviewUrl3: reader.result
                    });
                }
                break
            default:
                break;
        }

        reader.readAsDataURL(file)
    }

    handleCloseClick(e) {
        const id = e.target.id
        switch (id) {
            case '0':
                return this.setState({
                    data: {
                        ...this.state.data,
                        image1: {}
                    },
                    imagePreviewUrl1: ''
                })
            case '1':
                return this.setState({
                    data: {
                        ...this.state.data,
                        image2: {}
                    },
                    imagePreviewUrl2: ''
                })
            case '2':
                return this.setState({
                    data: {
                        ...this.state.data,
                        image3: {}
                    },
                    imagePreviewUrl3: ''
                })
            default:
                break;
        }
    }

    handleAddressChange(e) {
        this.setState({
            data: {
                ...this.state.data,
                address: e.target.value
            }
        })
    }

    handleDistrictChange(e) {
        const id = e.target.value
        const name = e.target.options[e.target.selectedIndex].text
        this.setState({
            data: {
                ...this.state.data,
                district: name,
                district_id: id
            }
        })
    }

    handleFullnameChange(e) {
        this.setState({
            data: {
                ...this.state.data,
                fullname: e.target.value
            }
        })
    }

    handleEmailChange(e) {
        this.setState({
            data: {
                ...this.state.data,
                email: e.target.value
            }
        })
    }

    handlePhoneChange(e) {
        this.setState({
            data: {
                ...this.state.data,
                phone: e.target.value
            }
        })
    }

    handleFormSubmit(e) {
        e.preventDefault()
        $('.prescription-finish').prop('disabled', true)
        const formData = new FormData()
        const config = {
            headers: {
                'Authorization': 'Bearer ' + window.sessionStorage.getItem('accessToken'),
                'Content-type': 'multipart/form-data'
            }
        }

        formData.append('phone', this.state.data.phone)
        formData.append('email', this.state.data.email ? this.state.data.email : '')
        formData.append('fullname', this.state.data.fullname)
        formData.append('address', this.state.data.address)
        formData.append('district_id', this.state.data.district_id)
        if (!$.isEmptyObject(this.state.data.image1))
            formData.append('images[0]', this.state.data.image1)
        if (!$.isEmptyObject(this.state.data.image2))
            formData.append('images[1]', this.state.data.image2)
        if (!$.isEmptyObject(this.state.data.image3))
            formData.append('images[2]', this.state.data.image3)

        axios.post(`/api${this.props.match.url}`, formData, config)
            .then(res => {
                this.setState({
                    isOrderSuccess: true
                })
            })
            .catch(error => {
                console.log(error)
            })
    }

    render() {
        if (this.state.isOrderSuccess) {
            return (
                <div className="col-sm-8 col-md-8 col-lg-9 mtb_30">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="panel-login">
                                <div className="panel-heading">
                                    <div className="row mb_20">
                                        <div className="col-xs-12 text-center">
                                            <h3 style={{ fontWeight: 'bold' }}>Đặt đơn thuốc thành công</h3>
                                        </div>
                                    </div>
                                </div>
                                <div className="panel-body">
                                    <div className="row">
                                        <div className="col-xs-12 text-center">
                                            <p><i>Chúng tôi sẽ gọi điện thoại cho bạn để xác nhận đơn thuốc sớm nhất có thể. Xin cảm ơn!</i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )
        }

        const chooseimage = (id) => {
            return (
                <div className="preview-photo">
                    <div className="medicine-cover">
                        <div><ion-icon name="camera"></ion-icon></div>
                        <p>
                            <i>Hình đơn thuốc {id + 1}</i>
                        </p>
                        <label htmlFor={`imgInp${id}`}>Chọn ảnh</label>
                        <input type="file" accept="image/*" id={`imgInp${id}`} onChange={this.handleImageChange.bind(this)} />
                    </div>
                </div>
            )
        }
        const previewImage = (id) => {
            switch (id) {
                case 0:
                    return (
                        <div className="preview-photo">
                            <img src={this.state.imagePreviewUrl1} alt="" />
                            <ion-icon id={id} onClick={this.handleCloseClick.bind(this)} name="close"></ion-icon>
                        </div>
                    )
                case 1:
                    return (
                        <div className="preview-photo">
                            <img src={this.state.imagePreviewUrl2} alt="" />
                            <ion-icon id={id} onClick={this.handleCloseClick.bind(this)} name="close"></ion-icon>
                        </div>
                    )
                case 2:
                    return (
                        <div className="preview-photo">
                            <img src={this.state.imagePreviewUrl3} alt="" />
                            <ion-icon id={id} onClick={this.handleCloseClick.bind(this)} name="close"></ion-icon>
                        </div>
                    )
                default:
                    break;
            }
        }
        const images = () => {
            let items = []
            if (this.state.imagePreviewUrl1)
                items.push(
                    <div key={0} className="col-xs-12 col-md-4 preview-photo-sm">
                        <img src={this.state.imagePreviewUrl1} alt="" />
                    </div>
                )
            if (this.state.imagePreviewUrl2)
                items.push(
                    <div key={1} className="col-xs-12 col-md-4 preview-photo-sm">
                        <img src={this.state.imagePreviewUrl2} alt="" />
                    </div>
                )
            if (this.state.imagePreviewUrl3)
                items.push(
                    <div key={2} className="col-xs-12 col-md-4 preview-photo-sm">
                        <img src={this.state.imagePreviewUrl3} alt="" />
                    </div>
                )
            return items
        }

        return (
            <div className="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div className="row">
                    <div className="col-md-12">
                        <div className="panel-login">
                            <div className="panel-heading">
                                <div className="row mb_20">
                                    <div className="col-xs-12 text-center">
                                        <h3 style={{ fontWeight: 'bold' }}>Tạo Đơn Thuốc</h3>
                                    </div>
                                </div>
                            </div>
                            <div className="panel-body">
                                <div className="row">
                                    <div className="col-xs-12">
                                        <div className="container-fluid">
                                            <ul className="list-unstyled multi-steps">
                                                <li className="is-active">Hình đơn thuốc</li>
                                                <li>Địa chỉ giao hàng</li>
                                                <li>Thông tin khách hàng</li>
                                                <li>Xem đơn hàng</li>
                                            </ul>
                                        </div>
                                        <form className="form-horizontal" onSubmit={this.handleFormSubmit.bind(this)} action="#" method="post">
                                            <div className="card-block tab-content" id="order-prescription">
                                                <div className="tab-pane m-t-md m-b-lg mt_50 active" id="order-prescription-step1">
                                                    <div className="col-xs-12 col-md-4">
                                                        {this.state.imagePreviewUrl1.length ? previewImage(0) : chooseimage(0)}
                                                    </div>
                                                    <div className="col-xs-12 col-md-4">
                                                        {this.state.imagePreviewUrl2.length ? previewImage(1) : chooseimage(1)}
                                                    </div>
                                                    <div className="col-xs-12 col-md-4">
                                                        {this.state.imagePreviewUrl3.length ? previewImage(2) : chooseimage(2)}
                                                    </div>
                                                </div>
                                                <div className="tab-pane m-t-md m-b-lg mt_50" id="order-prescription-step2">
                                                    <div className="col-xs-12 col-md-6 col-md-offset-3">
                                                        <div className="form-group">
                                                            <input type="text" className="form-control" name="address" placeholder="Địa chỉ" onChange={this.handleAddressChange.bind(this)} />
                                                        </div>
                                                        <div className="form-group">
                                                            <select defaultValue="default" className="form-control district" name="district" onChange={this.handleDistrictChange.bind(this)}>
                                                                <option disabled hidden value="default">Quận</option>
                                                                {
                                                                    this.state.districts.map((district, i) => {
                                                                        return (
                                                                            <option key={i} value={district.id}>{district.name}</option>
                                                                        )
                                                                    })
                                                                }
                                                            </select>
                                                        </div>
                                                        <div className="form-group">
                                                            <select className="form-control" name="city">
                                                                {
                                                                    this.state.cities.map((city, i) => {
                                                                        return (
                                                                            <option key={i}>Thành Phố {city.name}</option>
                                                                        )
                                                                    })
                                                                }
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="tab-pane m-t-md m-b-lg mt_50" id="order-prescription-step3">
                                                    <div className="col-xs-12 col-md-6 col-md-offset-3">
                                                        <div className="form-group">
                                                            <input type="text" className="form-control" value={this.state.data.fullname ? this.state.data.fullname : ''} name="fullname" placeholder="Họ và tên" onChange={this.handleFullnameChange.bind(this)} />
                                                        </div>
                                                        <div className="form-group">
                                                            <input type="text" className="form-control" value={this.state.data.email ? this.state.data.email : ''} name="email" placeholder="Email (tùy chọn)" onChange={this.handleEmailChange.bind(this)} />
                                                        </div><div className="form-group">
                                                            <input type="text" className="form-control" value={this.state.data.phone ? this.state.data.phone : ''} name="phone" placeholder="Số điện thoại" onChange={this.handlePhoneChange.bind(this)} />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="tab-pane m-t-md m-b-lg mt_50" id="order-prescription-step4">
                                                    <div className="col-xs-12 col-md-8 col-md-offset-2">
                                                        <div className="row">
                                                            <div className="col-xs-12">
                                                                <h6>Hình đơn thuốc</h6>
                                                            </div>
                                                            {images()}
                                                        </div>
                                                        <div className="row">
                                                            <div className="col-xs-12 col-md-6 mt_20">
                                                                <h6>Địa chỉ giao hàng</h6>
                                                                <p>{this.state.data.address}</p>
                                                                <p>{this.state.data.district}</p>
                                                                <p>Thành phố {this.state.data.city}</p>
                                                            </div>
                                                            <div className="col-xs-12 col-md-6 mt_20">
                                                                <h6>Thông tin khách hàng</h6>
                                                                <p>{this.state.data.fullname}</p>
                                                                <p>{this.state.data.email}</p>
                                                                <p>{this.state.data.phone}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="card-block b-t">
                                                <div className="row">
                                                    <div className="col-xs-12 text-right mt_50">
                                                        <button className="prescription-prev btn btn-default btn-prescription disabled" onClick={this.handlePrevClick.bind(this)}>Quay lại</button>
                                                        <button className="prescription-next btn btn-default btn-prescription" onClick={this.handleNextClick.bind(this)}>Tiếp tục</button>
                                                        <button className="prescription-finish btn btn-app btn-prescription" type="submit" style={{ display: 'none' }}><i className="ion-checkmark m-r-xs"></i> Đặt đơn thuốc</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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

Prescription.defaultProps = {
    isLoggedIn: false,
    user: {}
}

const mapStateToProps = state => ({
    isLoggedIn: state.user.isLoggedIn,
    user: state.user.user
})

export default withRouter(connect(mapStateToProps)(Prescription))
