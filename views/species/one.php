<h2><?= $entity->name ?></h2>
<ul>
	<li>Animaux :</li>
	<ul>
		<?php foreach($entity->animals as $animal): ?>
			<li style="list-style-type: square">
				<button class="xhr animal show" _id="<?= $animal->puce; ?>">
					<?= $animal->name; ?>
				</button>
			</li>
		<?php endforeach; ?>
	</ul>
</ul>