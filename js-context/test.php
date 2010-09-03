<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <script src="context.js"></script>
</head>
<body>
    <h1>Javascript Context Test</h1>
    
    <h2>context.js</h2>
    <pre><?php echo file_get_contents('context.js'); ?></pre>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
var fn = function() {
    console.log('boom');
}

jsReady(function() {
    console.log('callback 1');
});

jsReady(function() {
    console.log('callback 2');
});

jsReady(function() {
    console.log('callback 3');
});

console.log(jsReady.callbacks);
jsReady.go();
console.log(jsReady.callbacks);
</script>
</body>
</html>