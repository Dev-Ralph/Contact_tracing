<?php
$user_Cnumber = $_GET['user_Cnumber'];
$user_Cnumbers = explode(",",$user_Cnumber);
$count = count($user_Cnumbers);
$quarantine_date = $_GET['quarantine_date'];
$message = "You may have been in contact with a COVID 19 positive. Your quarantine may end on $quarantine_date.";
$apicode = "TR-VINCE067004_VQABE";
$passwd = '}b3qlt$)%s';
    $url = 'https://www.itexmo.com/php_api/api.php';
    for($i=0; $i<$count; $i++){
    $itexmo = array('1' => $user_Cnumbers[$i], '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
}
    file_get_contents($url, false, $context);
    header('Location: list_users.php');
?>