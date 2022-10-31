@extends('emails.layouts.layout')

@section('content')
<tr>
    <td>
        <table  align="left" cellpadding="10" cellspacing="0"  width="100%" style="max-width:600px;border-spacing:0px;border-width:medium;border-style:none; color: #4f4f4f; font-size: 14px;line-height:22px;">
            <tbody>
                <tr>
                    <td style="color: #ea0a6d; font-size: 22px; font-weight: bold;">Welcome to Smart Citizen App.</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h1>Forget Password Email</h1>
                        You can reset password from bellow link:
                        <a href="{{ route('password.reset', $token) }}">Reset Password</a>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding: 10px 10px 0 10px;">The Smart Citizen App Team.</td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection