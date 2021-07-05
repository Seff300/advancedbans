<?php

error_reporting(E_ALL);
$json_string = file_get_contents('../static/configuration.json');
	$parsed_json = json_decode($json_string, true);
	foreach ($parsed_json as $key => $value) {
		if ($parsed_json['setup']['completed'] == true) {
			header('Location: ../');
			exit();
		}
	}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" integrity="sha512-nhY06wKras39lb9lRO76J4397CH1XpRSLfLJSftTeo3+q2vP7PaebILH9TqH+GRpnOhfAGjuYMVmVTOZJ+682w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(function(){ $("head").load("../static/resources/setuphead.html") });
    </script>
</head>
<body>

<?php

if(isset($_POST['setup'])) {
    if(isset($_POST['themevalue'])) {
        $theme = $_POST['themevalue'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('default' => array('theme' => $theme));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['languagevalue'])) {
        $language = $_POST['languagevalue'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('default' => array('language' => $language));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['title'])) {
        $title = $_POST['title'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('language' => array('title' => $title));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['description'])) {
        $description = $_POST['description'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('language' => array('description' => $description));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['enabled'])) {
        $enabled = $_POST['enabled'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('player_count' => array('enabled' => 'true'));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    } else {
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('player_count' => array('enabled' => 'false'));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['queryenabled'])) {
        $queryenabled = $_POST['queryenabled'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('player_count' => array('query' => 'true'));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    } else {
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('player_count' => array('query' => 'false'));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['ip'])) {
        $ip = $_POST['ip'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('player_count' => array('host' => $ip));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['port'])) {
        $port = $_POST['port'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('player_count' => array('port' => $port));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if (headers_sent()) {
        die('Redirect failed. Please <a href="navigation.php">Click here</a> to go to the next page.');
    }
    else {
        exit(header("Location: navigation.php"));
    }

}
?>
<div class="container">
    <div class="text-title">
        <div class="row justify-content-center">
            <h4 class="display-4">Let's get you started!</h4>
        </div>
    </div>
        <div class="row justify-content-center">
            <h4 class="text-basic">Basic information</h4>
        </div>
</div>

<div class="container">
    <form method="POST">
        <div class="row justify-content-center">
            <div class="form-group field">
                <label for="theme">Theme*</label>
                <select name="themevalue" class="form-control shadow" required>
                    <option value="Default">Default</option>
                    <option value="photon">Photon</option>
                    <option value="Kara">Kara</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="language">Language*</label>
                <select name="languagevalue" class="form-control shadow" required>
                    <option value="en-US">English</option>
                    <option value="de-DE">German</option>
                    <option value="fr-FR">French</option>
                    <option value="hu-HU">Hungarian</option>
                    <option value="nl-NL">Dutch</option>
                    <option value="pl-PL">Polish</option>
                    <option value="sk-SK">Slovak</option>
                    <option value="sv-SE">Swedish</option>
                    <option value="zh-CN">简体中文</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="title">Title*</label>
                <input type="text" class="form-control shadow" id="title" placeholder="Enter the page title" name="title" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="description">Description*</label>
                <input type="text" class="form-control shadow" id="description" placeholder="Enter the page description" name="description" required>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label for="playercount">Player Count*</label>
            </div>
        </div>
        <div class="row">
            <div class="form-check field">
                <label for="playercount">Enabled:</label>
                <label class="form-check-label shadow-1">
                    <input type="checkbox" class="form-check-input shadow" id="enabled" name="enabled" value="true">
                    <div id="checkbox-playercount"></div>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-check query-field">
                <label for="playercount">Query:</label>
                <label class="form-check-label shadow-1">
                    <input type="checkbox" class="form-check-input shadow" id="queryenabled" name="queryenabled" value="true">
                    <div id="checkbox-query"></div>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="ip">IP*</label>
                <input type="text" class="form-control shadow" id="ip" placeholder="Enter your server's IP" name="ip" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="port">Port</label>
                <input type="text" class="form-control shadow" id="port" placeholder="Enter your server's Port" name="port">
            </div>
        </div>
        <div class="row">
            <div class="submit-button shadow">
                <input type="submit" class="btn btn-success" name="setup" value="Next ➞">
            </div>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $('#checkbox-playercount').text($('#enabled').val());

$("#enabled").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'True');
  } else {
    $(this).attr('value', 'False');
  }
  
  $('#checkbox-playercount').text($('#enabled').val());
});

$('#checkbox-query').text($('#queryenabled').val());

$("#queryenabled").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'True');
  } else {
    $(this).attr('value', 'False');
  }
  
  $('#checkbox-query').text($('#queryenabled').val());
});

</script>
</body>
</html>