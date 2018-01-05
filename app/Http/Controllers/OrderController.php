<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function takeOrder(Request $request){
        $post = $request->all();
        $c = true;
        $project_name = trim($post['project_name']);
        $admin_email  = trim($post['admin_email']);
        $form_subject = trim($post['form_subject']);
        $message = '';
        foreach ( $post as $key => $value ) {
            if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" && $key != "_token") {
                $message .= "
                " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
                        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
                        <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
                </tr>
                ";
            }
        }
        $message = "<table style='width: 100%;'>$message</table>";
        function adopt($text) {
            return '=?UTF-8?B?'.Base64_encode($text).'?=';
        }
        $headers = "MIME-Version: 1.0" . PHP_EOL .
            "Content-Type: text/html; charset=utf-8" . PHP_EOL .
            'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
            'Reply-To: '.$admin_email.'' . PHP_EOL;
        mail($admin_email, adopt($form_subject), $message, $headers );

    }
}
