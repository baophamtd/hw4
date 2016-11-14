<?php
namespace threemuskateers\hw4\views;
require_once "View.php";


class LandingPageView extends View{

    public function __construct(){
    
    }
    
    public function render($data){
    ?>
    <!DOCTYPE html>
    <html>
        <head>
		
		<script type="text/javascript">
	
	// Sets the error message
	function setMessage(){
		document.getElementById("error").innerHTML = "Format was not followed. Please try again.";
		setTimeout(function(){document.location.href="index.php"},3000);
	}
			
	// Checks from the client side
	function textareaCheck(){
		var content = document.forms["myForm"]["content"].value;
		var splitContent = content.split("\n");
		// Checks if there's more than 50 lines
		if (splitContent.length > 50){
			setMessage();
			return false;
		}
		// Checks if there's more than 80 characters per line
		for (var i = 0; i < splitContent.length; i++){
			if (splitContent[i].length > 80){
				setMessage();
				return false;
			}
		}
		// Checks if there are 2 commas in each line
		for (var i = 0; i < splitContent.length; i++){
			var splitComma = splitContent[i].split(",");
			if (splitComma.length != 3){
				setMessage();
				return false;
			}
		}
	}
</script>
            <title>PasteChart</title>
            <link rel="stylesheet" type="text/css" href="./src/styles/landing_page.css"/>
        <head>
        <body>
            <div class = "centered" >
            <h1>PasteChart</h1>
            <h3>Share your data in charts!</h3>
            <br>
			<form name="myForm" action='index.php' method='get' onsubmit="return textareaCheck()">
            <label for = "title">Chart Title: </label>
            <input type = "text" id = "title" name = "title">
            </br>
            <br>
            <textarea name = "content" id = "content" rows="10" cols="50" placeholder="'Text Label','Coordinate 1','Coordinate 2'
One value per line, up to 50 lines of at most 80 characters"></textarea>
            </br>
            <input type="submit" value="Share"/>
			</form>
			<p id="error"></p>
            </div>
        </body>
    </html>
    <?php
    }
}
?>