<?php include('../views/layout/header.php'); ?>
		<table>
		    <thead>
		        <tr>
		            <th>Name</th>
		            <th>Owner</th>
		            <th>Stays</th>
		            <th>Options</th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach($entities as $animal): ?>
		            <tr>
		                <td><button class="xhr animal show" _id="<?= $animal->puce; ?>"><?= $animal->name; ?></button></td>
		                <td><button class="xhr owner show" _id="<?= $animal->owner->id; ?>">
		                	<?= $animal->owner->name.' '.$animal->owner->forename; ?>
		                </button></td>
		                <td><button class="xhr stays show" _id="<?= $animal->puce; ?>">Stays</button>
		                <td>
		                	<button class="xhr animal delete" _id="<?= $animal->puce; ?>">Delete</button>
		                	<button class="xhr animal edit" _id="<?= $animal->puce; ?>">Edit</button>
		                </td>
		            </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
<?php include('../views/layout/footer.php'); ?>