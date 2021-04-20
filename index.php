<?php 

// if(!isset($_SESSION['loggedin'])){
//     session_start();
//     $_SESSION['loggedin'] = "Usuário não Logado";
//     header("Location: Pages/login.php");      
// }else {
//     header("location: Pages/home.php");
// }


$url = explode("/", $_GET['url'] ?? 'home'); 
var_dump($url);

if (file_exists("Pages/{$url[0]}.php")) {
    include "Pages/{$url[0]}.php";
} else {
    include "Pages/erro.php";
}








    // if (file_exists("Pages/{$rota[0]}.php")) {
    //     if (!isset($_SESSION['loggedin'])) {
    //         session_start();
    //         $_SESSION['loggedin'] = "Usuário não Logado";
    //         header("location: Pages/{$rota[0]}.php");
    //     } else {
    //         header("location: Pages/{$rota[0]}.php");
    //     }  
    // } else {
    //     header("location: Pages/erro.php");
    // }
    