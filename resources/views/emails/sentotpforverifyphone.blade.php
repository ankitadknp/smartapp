@extends('emails.layouts.layout')

@section('content')
<?php if($language_code == 'ar') {
    $title = "اهلا بك في المقيم الذكي";
    $otpTitle = "رمز التحقق الخاص بك";
    $desc = "ارجو ضعط الارقام اعلاه لتاكيد الايميل الخاص بك ولتفعيل حسابك";
} else if($language_code == 'he') {
    $title = "ברוכים הבאים לתושב חכם";
    $otpTitle = "הקוד שלך";
    $desc = "הקוד נשלח אליך במייל.  בבקשה העתק את הקוד לאמת את זהותך.";
} else {
    $title = "Welcome to Toshav Haham";
    $otpTitle = "Your OTP";
    $desc = "Please enter the above mention OTP to confirm your email address and activate your account.";
}
?>
<tr>
    <td>
        <table  width="100%" border="0" cellspacing="0" cellpadding="0" colls>
            <thead>
                <tr>
                    <th style="padding-top: 15px;padding-bottom: 15px;">
                        <img width="65" src="{{asset("public/assets/images/smart_logo.png")}}">
                    </th>
                </tr>
            </thead>
            <tbody style="border: 2px solid #f8f8f8; display: table; text-align: center; ">
                <tr>
                    <td style="display: flex; ">
                        <img width="100%" src="{{asset("public/assets/images/email-banner.jpg")}}">
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 24px; font-weight: 700; text-align: center; padding: 40px 25px 30px; color: #29479F;">
                        {{$title}}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 25px; font-size: 20px; font-weight: 600;">
                        <p style="margin: 0; ">{{$otpTitle}}:</p>
                        <p style="border: 1px dashed #222; padding: 12px 40px; display: inline-block; margin: 12px 0 20px; ">{{$token}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 25px 30px;">
                        {{$desc}}
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection