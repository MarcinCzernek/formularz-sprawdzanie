<?php

$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['tel'];
$content = $_POST['content'];
$error = false;

function checkName ($name){
    $req = '/(*UTF8)^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';
    if(preg_match($req, $name)){
    $name = ucwords(strtolower($name));
    return $name;
    }else{
    return false;
    }
}

function checkEmail($email){
    $req = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
    if(preg_match($req, $email)){
        return true;
    }else{
        return false;
    }
}

function checkTel($telephone){
    $req = '/^[0-9]{9}$/';
    if(preg_match($req,$telephone)){
        return true;
    }else{
        return false;
    }
}

function checkContent($content){
    $content = trim($content);
    if(strlen($content) < 30){
        echo 'Nie tak';
        return false;
    }else{
        return true;
        echo 'O tak';
    }
}

if(!checkEmail($email)){
    echo "Adres e-mail niepoprawny";
    $error = true;
}

$name = checkName($name);

if(!$name){
    echo 'Wpisane imie jest niepoprawne';
    $error = true;
}

if(!checkTel($telephone)){
    echo 'Niewłasciwy format numeru telefonu';
    $error = true;
}

$content = checkContent($content);
if(!$content){
    echo 'Niepoprawna treść';
    $error = true;
}
if ($error)
{
    echo "Wystąpił jeden lub więcej błędów podczas przetwarzania danych.";
}
else
{
    echo "Imię klienta: $name;
";
    echo "Adres e-mail: $email;
";
    echo "Numer telefonu: $telephone;
";
    echo "Treść: $content;
";
}



?>