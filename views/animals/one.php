<h2><?= $entity->name; ?></h2>
<ul>
	<li>Numéro de puce : <?= $entity->id; ?></li>
	<li>Sexe : <?= $entity->sex; ?></li>
	<li>
		Stérilisé ? 
		<?php if ($entity->steril) : ?>
			Oui
		<?php else : ?>
			Non
		<?php endif ?>
	</li>
	<li>Date de naissance : <?= $entity->dob; ?></li>
	<li>
		Propriétaire : 
		<button class="xhr owner show" _id="<?= $entity->owner->id; ?>">
		   	<?= $entity->owner->name.' '.$entity->owner->forename; ?>
		</button>
	</li>
	<li>
		Espèce :
		<button class="xhr specie show" _id="<?= $entity->race->specie->id; ?>">
			<?= $entity->race->specie->name; ?>
		</button>
	</li>
	<li>
		Race : 
		<button class="xhr race show" _id="<?= $entity->race->id; ?>">
			<?= $entity->race->name; ?>
		</button>
	</li>
</ul>
