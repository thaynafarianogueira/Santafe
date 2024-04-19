<?php 
use Assets\Conn;
require_once 'Conn.php';
require_once 'Lead.php';
require_once 'Helper.php';
require_once 'Email.php';
require_once 'csrf.php';

// MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "santafe";
$conn = new Conn($servername, $username, $password, $database);

// Mail Config
$to = "gustavogumieiroalves@gmail.com";
$from = "gustavogumieiroalves@gmail.com";
$replyTo = $to;
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");

$smtpServer = 'smtp.gmail.com';
$smtpPort = 587; // Porta para STARTTLS
$timeout = 30; // Tempo limite de conexão em segundos

// Conecta ao servidor SMTP
$smtpSocket = fsockopen($smtpServer, $smtpPort, $errno, $errstr, $timeout);
if (!$smtpSocket) {
    echo "Falha ao abrir o socket SMTP: $errstr ($errno)";
    exit;
}
