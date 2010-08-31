<h1>Eastern Fields</h1>

<p>The stench of death fills your nostrils as you step into the Eastern Fields. 
    Bodies of warriors are strewn across the fields. A fierce battle has taken place here
    not long ago...</p>

<?php if ($_GET['s']):?>
<p>You search through the bodies finding a: <br/>
    <strong>Rare Item of Massive Destruction</strong>
</p>
<?php endif;?>

<ul>
    <?php if ($_GET['s'] < 5): ?>
    <li><a href="locations/eastern-fields.php?s=<?php echo $_GET['s'] + 1?>" class="move">Search Bodies</a></li>
    <?php endif;?>
    <li><a href="locations/town.php" class="move">Return to Town</a></li>
</ul>