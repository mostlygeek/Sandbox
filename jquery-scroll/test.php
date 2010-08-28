<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <title>Test Auto-Scrolling</title>

        <style type="text/css">
        #chatbox {
            height: 250px;
            width: 760px;
            overflow: hidden;
            border: 1px solid black;
            padding: 1em;
        }
        </style>

    </head>
    <body>
        <h1>Auto Content Scrolling (IRC style)</h1>
        <pre id="chatbox"></pre>
        <p>View the source to see hose this works. As content is added to the
           #chatbox element, jQuery will automatically scroll to the bottom of it. </p>
        <p>Using overflow:hidden, we can create a viewport where content scrolls in nicely.</p>.
        
<script type="text/javascript">
$(function() {
    var c = $('#chatbox');

    setInterval(function() {
        c.append("Now: " + (new Date()) + "\n").scrollTop(c.attr('scrollHeight')); 
    }, 100);
});
</script>

    </body>
</html>
