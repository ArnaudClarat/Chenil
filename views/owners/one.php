<h2><?= $entity->name.' '.$entity->forename; ?></h2>
<ul>
	<li>Date de naissance : <?= $entity->dob; ?></li>
	<li>Adresse email : <?= $entity->mail; ?></li>
	<li>Numéro de téléphone : <?= $entity->phone ?></li>
	<li>Animaux :</li>
	<ul>
		<?php foreach($entity->animals as$animal): ?>
			<li style="list-style-type: square">
				<button class="xhr animal show" _id="<?= $animal->puce; ?>">
					<?= $animal->name; ?>
				</button>
			</li>
		<?php endforeach; ?>
	</ul>
</ul>
