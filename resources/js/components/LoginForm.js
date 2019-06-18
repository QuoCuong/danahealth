import React, { Component } from 'react'
import { connect } from 'react-redux'
import { withRouter } from 'react-router'
import { login } from '../actions/userActions'

class LoginForm extends Component {
    constructor(props) {
        super(props)
        this.state = {
            phone: '',
            password: ''
        }
    }

    componentDidMount() {
        $('.form-group.phone input').focus()
    }


    componentWillReceiveProps(nextProps) {
        if (nextProps.isLoggedIn) {
            this.props.history.push('/')
        }
        let errors = nextProps.errors
        $('#login-form .form-group').removeClass('has-error')
        if (errors.hasOwnProperty('phone')) {
            $('#login-form .form-group.phone').addClass('has-error')
            $('#login-form .form-group.phone > span').html(errors.phone[0])
        }
        if (errors.hasOwnProperty('password')) {
            $('#login-form .form-group.password').addClass('has-error')
            $('#login-form .form-group.password > span').html(errors.password[0])
        }
    }

    handleSubmit(event) {
        event.preventDefault()
        let data = {
            phone: this.state.phone,
            password: this.state.password
        }

        this.props.dispatch(login(data))
    }

    onPhoneChange(event) {
        $('#login-form > .phone').removeClass('has-error')
        $('#login-form > .phone > span').html('')
        this.setState({ phone: event.target.value })
    }

    onPasswordChange(event) {
        $('#login-form > .password').removeClass('has-error')
        $('#login-form > .password > span').html('')
        this.setState({ password: event.target.value })
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
                                        <h3 style={{fontWeight: 'bold'}}>Đăng nhập</h3>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div className="panel-body">
                                <div className="row">
                                    <div className="col-lg-12">
                                        <form id="login-form" action="#" method="post" autoComplete='off'>
                                            <div className="form-group phone">
                                                <input type="text" className="form-control" onChange={this.onPhoneChange.bind(this)} placeholder="Số điện thoại" />
                                                <span style={{fontSize: 13, color: 'red'}}></span>
                                            </div>
                                            <div className="form-group password">
                                                <input type="password" className="form-control" onChange={this.onPasswordChange.bind(this)} placeholder="Mật khẩu" />
                                                <span style={{fontSize: 13, color: 'red'}}></span>
                                            </div>
                                            <div className="form-group">
                                                <div className="row">
                                                    <div className="col-sm-6 col-sm-offset-3">
                                                        <button type="submit" onClick={this.handleSubmit.bind(this)} className="form-control btn btn-login">
                                                            Đăng nhập
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

LoginForm.defaultProps = {
    errors: {},
    isLoggedIn: false
}

const mapStateToProps = state => ({
    errors: state.user.errors,
    isLoggedIn: state.user.isLoggedIn
})

export default withRouter(connect(mapStateToProps)(LoginForm))
