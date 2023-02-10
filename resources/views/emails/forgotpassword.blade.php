@extends('emails.layouts.layout')

@section('content')
<?php if($language_code == 'ar') {
    $title = "هل نسيت كلمة المرور الخاصة بك؟";
    $otpTitle = "رمز التحقق";
    $desc1 = "لقد وصلنا طلب لتغيير كلمة المرور الخاصة بك بحساب المقيم الذكي";
    $desc2 = "يمكنك استعمال رمز التحقق لاعادة تعيين كلمة المرور بالتطبيق";
    $desc3 = "في حالة عدم طلب تغيير كلمة المرور تجاهل الايميل وكلمة المرور لن تتغير";
} else if($language_code == 'he') {
    $title = "שכחת סיסמא?";
    $otpTitle = "הקוד שלך";
    $desc1 = "קיבלנו את בקשתך לאיפוס סיסמא לחשבונך.";
    $desc2 = "אתה יכול להשתמש בקוד לאיפוס סיסמתך.";
    $desc3 = "אם לא ביקשת לשנות את סיסמתך אז ראה הודעה זאת כמבוטלת וסיסמתך תישאר כשהיתה .";
} else {
    $title = "Forgot Your Password ?";
    $otpTitle = "Your OTP";
    $desc1 = "We have received a password change request for your Toshav Haham account.";
    $desc2 = "You can use OTP for reset password from app.";
    $desc3 = "If you did not ask to change your password, then you can ignore this email and your passsword will not be changed.";
} ?>
<tr>
    <td>
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
                    <td style="font-size: 24px; font-weight: 700; padding: 40px 25px 30px; color: #29479F;">
                        {{$title}}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 25px 10px;">
                        <p>{{$desc1}}</p>
                        {{-- <span style="font-weight: 600; color: #29479F; ">Account name</span> --}}
                        <p style="margin: 0; font-size: 20px; font-weight: 600;">{{$otpTitle}}</p>
                        <p style="border: 1px dashed #222; padding: 12px 40px; display: inline-block; margin: 12px 0 20px; font-size: 20px; font-weight: 600;">{{$token}}</p>
                        <p style="margin: 0; ">{{$desc3}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 25px 30px;">
                        
                        {{-- The OTP will remain active for 24 hours. --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection