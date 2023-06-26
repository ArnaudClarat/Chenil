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
		                <td><button class="xhr animal show" _id="<?= $animal->id; ?>"><?= $animal->name; ?></button></td>
		                <td><button class="xhr owner show" _id="<?= $animal->owner->id; ?>">
		                	<?= $animal->owner->name.' '.$animal->owner->forename; ?>
		                </button></td>
		                <td><button class="xhr stays show" _id="<?= $animal->id; ?>">Stays</button>
		                <td>
		                	<button class="xhr animal edit" _id="<?= $animal->id; ?>">Edit</button>
		                	<button class="xhr animal delete" _id="<?= $animal->id; ?>">Delete</button>
		                </td>
		            </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
<button class="xhr animal create">Add a new animal</button>
<?php include('../views/layout/footer.php'); ?>