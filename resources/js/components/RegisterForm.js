import React, { Component } from 'react'
import { connect } from 'react-redux'
import { withRouter } from 'react-router'
import { register } from '../actions/userActions'

class RegisterForm extends Component {
    constructor(props) {
        super(props)
        this.state = {
            phone: '',
            firstName: '',
            lastName: '',
            email: '',
            password: '',
            passwordConfirmation: ''
        }
    }

    componentDidMount() {
        $('.form-group.phone input').focus()
    }

    componentWillReceiveProps(nextProps) {
        if (nextProps.isRegistered) {
            this.props.history.push('/login')
        }
        let errors = nextProps.errors
        $('#register-form .form-group').removeClass('has-error')
        if (errors.hasOwnProperty('phone')) {
            $('#register-form .form-group.phone').addClass('has-error')
            $('#register-form .form-group.phone > span').html(errors.phone[0])
        }
        if (errors.hasOwnProperty('last_name')) {
            $('#register-form .form-group.last_name').addClass('has-error')
            $('#register-form .form-group.last_name > span').html(errors.last_name[0])
        }
        if (errors.hasOwnProperty('first_name')) {
            $('#register-form .form-group.first_name').addClass('has-error')
            $('#register-form .form-group.first_name > span').html(errors.first_name[0])
        }
        if (errors.hasOwnProperty('email')) {
            $('#register-form .form-group.email').addClass('has-error')
            $('#register-form .form-group.email > span').html(errors.email[0])
        }
        if (errors.hasOwnProperty('password')) {
            $('#register-form .form-group.password').addClass('has-error')
            $('#register-form .form-group.password > span').html(errors.password[0])
        }
    }

    handleSubmit(event) {
        event.preventDefault()
        let data = {
            phone: this.state.phone,
            first_name: this.state.firstName,
            last_name: this.state.lastName,
            email: this.state.email,
            password: this.state.password,
            password_confirmation: this.state.passwordConfirmation
        }
        this.props.dispatch(register(data))
    }

    onPhoneChange(event) {
        $('#register-form .form-group.phone').removeClass('has-error')
        $('#register-form .form-group.phone > span').html('')
        this.setState({ phone: event.target.value })
    }

    onLastNameChange(event) {
        $('#register-form .form-group.last_name').removeClass('has-error')
        $('#register-form .form-group.last_name > span').html('')
        this.setState({ lastName: event.target.value })
    }

    onFirstNameChange(event) {
        $('#register-form .form-group.first_name').removeClass('has-error')
        $('#register-form .form-group.first_name > span').html('')
        this.setState({ firstName: event.target.value })
    }

    onEmailChange(event) {
        $('#register-form .form-group.email').removeClass('has-error')
        $('#register-form .form-group.email > span').html('')
        this.setState({ email: event.target.value })
    }

    onPasswordChange(event) {
        $('#register-form .form-group.password').removeClass('has-error')
        $('#register-form .form-group.password > span').html('')
        this.setState({ password: event.target.value })
    }

    onPasswordConfirmationChange(event) {
        this.setState({ passwordConfirmation: event.target.value })
    }

    render() {
        return (
            <div className="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <div className="row">
                    <div className="col-md-6 col-md-offset-3">
                        <div className="panel-login">
                            <div className="panel-heading">
                                <div className="row mb_20">
                                    <div className="col-xs-12 text-center">
                                        <h3 style={{fontWeight: 'bold'}}>Tạo tài khoản</h3>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div className="panel-body">
                                <div className="row">
                                    <div className="col-lg-12">
                                        <form id="register-form" action="#" method="post" style={{display: 'block'}}>
                                            <div className="form-group phone">
                                                <input type="text" className="form-control" onChange={this.onPhoneChange.bind(this)} placeholder="Số điện thoại" />
                                                <span style={{fontSize: 13, color: 'red'}}></span>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-6">
                                                    <div className="form-group last_name">
                                                        <input type="text" className="form-control" onChange={this.onLastNameChange.bind(this)} placeholder="Họ (tùy chọn)" />
                                                        <span style={{fontSize: 13, color: 'red'}}></span>
                                                    </div>
                                                </div>
                                                <div className="col-md-6">
                                                    <div className="form-group first_name">
                                                        <input type="text" className="form-control" onChange={this.onFirstNameChange.bind(this)} placeholder="Tên" />
                                                        <span style={{fontSize: 13, color: 'red'}}></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="form-group email">
                                                <input type="email" className="form-control" onChange={this.onEmailChange.bind(this)} placeholder="Địa chỉ email (tùy chọn)" />
                                                <span style={{fontSize: 13, color: 'red'}}></span>
                                            </div>
                                            <div className="form-group password">
                                                <input type="password" className="form-control" onChange={this.onPasswordChange.bind(this)} placeholder="Mật khẩu" />
                                                <span style={{fontSize: 13, color: 'red'}}></span>
                                            </div>
                                            <div className="form-group">
                                                <input type="password" className="form-control" onChange={this.onPasswordConfirmationChange.bind(this)} placeholder="Nhập lại mật khẩu" />
                                            </div>
                                            <div className="form-group">
                                                <div className="row">
                                                    <div className="col-sm-6 col-sm-offset-3">
                                                        <button type="submit" onClick={this.handleSubmit.bind(this)} className="form-control btn btn-login">
                                                            Đăng ký
                                                        </button>
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

RegisterForm.defaultProps = {
    errors: {},
    isRegistered: false
}

const mapStateToProps = state => ({
    errors: state.user.errors,
    isRegistered: state.user.isRegistered
})

export default withRouter(connect(mapStateToProps)(RegisterForm))
