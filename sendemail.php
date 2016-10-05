<?php

session_start();
header( 'Content-type: application/json' );

   if($_POST && isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "fmartins.ba@gmail.com";
        $subject = $subject . " - WEB DEVELOPER IN SYDNEY";
        $body = $message;
        $from = "From: " . $email;

        if (mail($to, $subject, $body, $from)) {
            $result = array( 'response' => 'success', 'message'=>'<strong>Thank You!</strong>&nbsp; Your email has been delivered.' );
        } else {
            $result = array( 'response' => 'error', 'message'=>'<strong>Ops!</strong>&nbsp; Cann\'t Send Mail.'  );
        }

        echo json_encode( $result );

        session_destroy();
        exit;
        die;
   }

    // session_cache_limiter( 'nocache' );
    // header( 'Expires: ' . gmdate( 'r', 0 ) );
    // header( 'Content-type: application/json' );


    // $to         = 'fmartins.ba@gmail.com';

    // $email_template = 'simple.html';

    // $subject    = strip_tags($_POST['subject']);
    // $email       = strip_tags($_POST['email']);
    // //$phone      = strip_tags($_POST['phone']);
    // $name       = strip_tags($_POST['name']);
    // $message    = nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );
    // $result     = array();


    // if(empty($name)){

    //     $result = array( 'response' => 'error', 'empty'=>'name', 'message'=>'<strong>Error!</strong>&nbsp; Name is empty.' );
    //     echo json_encode($result );
    //     die;
    // }

    // if(empty($email)){

    //     $result = array( 'response' => 'error', 'empty'=>'email', 'message'=>'<strong>Error!</strong>&nbsp; Email is empty.' );
    //     echo json_encode($result );
    //     die;
    // }

    // if(empty($message)){

    //      $result = array( 'response' => 'error', 'empty'=>'message', 'message'=>'<strong>Error!</strong>&nbsp; Message body is empty.' );
    //      echo json_encode($result );
    //      die;
    // }



    // // $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
    // // $headers .= "Reply-To: ". $email . "\r\n";
    // // $headers .= "MIME-Version: 1.0\r\n";
    // // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // $headers = "From: " . $email;


    // $templateTags =  array(
    //     '{{subject}}' => $subject,
    //     '{{name}}'=>$name,
    //     '{{email}}'=>$email,
    //     '{{message}}'=>$message//,
    //     //'{{phone}}'=>$phone
    //     );


    // $templateContents = file_get_contents( dirname(__FILE__) . '/email-templates/'.$email_template);

    // $contents =  strtr($templateContents, $templateTags);

    // if ( mail( $to, $subject, $contents, $headers ) ) {
    //     $result = array( 'response' => 'success', 'message'=>'<strong>Thank You!</strong>&nbsp; Your email has been delivered.' );
    // } else {
    //     $result = array( 'response' => 'error', 'message'=>'<strong>Error!</strong>&nbsp; Cann\'t Send Mail.'  );
    // }

    // echo json_encode( $result );

    // die;
