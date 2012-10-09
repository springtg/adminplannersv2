<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once('phpmailer/class.phpmailer.php');

class CI_Phpmailer extends PHPMailer {

    function __construct($exceptions = false) {
        parent::__construct($exceptions);
    }
    
    function init_gmail($recipient){
        // set CharSet is utf-8
        $this->CharSet = 'utf-8';
        // telling the class to use SMTP
        $this->IsSMTP();
        // Sets SMTP class debugging on or off
        $this->SMTPDebug = 1;
        // 1 = errors and messages
        // 2 = messages only
        // enable SMTP authentication
        $this->SMTPAuth = TRUE;
        // sets the prefix to the servier
        $this->SMTPSecure = 'ssl';
        // sets GMAIL as the SMTP server
        $this->Host = 'smtp.gmail.com';
        // set the SMTP port for the GMAIL server
        $this->Port = 465;
        // GMAIL username
        $this->Username = $recipient;
        // GMAIL password
        $this->Password = 'vothinhung';
        $this->SetFrom($recipient, 'Website Support');
        $this->AddReplyTo($recipient, 'Website Support');
    }

    function send_mail($recipient, $subject, $message, $type = 'gmail', $priority = 3) {
        if($type == 'gmail') $this->init_gmail($recipient);
        elseif($type == 'hueuni') $this->init_hueunimail();
        else{
            echo 'Invalidate type!';
            exit;
        }
        $email_to = "ndhungvu@gmail.com";
        $this->Priority = $priority;
        $this->Subject = $subject;
        $this->MsgHTML($message);
        //$this->AddAddress($recipient);
        $this->AddAddress($email_to);
        return $this->Send();
    }
}