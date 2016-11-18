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
            <script type="text/javascript" src="chart.js"></script>
            <script type="text/javascript">
if (typeof window.testFileIsLoaded == 'undefined') {
    console.log("File is not loaded");
}

var values = [100, 300, 200];
var values2 = [242, 450, 640];
var values3 = [223, 350, 620];

var graph = new Chart("board",
    {"Jan":values, "Feb":values2, "March":values3}, 
    {"title":"Test Chart - Month v Value"});
console.log("ran");
//graph.draw();
</script>
        </body>
    </html>
    <?php
    }
}
?>