<h1>Battle!</h1>

<p>You have encountered a <strong>giant rat!</strong></p>

<?php if ($_GET['a']): ?>
    <p>You hit the giant rat for 10 damage</p>
    <p>The giant rat hits you for 2 damage</p>
<?php endif; ?>
    
<ul>
    <li><a href="locations/forest-battle.php?a=1" class="move">Attack</a></li>
    <li><a href="locations/forest.php" class="move">Run away!</a></li>
</ul>