<?php
namespace threemuskateers\hw4\views;

require_once 'vendor/autoload.php';


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
var display = '<?php echo $data["display"];?>'
if(display == "json"){
        document.write('<?php echo $data["content"];?>');
    }
else if(display == "jsonp"){
    document.write('<?php echo $data["arg3"];?>(<?php echo $data["content"];?>);');

    }else if(display == "xml"){
	document.write('<?php echo '&lt;Chart Title="'; echo $data['title']; echo'"&gt'; echo '<br>'?>');
	for (var key in json) {
		document.write('&ltX-value Label="'+key +'"&gt<br>');
   		for(var value in json[key]){
        	document.write('&ltValue&gt'+json[key][value]+'&lt/Value&gt'+'<br>');
   		}
   		document.write('&lt/X-value&gt<br>');
	}
	document.write('<?php echo '&lt;/Chart&gt'?>');
    }
    else{
var graph = new Chart("board",
    json, 
    {"title":'<?php echo $data["title"];?>'}); 
    if(display == "LineGraph"){   
        graph.draw("LineGraph");
    }
    else if(display == "PointGraph"){
        graph.draw("PointGraph");
    }
    else if(display == "Histogram"){
        graph.draw("Histogram");
    }
    }
    

</script>
</div>
<div>

</div>

</div>
<p>Share your chart and data at the URLs below:</p>
<p></p>
<p>As a LineGraph:</p>
<p><?php echo BASE_URL;?>c=chart&a=show&arg1=LineGraph&arg2=<?=$data['md5Hash'] ?></p>
<p>As a PointGraph:</p>
<p><?php echo BASE_URL;?>c=chart&a=show&arg1=PointGraph&arg2=<?=$data['md5Hash'] ?></p>
<p>As a Histogram:</p>
<p><?php echo BASE_URL;?>c=chart&a=show&arg1=Histogram&arg2=<?=$data['md5Hash'] ?></p>
<p>As XML data:</p>
<p><?php echo BASE_URL;?>c=chart&a=show&arg1=xml&arg2=<?=$data['md5Hash'] ?></p>
<p>As JSON data:</p>
<p><?php echo BASE_URL;?>c=chart&a=show&arg1=json&arg2=<?=$data['md5Hash'] ?></p>
<p>As JSONP data:</p>
<p><?php echo BASE_URL;?>c=chart&a=show&arg1=jsonp&arg2=<?=$data['md5Hash'] ?>&arg3=foo</p>
        </body>
    </html>
    <?php
    }
}
?>