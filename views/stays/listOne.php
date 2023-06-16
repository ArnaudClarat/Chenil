<h2><?= $entity->id; ?></h2>
<ul>
	<li>Animal : <?= $entity->animal; ?></li>
	<li>Specie, race : <?= $entity->animal->specie; ?><?= $entity->animal->race?></li>
</ul>
