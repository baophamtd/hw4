<?php
namespace threemuskateers\hw4\views;
require_once "View.php";


class LineGraphPageView extends View{

    public function __construct(){
    
    }
    
    public function render($data){
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title><?=md5($_REQUEST['title']) ?> LineGraph - PasteChart</title>
            <link rel="stylesheet" type="text/css" href="./src/styles/landing_page.css"/>
        <head>
        <body>
            <div class = "centered" >
            <h1><?=md5($_REQUEST['title']) ?> LineGraph - PasteChart</h1>
            
        </body>
    </html>
    <?php
    }
}
?>