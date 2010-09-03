<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Test Hiding Unity Object with overflow:hidden</title>
  <link rel="stylesheet" href="style.css?v=1">
</head>
<body>
    <div id="canvas">
        <h1>Unity3D Content Hiding</h1>
        <p>This demo shows that using overflow:hidden we can show / hide
            unity content</p>
        <div id="hidebox">
            <div id="unity-content" class="box">
                <p><a href="#hide" id="hideUnity">Hide Unity</a></p>
                <object id="UnityObject" classid="clsid:444785F1-DE89-4295-863A-D46C3A781394" width="600" height="450" codebase="http://webplayer.unity3d.com/download_webplayer-2.x/UnityWebPlayer.cab#version=2,0,0,0">
                    <param name="src" value="kaboom.unity3d" />
                    <embed id="UnityEmbed" src="kaboom.unity3d" width="600" height="450" type="application/vnd.unity" pluginspage="http://www.unity3d.com/unity-web-player-2.x" />
                </object>
            </div>
            <div id="hidden-content" class="box">
                <h2>Woot. The unity content should be hidden.</h2>
                <a href="#click" id="showUnity">Show Unity Content</a>
            </div>
        </div>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(function() {
   var hb = $('#hidebox'),
       animate = true;
   $('#hideUnity').click(function() {
        if (animate) {
            hb.stop().animate({
                scrollTop : hb.attr('scrollHeight')
            }, 1000);
        } else {
            hb.scrollTop(hb.attr('scrollHeight'));
        }
   });
   $('#showUnity').click(function() {
        if (animate) {
            hb.stop().animate({
                scrollTop : 0
            }, 1000);
        } else {
            hb.scrollTop(0);
        }
   });
});
</script>
</body>
</html>