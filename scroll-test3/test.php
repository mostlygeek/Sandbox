<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="style.css?v=1">
  <title></title>
</head>
<body>
    <div id="canvas">
        <h1>Scrolling Test 3</h1>
        <p>Simpler CSS and JavaScript. It simply sets a viewport with
            overflow: hidden, and animates the scrolling using jQuery.</p>
        <p>When new content is appended it is not visible because it is
            below scrollTop. Using jQuery we scroll down and we can
            see it.</p>
        <p>The height of the additional blocks are random to demo
            scrolling different heights.</p>
        <div id="viewport">
            <div class="blank">
                this is a block 100% height of parent
                that pushes down any real content
            </div>
        </div>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {
    var vp = $('#viewport'), count = 0;

    setInterval(function() {
        var block = $('<div class="block"></div>'),
            height = Math.round(50 + (Math.random() * 100));
            addBlockFn = this;
            
        count = count + 1;
        block.height(height);
        block.html("New block #" +count + ", height: " + height + "px");
        vp.append(block);

        vp.animate( {
            scrollTop: parseInt(vp.attr('scrollHeight'))
        }, 750, 'linear');
        // scroll to the bottom 
    }, 1000);
});
</script>
</body>
</html>