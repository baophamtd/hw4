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
            <label for = "title">Chart Title: </label>
            <input type = "text" id = "title" name = "title" value = "">
            </br>
            <br>
            <textarea name = "content" id = "content" rows="10" cols="50"></textarea>
            </br>
            <input type="submit" value="Share"/>
            </div>
        </body>
    </html>
    <?php
    }
}
?>