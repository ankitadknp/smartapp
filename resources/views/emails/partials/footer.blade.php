<?php if($language_code == 'ar') {
    $title = "حقوق النشر";
    $cmp = "محفوظة للمقيم الذكي";
} else if($language_code == 'he') {
    $title = "כל הזכויות שמורות";
    $cmp = "תושב חכם ישראל";
} else {
    $title = "All rights reserved";
    $cmp = "Toshav Haham Israel";
} ?>
<tr>
    <td>
        <table cellpadding="0" cellspacing="0"  width="100%"  style="padding: 20px 10px; max-width:600px;border-spacing:0px;border-width:medium;border-style:none; color: #bababa; font-size: 12px;line-height:22px; text-align: center;">
            <tbody>
                <tr>
                    <td>
                        {{$title}} &copy; {{date("Y")}} <a href="https://toshavhaham.co.il">{{$cmp}}</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>