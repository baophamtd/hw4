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
            <title><?=$data['md5Hash'] ?> LineGraph - PasteChart</title>
            <link rel="stylesheet" type="text/css" href="./src/styles/landing_page.css"/>
        <head>
        <body>
            <div class = "centered" >
            <h1><?=$data['md5Hash'] ?> LineGraph - PasteChart</h1>
            
        </body>
    </html>
    <?php
    }
}
?>