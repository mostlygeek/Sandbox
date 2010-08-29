<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="style.css?v=1">
  <title></title>
</head>
<body>
    <h1>Test: Scrolling Text From Bottom</h1>
    <div id="canvas">
        <h2>760px wide canvas window</h2>
        <div id="viewport"><pre id="content"></pre></div>
    </div>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {
    var content = $('#content'),
        count = 0, 
        interval; 

    // stupid? way to animate adding lines to the bottom of the viewport
    interval = setInterval(function() {
        count = count + 1;
        content
            .append("Line: " + count + "| ")
            .append("scrollHeight: "  + content.attr('scrollHeight') + 
                "px, #content height: " + content.css("height") + "\n")
            .scrollTop(content.attr('scrollHeight'));
    }, 100);
}) ;
</script>
</body>
</html>