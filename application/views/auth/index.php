<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h1 style="margin-top: 50px;">
            Login Here!
        </h1>

        <div class="container">
            <form action="<?= base_url('Auth_controller/cek') ?>" method="post">
                <input type="text" name="username" id="username" placeholder="Username" style="margin-top: 10px;"><br>
                <input type="password" name="password" id="password" placeholder="Password" style="margin-top: 10px;"><br>
                <input type="submit" value="submit" name="submit" style="margin-top: 10px;">
            </form>
        </div>
    </center>
</body>

</html>