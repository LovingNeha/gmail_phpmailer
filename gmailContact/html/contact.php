
<?php
$result='';
if(isset($_POST['submit']))
{
    require '../phpMailer/PHPMailerAutoload.php';
    $mail= new PHPMailer;
    $mail->isSMTP();                  //really important for xampp server
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='yourgmail@gmail.com';
    $mail->Password='your password';

    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAddress('to@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['name']);

    $mail->isHTML(true);
    $mail->Subject='form submission:'.$_POST['subject'];
    $mail->Body='<h1 align=center padding-top=30px> Name: '.$_POST['name'].'<br> Email: '.$_POST['email'].'<br>Message: ' .$_POST['msg'].'</h1>';

    if(!$mail->send()){
        $result="something went wrong";
    }
    else{
        $result="thanks ".$_POST['name'].' for connecting.We will get back to you soon!';
    }

}

?>



<!DOCTYPE html>
<h2 lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GO TRENDY LIVE TRENDY</title>
    <link rel="shortcut icon" type="image/png" href="/img/catlogo.png">
    <link rel="stylesheet" href="../css/style.css">
</head>
<h4>
<nav id="contact">
        <div class="header_menu">
            <!-- <div class="logo">
                <img src="" alt="">
                 <img src="img/logo.jpg" alt="logo" > 
        </div> -->
            <div class="menu-list">
                <i class="fa fa-bars menu" aria-hidden="true"></i>
            </div>

            <ul>
                <li><a href="../index.htm">home</a></li>
                <li><a href="about.htm">about</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>

            <!-- <i href="#" id="iconbar" onclick="responsive_menu()"><i class="fa fa-bars" ></i></a> -->
        </div>
    </nav>
    <header>
        <div class="header-container">
            <h2 style="color: gray;">contact US</h2>
            <div class="contact" >

    <h4><?=$result; ?> </h4>
    <form action="" method="POST">
        <input class="textboxdesign"  type="text" name="name" placeholder="Enter your Name" required>
        <input class="textboxdesign"  type="text" name="subject" placeholder="Subject" required>
        <input class="textboxdesign" type="email" name="email" placeholder="Enter your Email" required> <br>
        <textarea class="textboxdesign" name="msg" placeholder="msg type" cols="30" rows="4" placeholder="Enter a Message" required> </textarea> <br> 
        <input class="btncontact" type="submit" name="submit" value="send"> <br>   
    </form>
            </div>
</header>

</h2>