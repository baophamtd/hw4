<?php
namespace threemuskateers\hw4\views;
require 'vendor/autoload.php';


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
             <style type="text/css">
#board{
	width: 800px;
	height: 800px;
	border: 1px solid #000000;
}

</style>
        <head>
        <body>
            <div class = "centered" >
            <h1><?=$data['md5Hash'] ?> LineGraph - PasteChart</h1>
            <div id="board">
            <script type="text/javascript" src="chart.js"></script>
            <script type="text/javascript">
if (typeof window.testFileIsLoaded == 'undefined') {
    console.log("File is not loaded");
}

var data = '<?php echo $data["content"];?>';
var json = JSON.parse(data);  
for (var key in json) {
   for(var value in json[key]){
        json[key][value] = parseFloat(json[key][value]);
   }
}

var graph = new Chart("board",
    json, 
<<<<<<< HEAD
    {"title":"Test Chart - Month v Value"}); 
    var display = '<?php echo $data["display"];?>'
    if(display == "LineGraph")   
        graph.draw();
    else if(display == "PointGraph")
        var counter = Object.keys(data)[0].length;
        graph.drawPointGraph(counter);

=======
    {"title":"Test Chart - Month v Value"});
//graph.draw("LineGraph");
graph.draw("Histogram");
>>>>>>> ea0e950cdfb7aa781e2c035052553e108a3156e9
</script>
<script type="text/javascript">
</script>
</div>
<div>

</div>

</div>
<p>As a LineGraph:</p>
<p>localhost/hw4/index.php?c=chart&a=show&arg1=LineGraph&arg2=<?=$data['md5Hash'] ?></p>
<p>As a PointGraph:</p>
<p>localhost/hw4/index.php?c=chart&a=show&arg1=PointGraph&arg2=<?=$data['md5Hash'] ?></p>
<p>As a Histogram:</p>
<p>localhost/hw4/index.php?c=chart&a=show&arg1=Histogram&arg2=<?=$data['md5Hash'] ?></p>
        </body>
    </html>
    <?php
    }
}
?>