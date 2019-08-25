<?php
spl_autoload_register(function ($class){

    require_once realpath($class.".php");
});

$validate = new Validator;

//print_r($validate->file('file'));


if(isset($_POST['submit'])){

    $validate->text('first');
    $validate->text('last');
    $validate->email('email');
    $validate->phone('phone');
    $validate->file('file');
}

require_once realpath("view.php");