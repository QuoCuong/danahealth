<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->only('phone', 'first_name', 'last_name', 'email', 'password', 'password_confirmation'), [
            'phone'      => 'required|string|regex:/(0)[0-9]{9}/|unique:users,phone',
            'first_name' => 'required|string',
            'email'      => 'email|nullable',
            'password'   => 'required|string|min:6|max:100|confirmed'
        ], [
            'phone.required'      => 'Vui lòng nhập số điện thoại',
            'phone.regex'         => 'Số điện thoại phải có 10 chữ số',
            'phone.unique'        => 'Số điện thoại đã tồn tại',
            'first_name.required' => 'Vui lòng nhập tên',
            'last_name.required'  => 'Vui lòng nhập họ',
            'email.email'         => 'Địa chỉ email không hợp lệ',
            'password.required'   => 'Vui lòng nhập mật khẩu',
            'password.min'        => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max'        => 'Mật khẩu chỉ tối đa 100 ký tự',
            'password.confirmed'  => 'Mật khẩu không khớp'
        ]
        );

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $data = $request->only('phone', 'first_name', 'last_name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        return response()->json($user, Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');
        $validator = Validator::make($credentials, [
            'phone'    => 'required|string|regex:/(0)[0-9]{9}/',
            'password' => 'required|string|min:6|max:100',
        ], [
            'phone.required'      => 'Vui lòng nhập số điện thoại',
            'phone.regex'         => 'Số điện thoại phải có 10 chữ số',
            'password.required'   => 'Vui lòng nhập mật khẩu',
            'password.min'        => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max'        => 'Mật khẩu chỉ tối đa 100 ký tự',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }

        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json([
                'errors' => [
                    'phone' => [trans('auth.failed')],
                ],
            ], Response::HTTP_BAD_REQUEST);
        }
        $user = Auth::user();

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], Response::HTTP_OK);
    }

    public function user(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            return response($user, Response::HTTP_OK);
        }

        return response(null, Response::HTTP_BAD_REQUEST);
    }

    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json('You have successfully logged out.', Response::HTTP_OK);
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.', Response::HTTP_BAD_REQUEST);
        }
    }

    public function refresh()
    {
        return response(JWTAuth::getToken(), Response::HTTP_OK);
    }
}
