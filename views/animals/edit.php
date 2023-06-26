<h2><?= $entity->name; ?></h2>
<form method="POST">
	<input type="hidden" name="id" value="<?= $entity->id; ?>">
	<label for="name">Nom :</label>
	<input type="text" name="name" value="<?= $entity->name; ?>" placeholder="<?= $entity->name; ?>">
	<br>
	<label for="sex">Sexe :</label>
	<select name="sex">
		<option value="M" <?= ($entity->sex === 'M') ? 'selected' : ''; ?>>Mâle</option>
		<option value="F" <?= ($entity->sex === 'F') ? 'selected' : ''; ?>>Femelle</option>
	</select>
	<br>
	<label for="steril">Stérilisé :</label>
	<select name="steril">
		<option value="0" <?= ($entity->steril === 0) ? 'selected' : ''; ?>>Non</option>
		<option value="1" <?= ($entity->steril === 1) ? 'selected' : ''; ?>>Oui</option>
	</select>
	<br>
	<label for="dob">Date de naissance :</label>
	<input type="date" name="dob" value="<?= $entity->dob; ?>" placeholder="<?= $entity->dob; ?>">
	<br>
	<label for="parent">Parent :</label>
	<select name="parent">
		<option value="0">Inconnu</option>
		<?php foreach ($animals as $animal) : ?>
            <option value="<?= $animal->id; ?>" <?= ($entity->parent->id === $animal->id) ? 'selected' : ''; ?>>
                <?= $animal->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
	<label for="owner">Propriétaire :</label>
    <select name="owner">
        <?php foreach ($owners as $owner) : ?>
            <option value="<?= $owner->id; ?>" <?= ($entity->owner->id === $owner->id) ? 'selected' : ''; ?>>
                <?= $owner->name.' '.$owner->forename; ?>
            </option>
        <?php endforeach; ?>
    </select>
	<br>
	<label for="specie">Espèce :</label>
	<select name="specie" id="specie">
		<?php foreach ($species as $specie) : ?>
            <option 
            	value="<?= $specie->id; ?>" 
            	<?php if($entity->race->specie->id === $specie->id) {echo "selected";} ?>>
                <?= $specie->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
	<br>
	<label for="race">Race :</label>
    <select name="race" id="race">
        <?php foreach ($races as $race) : ?>
            <option
            	value="<?= $race->id; ?>"
            	<?php if($entity->race->id === $race->id) {echo "selected";} ?>>
                <?= $race->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
	<br>
	<button class="xhr animal update" _id="<?= $entity->id; ?>">Enregistrer</button>
</form>