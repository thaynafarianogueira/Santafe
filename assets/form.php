<?php 
use Assets\Email;
use Assets\Lead;
include_once("autoload.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $fullAdress = $_POST['fullAdress'];
    $email = $_POST['email'];
    $chooseService = $_POST['chooseService'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $zipCode = $_POST['zipCode'];
    $msg = $_POST['msg'];
    $lead = new Lead($fullName, $fullAdress, $email, $chooseService, $PhoneNumber, $zipCode, $msg);
    if($lead->save($conn)) {
        $mail = new Email($to, "Novo Lead Cadastrado!", $from, $replyTo, "Lead criado com sucesso! Entre em contato no email $email");
        // $mail->send();
        echo 'success';
        exit;
    }
    echo 'error';
    exit;
}