<?php
header("Content-type:text/html;charset=utf-8");
//老用户续费
//function you(){


$code=$_POST['code'];
if($code!='18*******078'){
    echo "<div style='width:300px; margin:36px auto;'>";

    echo "对不起，校验码不正确！此邮箱为主人测试邮箱";
    echo "<a href='index.html'>点此返回</a>";
    echo "</div>";
    exit();

}

require_once "PHPMailer.php" ;
require_once "SMTP.php" ;
date_default_timezone_set("Asia/Shanghai");

$to = $_POST['toemail']; //要发送的邮箱
$subject = 'CSS-NB官方';  //邮件主题
$content='<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>'. $_POST['title'] .'</title>
			</head><body>';
$content .='<div><h4>'. $_POST['title'] .'</h4></br>';
$content .='<div><h5>'. $_POST['content'] .'</h5></br>';
$content .= '</div></body></html>';
//$result =  sendMails( $to, $subject, $content );
$mail = new PHPMailer();
//    $body = preg_replace("[\]", '', $body);
$mail->CharSet = "UTF-8"; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
$mail->IsSMTP();  // 设定使用SMTP服务
$mail->SMTPDebug = 1;  //启用smtp 调试功能
$mail->SMTPAuth = true;

$mail->Host = 's***m.al**un.com';// "mail.ipbhq.com";    //发送服务器
$mail->Port       = 25;                   // SMTP服务器的端口号
$mail->Username = "w**@m**l.cs**b.com";  // SMTP 用户名，即个人的邮箱地址
$mail->Password = "WW*******8";      // SMTP 密码，即个人的邮箱密码
$mail->SetFrom("w**@m**l.cs**b.com", "新年快乐");
$mail->Subject = $subject;       //邮件主题
$mail->MsgHTML($content);             //邮件内容
$address = $to;
$mail->AddAddress($address, '');      //发送到哪
//if(!$mail->send()) {
//    echo  "Mailer Error: ".$mail->ErrorInfo;
//    // return array( 'code' => 100001, 'message' => "Mailer Error: ".$mail->ErrorInfo );
//} else {
//    echo  '发送成功!' ;// return array( 'code' => 200, 'message' => '发送成功!' );
//}
//}

echo "<div style='width:300px; margin:36px auto;'>";
if(!$mail->send()){
    echo  "Mailer Error: ".$mail->ErrorInfo;
    echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
    echo "<a href='index.html'>点此返回</a>";
    exit();
}else{
    echo "恭喜！邮件发送成功！！";
    echo "<a href='index.html'>点此返回</a>";

}

echo "</div>";

?>