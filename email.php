<?php
$topic = $_POST['topic'];
$email = $_POST['email'];
$text = $_POST['text'];

if($email != '' && strtolower($email) !="konopek360@wp.pl" && $topic != '' && $text != ''){
    $preferences = ["input-charset" => "UTF-8", "output-charset" => "UTF-8"];
    $encoded_topic = iconv_mime_encode("Temat", $topic, $preferences);

    $email_from = 'kontakt@meblekonopski.pl';
    $email_to = 'konopek360@wp.pl';

    $header = "From: $_POST[email] \r\nContent-type: text/html; charset=utf-8";

    mail($email_to,$encoded_topic,$text, $header);
    echo "wiadomość wysłana poprawnie";
} elseif(strtolower($email) =="konopek360@wp.pl"){
    echo "Bląd podczas wysyłania wiadomości(podaj swój adres e-mail)";
} else{
    echo "Bląd podczas wysyłania wiadomości";
}

echo '</br><a href="../">wróć</a>';

// sleep(2);
// header("Location: ../#contact");

?>