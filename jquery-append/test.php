<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Demo. of child elements sending messages to parents using DOM Level 2 Event Delegation</title>
<style type="text/css">
.block-parent {
    border: 1px solid black;
    padding: 1em;
    width: 300px;
}
</style>
</head>
<body>
    <h1>Demo. Message Passing w/ DOM lvl2 Event Propagation</h1>
    <button class="addElement">Add a Drawer</button>

    <div id="container">

    </div>

<script id="template" type="text/template">
    <div class="drawer closeable">
        <p>Hi I'm a Drawer. Added to the DOM at: %%time%%.</p>
        <p>You can <a href="#" class="open-drawer">open me</a>, or close me with a <a href="#close" class="close">link</a> or a <button class="close">button</button>.</p>
    </div>
</script>
<script id="template2" type="text/template">
    <div class="drawer-contents closeable">
        <p>Drawer Contents... Ohhh!</p>
        <ol>
            <li>time: %%time%%</li>
            <li><a href="#" class="close">close me</a></li>
            <li>three</li>
        </ol>
    </div>
</script>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {

   var template = $('#template'),
       template2 = $('#template2');
       
   $('button.addElement').click(function() {
       var time = (new Date()).getTime(),
           src  = template.text();

        src = src.replace("%%time%%", time);
        console.log(src);
        $('#container').append(src);
   });

   $('.closeable').live('CLOSE_DRAWER', function(e) {
       var me = $(this); // keep context right in closures
       e.stopImmediatePropagation();

       me.slideUp(function() {
           me.remove();
       });

   });

   $('.drawer').live('OPEN_DRAWER', function(e) {
       var me = $(this),
           newEl = $('<div class="closeable">').html(template2.text().replace("%%time%%", (new Date()).getTime()));
       e.stopImmediatePropagation();
       me.after(newEl);
   });


   $('.open-drawer').live('click', function() {
        $(this).trigger('OPEN_DRAWER');
        return false;
   });

   $('.close').live('click', function() {
       $(this).trigger('CLOSE_DRAWER');
       return false;
   });
});
</script>
</body>
</html>