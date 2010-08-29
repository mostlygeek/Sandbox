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
        <div id="menu">
            <button id="btnImg">add image</button> |
            <button id="btnPre">add pre formatted text</button> |
            <button id="btnHtml">add some HTML</button>
            <p id="out">(scroll debug info to go here)</p>
        </div>
        <div id="viewport">
            <div class="blank"><!-- used as a space to fake bottom scrolling --></div>
        </div>
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

    
    // this causes weird jumping animations... seems like unnecessary
    // optimization.. even adding lots of content, doesn't take up that
    // much more RAM on my system

    /*
    // clean up invisible block items
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

   // use a custom trigger to append and scroll content.
   // I can probably just stick a function on this object I guess..
    viewport.bind('append', function(e, obj) {
        var block = $('<div class="block"></div>').html(obj);
        viewport.append(block);
        viewport
            .stop() // !!! IMPORTANT !!! stop animating, animation looks much better
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