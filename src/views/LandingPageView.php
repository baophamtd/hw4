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
            <title>PasteChart</title>
            <link rel="stylesheet" type="text/css" href="./src/styles/landing_page.css"/>
        <head>
        <body>
            <div class = "centered" >
            <h1>PasteChart</h1>
            <h3>Share your data in charts!</h3>
            <br>
			<form action='index.php' method='get'>
            <label for = "title">Chart Title: </label>
            <input type = "text" id = "title" name = "title" value = <?=$data['title']?>>
            </br>
            <br>
            <textarea name = "content" id = "content" rows="10" cols="50" placeholder="'Text Label','Coordinate 1','Coordinate 2'
One value per line, up to 50 lines of at most 80 characters"><?=$data['content']?></textarea>
            </br>
            <input type="submit" value="Share"/>
			</form>
			
			<script type="text/javascript">
			function setMessage(){
				document.write("Format was not followed. Please try again.");
				setTimeout(function(){document.location.href="index.php"},3000);
			}
			</script>
			
			<?php
				if (isset($data['textAreaError']) && $data['textAreaError']){
					echo "<script>setMessage();</script>";
				}
			?>
            </div>
        </body>
    </html>
    <?php
    }
}
?>