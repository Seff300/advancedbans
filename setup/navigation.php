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
    if(isset($_POST['privateenabled'])) {
        $privateenabled = $_POST['privateenabled'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('private_page' => array('enabled' => true));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    } else {
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('private_page' => array('enabled' => false));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }
    
    if(isset($_POST['privatepassword'])) {
        $privatepassword = $_POST['privatepassword'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('private_page' => array('password' => $privatepassword));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }


    if(isset($_POST['contactenabled'])) {
        $contactenabled = $_POST['contactenabled'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('navigation' => array('contact' => array('enabled' => true)));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    } else {
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('navigation' => array('contact' => array('enabled' => false)));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['contactlink'])) {
        $contactlink = $_POST['contactlink'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('navigation' => array('contact' => array('link' => $contactlink)));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['appealenabled'])) {
        $appealenabled = $_POST['appealenabled'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('navigation' => array('appeal' => array('enabled' => true)));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    } else {
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('navigation' => array('appeal' => array('enabled' => 'false')));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if(isset($_POST['appeallink'])) {
        $appeallink = $_POST['appeallink'];
        $jsonData = file_get_contents('../static/configuration.json');
        $arrayData = json_decode($jsonData, true);
        $replacementData = array('navigation' => array('appeal' => array('link' => $appeallink)));
        $newArrayData = array_replace_recursive($arrayData, $replacementData);
        $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
        file_put_contents('../static/configuration.json', $newJsonData);
    }

    if (headers_sent()) {
        die('Redirect failed. Please <a href="database.php">Click here</a> to go to the next page.');
    }
    else {
        exit(header("Location: database.php"));
    }

}
?>
<div class="container">
    <div class="text-title">
        <div class="row justify-content-center">
            <h4 class="display-4">Step 2</h4>
        </div>
    </div>
        <div class="row justify-content-center">
            <h4 class="text-basic">Navigation and access information</h4>
        </div>
</div>

<div class="container">
    <form method="POST">
        <div class="row">
            <div class="field">
                <label for="privatepage">Private Page:</label>
            </div>
        </div>
        <div class="row">
            <div class="form-check field">
                <label for="privatepageenabled">Enabled:</label>
                <label class="form-check-label shadow-1">
                    <input type="checkbox" class="form-check-input shadow" id="privateenabled" name="privateenabled" value="true">
                    <div id="checkbox-private"></div>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="password">Password</label>
                <input type="password" class="form-control shadow" id="privatepassword" placeholder="Set the password used to access your page" name="privatepassword">
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label for="contactttle">Contact:</label>
            </div>
        </div>
        <div class="row">
            <div class="form-check field">
                <label for="contact">Enabled:</label>
                <label class="form-check-label shadow-1">
                    <input type="checkbox" class="form-check-input shadow" id="contactenabled" name="contactenabled" value="false">
                    <div id="checkbox-contact"></div>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="contact">Link</label>
                <input type="text" class="form-control shadow" id="contactlink" placeholder="Enter your contact link" name="contactlink">
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label for="playercount">Appeal:</label>
            </div>
        </div>
        <div class="row">
            <div class="form-check field">
                <label for="playercount">Enabled:</label>
                <label class="form-check-label shadow-1">
                    <input type="checkbox" class="form-check-input shadow" id="appealenabled" name="appealenabled" value="true">
                    <div id="checkbox-appeal"></div>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group field">
                <label for="contact">Link</label>
                <input type="text" class="form-control shadow" id="appeallink" placeholder="Enter your appeal link" name="appeallink">
            </div>
        </div>
        <div class="row">
            <div class="submit-button shadow">
                <input type="submit" class="btn btn-success" name="setup" value="Next ➞">
            </div>
        </div>
        <div class="row">
            <div class="submit-button1 themeshadow">
                <a href="index" class="btn btn-success">🠔 Back</a>
            </div>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $('#checkbox-contact').text($('#contactenabled').val());

$("#contactenabled").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'True');
  } else {
    $(this).attr('value', 'False');
  }
  
  $('#checkbox-contact').text($('#contactenabled').val());
});

$('#checkbox-private').text($('#privateenabled').val());

$("#privateenabled").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'True');
  } else {
    $(this).attr('value', 'False');
  }
  
  $('#checkbox-private').text($('#privateenabled').val());
});

$('#checkbox-appeal').text($('#appealenabled').val());

$("#appealenabled").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'True');
  } else {
    $(this).attr('value', 'False');
  }
  
  $('#checkbox-appeal').text($('#appealenabled').val());
});
</script>
</body>
</html>