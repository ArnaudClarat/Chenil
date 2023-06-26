<form method="POST">
	<label for="id">Numéro de puce : </label>
	<input type="number" name="id">
	<b>Be carefull when typing this!</b>
	<br>
	<label for="name">Nom :</label>
	<input type="text" name="name">
	<br>
	<label for="sex">Sexe :</label>
	<select name="sex">
		<option value="M">Mâle</option>
		<option value="F">Femelle</option>
	</select>
	<br>
	<label for="steril">Stérilisé :</label>
	<select name="steril">
		<option value="0">Non</option>
		<option value="1">Oui</option>
	</select>
	<br>
	<label for="dob">Date de naissance :</label>
	<input type="date" name="dob">
	<br>
	<label for="owner">Propriétaire :</label>
    <select name="owner">
        <?php foreach ($owners as $owner) : ?>
            <option value="<?= $owner->id; ?>">
                <?= $owner->name.' '.$owner->forename; ?>
            </option>
        <?php endforeach; ?>
    </select>
	<br>
	<label for="specie">Espèce :</label>
	<select name="specie" id="specie">
		<?php foreach ($species as $specie) : ?>
            <option value="<?= $specie->id; ?>">
                <?= $specie->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
	<br>
	<label for="race">Race :</label>
    <select name="race" id="race">
        <?php foreach ($races as $race) : ?>
            <option	value="<?= $race->id; ?>">
                <?= $race->name; ?>
            </option>
        <?php endforeach; ?>
    </select>
	<br>
	<button class="xhr animal store"?>Enregistrer</button>
</form>