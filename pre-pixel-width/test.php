<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
<style>
/* We need this style otherwise <pre> renders as a block */
pre.text {
    display: inline-block;
    font-size: 14px;
    padding: 0px;
}
</style>
</head>
<body id="body">
    <h1>Widths of pre tags with diff amount of Ms in them.</h1>

    <p>Useful for those times when making an fauxASCII terminal in a fixed
        sized canvas :)</p>

    <p>pre tag, font-size = 14px (pixels)</p>
    <p>Hmm... browser *zoom* affects width.</p>

    <h2>Demo pre</h2>
<pre class="text">=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~
]                        Bringing Back the Olde Skool                          [
~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=
[                                                                              ]
]     (a) Apples                              (d) Dates                        [
[     (b) Bananas                             (e) Eggs                         ]
]     (c) Carrots                             (f) Fries                        [
[                                                                              ]
]                                                                              [
~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=
[                       Who doesn't love ASCII Art?!                           ]
~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=~=</pre>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {
   var pre, // i'll get to YOU later :b
       body = $('#body'),
       chars = [40, 50, 60, 70, 80];

   for (var i in chars) {
       pre = $('<pre class="text"></pre>');
       for (var c=0; c < chars[i]; c++) {
           // http://en.wikipedia.org/wiki/Em_(typography)
           pre.append('M');
       }
       body
        .append("<h3>" + chars[i] + " chars wide</h3>")
        .append(pre);
   }

   // add in the calculated pixel widths
    $('pre').each(function(i, e) {
        $(this).before("pre width: " + $(this).css('width') + '<br/>');
    });
});
</script>
</body>
</html>