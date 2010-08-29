<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="style.css?v=1">
  <title>Scroll Test 4</title>
</head>
<body>
    <div id="canvas">
        <h1>Rich Scrolling Content</h1>
        <div id="viewport">
            <div class="blank"><!-- used as a space to fake bottom scrolling --></div>
        </div>
        <p id="out">--</p>
        <button id="btnImg">image</button> | <button id="btnPre">pre-text</button> | <button id="btnHtml">html</button>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {
    var viewport = $('#viewport');

    // set up auto scrolling
    viewport.scroll(function() {
        $('#out').text("scrollTop: " + viewport.scrollTop() +
            " | scrollHeight: " + viewport.attr('scrollHeight'));
    });

    // clean up invisible block items
    // this causes weird jumping animations... seems like unnecessary
    // optimization

    /*
    setInterval(function() {
        viewport.children('div.block').each(function(i, el) {
            var o = $(el);
            //console.log(o.position().top);
            if (o.position().top <= -1000) {
                viewport.trigger('append', ["<h3>Removed element from top</h3>"]);
                o.remove();
            }
        });
    }, 250);
    */
    viewport.bind('append', function(e, obj) {
        var block = $('<div class="block"></div>').html(obj);
        viewport.append(block);
        viewport
            .stop() // !! KEY!!! stop animating the last scroll
            .animate({
                scrollTop : viewport.attr('scrollHeight')
            }, 1000);
    });

    $('#btnPre').click(function() {
        $.get('text.txt', function(text) {
            var obj = $('<pre></pre>').text(text);
            viewport.trigger('append', [obj]);
        });
    });

    $('#btnImg').click(function() {
        var obj = $('<img>')
            .attr('src', 'dragon1.jpg')
            .attr('height', 450)
            .attr('width', 550);
        viewport.trigger('append', [obj]);
    });

    $('#btnHtml').click(function(){
        $.get('text.html', function(html) {
            viewport.trigger('append', [html]);
        })
    });
});
</script>

</body>
</html>