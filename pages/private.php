<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" integrity="sha512-nhY06wKras39lb9lRO76J4397CH1XpRSLfLJSftTeo3+q2vP7PaebILH9TqH+GRpnOhfAGjuYMVmVTOZJ+682w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(function(){ $("head").load("../static/resources/privatehead.html") });
    </script>
</head>
<body>

<?php
error_reporting(0);
if(isset($_POST['submit'])) {
    if(isset($_POST['password'])) {
        $password       = $_POST['password'];
        $json_string = file_get_contents('../static/configuration.json');
        $parsed_json = json_decode($json_string, true);
        $flag        = false;
        foreach ($parsed_json as $key => $value) {
            if ($password == $parsed_json['private_page']['password']) {
                header('Location: ../');
                exit();
            }
            $error = 'Wrong password! Please re-check that you typed in the right password.';
        }
    }
}
?>
<div class="container">
    <div class="text-title">
        <div class="row justify-content-center">
            <h4 class="display-4">This is a private page</h4>
        </div>
    </div>
        <div class="row justify-content-center">
            <h4 class="text-basic">Please enter password to continue</h4>
        </div>
</div>

<div class="container">
    <form method="POST">
        <div class="row justify-content-center">
            <p class="error"><?php echo $error?></p>
        </div>
        <div class="row">
            <div class="form-group passwordfield">
                <input type="password" class="form-control shadow" id="password" placeholder="Enter the password to access this page" name="password" required>
            </div>
        </div>
        <div class="row">
            <div class="submit-button shadow">
                <input type="submit" class="btn btn-success" name="submit" value="Submit">
            </div>
        </div>
    </form>
</div>
</body>
</html>