<!DOCTYPE html>
<html lang="<?=$_SERVER['HTTP_ACCEPT_LANGUAGE']?>">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
<h4 class="text-center font-weight-bolder font-italic text-secondary">Register</h4><br/>
<div class="row">
    <form method="post" action="<?= $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data" class="">
        <div class="form-group">
            <label for="f" class="text-info font-italic font-weight-bolder">First name</label>
            <input type="text" name="first" class="form-control" id="f" size="45" value="<?=$validate->post('first')?>" /><br/>
            <span class="text-danger font-italic"><?= $validate->error("first")?></span>
        </div>

        <div class="form-group">
            <label for="l" class="text-info font-italic font-weight-bolder">Last name</label>
            <input type="text" name="last" class="form-control" id="l" size="45" value="<?=$validate->post('last')?>" pattern="^-?[a-zA-Z\ ]+$"/><br/>
            <span class="text-danger font-italic"><?= $validate->error("last")?></span>
        </div>

        <p>
            <label for="e" class="text-info font-italic font-weight-bolder">E-mail</label>
            <input type="email" name="email" class="form-control" id="e" size="45" value="<?=$validate->post('email')?>" pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,3})"/><br/>
            <span class="text-danger font-italic"><?= $validate->error("email")?></span>
        </p>

        <div class="form-group">
            <label for="t" class="text-info font-italic font-weight-bolder">Phone</label>
            <input type="tel" name="phone" class="form-control" id="t" size="45" value="<?=$validate->post('phone')?>" pattern="^(\+)[0-9]{11,12}"/><br/>
            <span class="text-danger font-italic"><?= $validate->error("phone")?></span>
        </div>

        <div class="form-group">
            <label for="pw" class="text-info font-italic font-weight-bolder">Password</label>
            <input type="password" name="password" class="form-control" id="pw" size="45" minlength="8"/>
            <span class="text-danger font-italic"><?= $validate->error("password")?></span>
        </div>

        <div class="form-group">
            <label for="cpw" class="text-info font-italic font-weight-bolder">Confirm your password</label>
            <input type="password" name="confirm_password" class="form-control" id="cpw" size="45" minlength="8" />
            <span class="text-danger font-italic"><?= $validate->error("confirm_password")?></span>
        </div>

        <div class="form-group">
            <label for="c" class="text-info font-italic font-weight-bolder">Country</label>
            <select name="country" id="c" class="form-control">
                <option value="">Select your country</option>
                <option value="France">France</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="Ukraine">Ukraine</option>
            </select>
        </div>

        <div class="form-group">
            <span  class="text-info font-italic font-weight-bolder">Male</span>
            <input type="radio" name="sexy" id="ma" size="45" value="male" <?=(isset($_POST['sexy']) && $_POST['sexy'] == 'male')? 'checked' : ''?>/>
        </div>

        <div class="form-group">
            <span class="text-info font-italic font-weight-bolder">Female</span>
            <input type="radio" name="sexy"  id="fe" size="45" value="female" <?=(isset($_POST['sexy']) && $_POST['sexy'] == 'female')? 'checked=\"checked\"' : ''?>/>
        </div>

        <div class="form-group">
            <label for="file" class="text-info font-italic font-weight-bolder">Upload your file</label>
            <input type="file" name="file" class="form-control" id="file" size="32.5" accept="image/jpeg, image/png, image/gif, image/jpg"/>
            <span class="text-danger font-italic"><?= $validate->error("file")?></span>
        </div>

        <p>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        </p>
    </form>
</div>
</div>
</body>
</html>
