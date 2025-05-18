<?php
include 'phpqrcode/qrlib.php'; // Certifique-se de que o caminho para a biblioteca está correto

// Define a URL do seu sistema
$url = 'http://localhost/bus_schedule/index.php'; // Mude para a URL do seu servidor

// Caminho para salvar o QR Code
$filename = 'qrcode.png';

// Gera o QR Code
QRcode::png($url, $filename);

// Exibe o QR Code
echo '<h2>QR Code para Acessar o Sistema:</h2>';
echo '<img src="' . $filename . '" />';
?>