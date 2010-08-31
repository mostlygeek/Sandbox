<h1>The Healer's Hut</h1>

<?php if ($_GET['h'] == 's'): ?>

<p>The Healer has healed you for 5 hit points!</p>

<?php elseif ($_GET['h'] == 'f'): ?>

<p>The Healer has fully healed you! You feel full of energy to battle monsters once more!</p>
<?php endif;?>

<ul>
    <li><a href="locations/healers-hut.php?h=s" class="move">Small heal</a> for 5 gold</li>
    <li><a href="locations/healers-hut.php?h=f" class="move">Full heal</a> for 15 gold</li>
    <li><a href="locations/forest.php" class="move">Return to Forest</a>
</ul>