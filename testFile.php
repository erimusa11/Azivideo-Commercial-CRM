<?php

if (isset($_POST['login'])) {
    echo $_FILES['hello']['name']."<br>";
    echo $_FILES['haleluja']['name']."<br>";
    echo $_FILES['marsh']['name']."<br>";
    print_r($_FILES);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        enctype="multipart/form-data" method="POST">
        <input type="file" name="hello" />
        <input type="file" name="haleluja" />
        <input type="file" name="marsh" />

        <!-- <div class="text-center">
                    <img class="mb-4" src="assets/login/icon.png" alt="" width="100" height="100">
                </div>
                <span class="login100-form-title p-b-37">
                    Hyr në Platforme
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Përdoruesi">
                    <input class="input100" type="text" name="username" placeholder="Përdoruesi">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Fjalëkalimi">
                    <input class="input100" type="password" name="password" placeholder="Fjalëkalimi">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn m-t-20"> -->
        <button class="login100-form-btn" name="login" type="submit">
            Hyr
        </button>

    </form>
</body>

</html>