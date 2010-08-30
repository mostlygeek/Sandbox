<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="style.css?v=1">
  <title>Scroll-Test 5</title>
</head>
<body>
    <div id="canvas">
        <div id="toolbar-network">
            (network / misc toolbar)
        </div>
        <div id="toolbar-game">
            (Game bar) <br/>
            Fights: 12 / 35 | Health: 59/59 | Strength: 10 ... <br/>
            Put general game information here... 
        </div>
        <div id="viewport">
            <div class="vp-block">
            </div>
        </div>
        <div id="footer">
            footer
        </div>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {
    var viewport = $('#viewport'),
        blockCount = 0;

    $('#rndBlock').click(function() {
        blockCount = blockCount + 1;
        viewport.appendScroll("New Block: " + blockCount);
    });

    // special functionality to the viewport
    viewport.appendScroll = function(obj)
    {
        var content = $('<div></div>').addClass('content').html(obj),
            block = $('<div></div>').addClass('vp-block').html(content);

        viewport.append(block)
            .stop()
            .animate({
                scrollTop : viewport.attr('scrollHeight')
            }, 500, function() {
                // remove all the blocks that we don't need anymore
                $('div.vp-block').not(':last').remove();

                // fixes a firefox issue where removing items
                // causes the last item to be position weird.
                viewport.scrollTop(viewport.attr('scrollHeight'));
            });
        return this; 
    }

    viewport.scroll(function() {
        $('#footer').text(
            "scrollTop: "
            + viewport.scrollTop()
            + ", scrollHeight: "
            + viewport.attr('scrollHeight'));
    });

    $.get('locations/town.php', function(html) {
        viewport.appendScroll(html);
    });

    // basic logic to move around to different pages (ajax loading)
    $('a.move').live('click', function() {
        var location = $(this).attr('href');
        $.get(location, function(html) {
            viewport.appendScroll(html);
        });
        return false; 
    });
});
</script>
</body>
</html>