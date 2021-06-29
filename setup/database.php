<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" integrity="sha512-nhY06wKras39lb9lRO76J4397CH1XpRSLfLJSftTeo3+q2vP7PaebILH9TqH+GRpnOhfAGjuYMVmVTOZJ+682w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(function(){ $("head").load("head.html") });
    </script>
</head>
<body>

<?php
function indent($text)
{
    // Create new lines where necessary
    $find = array('>', '</', "\n\n");
    $replace = array(">\n", "\n</", "\n");
    $text = str_replace($find, $replace, $text);
    $text = trim($text); // for the \n that was added after the final tag

    $text_array = explode("\n", $text);
    $open_tags = 0;
    foreach ($text_array AS $key => $line)
    {
        if (($key == 0) || ($key == 1)) // The first line shouldn't affect the indentation
            $tabs = '';
        else
        {
            for ($i = 1; $i <= $open_tags; $i++)
                $tabs .= "\t";
        }

        if ($key != 0)
        {
            if ((strpos($line, '</') === false) && (strpos($line, '>') !== false))
                $open_tags++;
            else if ($open_tags > 0)
                $open_tags--;
        }

        $new_array[] = $tabs . $line;

        unset($tabs);
    }
    $indented_text = implode("\n", $new_array);

    return $indented_text;
}

if(isset($_POST['setup'])) {
    if(isset($_POST['databasehost']) && isset($_POST['databaseuser']) && isset($_POST['databasepassword']) && isset($_POST['databasename'])) {
        $databasehost = $_POST['databasehost'];
        $databaseuser = $_POST['databaseuser'];
        $databasepassword = $_POST['databasepassword'];
        $databasename = $_POST['databasename'];
        $searchF  = array('{DB_HOST}','{DB_USER}','{DB_PASSWORD}','{DB_NAME}');
        $replaceW = array($databasehost,  $databaseuser,     $databasepassword,     $databasename);

        $file = file_get_contents('../static/database.php');
        $fh = fopen("../static/database.php", 'w');
        $file = str_replace($searchF, $replaceW, $file);
        fwrite($fh, $file);
        fclose($fh, $file);
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('setup' => array('completed' => 'true'));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    header('Location: /');
    exit();

}
?>
<div class="container">
    <div class="text-title">
        <div class="row justify-content-center">
            <h4 class="display-4">Step 3</h4>
        </div>
    </div>
        <div class="row justify-content-center">
            <h4 class="text-basic">Database information</h4>
        </div>
</div>

<div class="container">
    <form method="POST">
        <div class="row">
            <div class="form-group field">
                <label for="contact">Database host*</label>
                <input type="text" class="form-control shadow" id="databasehost" placeholder="Enter your database host" name="databasehost" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="contact">Database user*</label>
                <input type="text" class="form-control shadow" id="databaseuser" placeholder="Enter your database username" name="databaseuser" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="contact">Database password*</label>
                <input type="password" class="form-control shadow" id="databasepassword" placeholder="Enter your database password" name="databasepassword" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="contact">Database name*</label>
                <input type="text" class="form-control shadow" id="databasename" placeholder="Enter your database name" name="databasename" required>
            </div>
        </div>
        <div class="row">
            <div class="submit-button shadow">
                <input type="submit" class="btn btn-success" name="setup" value="Submit">
            </div>
        </div>
        <div class="row">
            <div class="submit-button1 shadow">
                <a href="navigation" class="btn btn-success">➞ Back</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>