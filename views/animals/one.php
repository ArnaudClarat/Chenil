<h2><?= $entity->name; ?></h2>
<ul>
	<li>Numéro de puce : <?= $entity->puce; ?></li>
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
		<button class="xhr show" _id="<?= $entity->owner->id; ?>">
		   	<?= $entity->owner->name.' '.$entity->owner->forename; ?>
		</button>
	</li>
	<li>
		Espèce : 
		<button class="xhr show" _id="<?= $entity->specie->id; ?>">
			<?= $entity->specie->name; ?>
		</button>
	</li>
	<li>
		Race : 
		<button class="xhr show" _id="<?= $entity->race->id; ?>">
			<?= $entity->race->name; ?>
		</button>
	</li>
</ul>
