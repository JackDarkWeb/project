<?php
require_once realpath("Book.php"); 

spl_autoload_register(function ($class){
    require $class.'.php';
});


$valide = new Validator();
//$valide->option("select");

if(isset($_POST["submit"])){

    $valide->email("email");
    $valide->text("first");
    $valide->text("last");
    $valide->phone("phone");
    $valide->file("file");
    $valide->select("select");
    $valide->radio("sex");
    
}


?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h5 class="mt-5">Test register with POO</h5>
    <div class="row mt-5">
           <form method="post" action="" enctype="multipart/form-data">
               <div class="form-group">
                   <label>Email</label>
                   <input type="email" name="email"  class="form-control" value="<?=$valide->post('email')?>"/><br/>
                   <span class="text-danger font-italic font-weight-bold"><?php $valide->error("email")?></span>
               </div>

               <div class="form-group">
                   <label>First name</label>
                   <input type="text" name="first"  class="form-control" value="<?=$valide->post('first')?>"/><br/>
                   <span class="text-danger font-italic font-weight-bold"><?php $valide->error("first")?></span>
               </div>

               <div class="form-group">
                   <label>Last name</label>
                   <input type="text" name="last"  class="form-control" value="<?=$valide->post('last')?>" /><br/>
                   <span class="text-danger font-italic font-weight-bold"><?php $valide->error("last")?></span>
               </div>

               <div class="form-group">
                   <label>Phone</label>
                   <input type="tel" name="phone"  class="form-control" value="<?=$valide->post('phone')?>"/>
                   <span class="text-danger font-italic font-weight-bold"><?php $valide->error("phone")?></span><br/>
               </div>

               <div class="form-group">
                  <label>Upload</label>
                   <input type="file" name="file"/>
                   <span class="text-danger font-italic font-weight-bold"><?php $valide->error("file")?></span><br/>
               </div>

               <div class="form-group">
                   <select name="select">
                       <option value="">Select your country</option>
                       <?=$valide->option("select")?>
                   </select><br/>
                   <span class="text-danger font-italic font-weight-bold"><?php $valide->error("select")?></span>
               </div>
               <div class="form-group">
                   Male <input type="radio" name="sex" value="male"/><br/>
                   Female <input type="radio" name="sex" value="female"/>
               </div>


             <br/><br/>
               <button type="submit" name="submit" class="btn btn-primary">Test</button>
           </form>
    </div>
</div>
   </body>
   </html>


    
    
    
    
