<?php
namespace Assets;

class Email {
    private $to;
    private $subject;
    private $from;
    private $replyTo;
    private $message;


    public function __construct($to, $subject, $from, $replyTo, $message) {
        $this->to = $to;
        $this->subject = $subject;
        $this->from = $from;
        $this->replyTo = $replyTo;
        $this->message = $message;
    }

    public function send() {
        $headers = "From: $this->from\r\n";
        $headers .= "Reply-To: $this->replyTo\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        return mail($this->to, $this->subject, $this->message, $headers);
    }
}