<?php
namespace threemuskateers\hw4\views;
require_once "View.php";


class LineGraphPageView extends View{

    public function __construct(){
    
    }
    
    public function render($data){
    
    $input = json_encode($data['array']);
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title><?=$data['md5Hash'] ?> LineGraph - PasteChart</title>
            <link rel="stylesheet" type="text/css" href="./src/styles/landing_page.css"/>
        <head>
        <body id="board">
            <div class = "centered" >
            <h1><?=$data['md5Hash'] ?> LineGraph - PasteChart</h1>
            <script type="text/javascript" src="chart.js"></script>
            <script type="text/javascript">
if (typeof window.testFileIsLoaded == 'undefined') {
    console.log("File is not loaded");
}

var data = '<?php echo $input;?>';
//console.log(data);
var json = JSON.parse(data);  
//console.log(json);
for (var key in json) {
   for(var value in json[key]){
        json[key][value] = parseInt(json[key][value]);
   }
}

var graph = new Chart("board",
    json, 
    {"title":"Test Chart - Month v Value"});
graph.draw();
</script>
        </body>
    </html>
    <?php
    }
}
?>