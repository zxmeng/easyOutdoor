<?php
	if ($show == 0) {
		// if the friend list has not being shown, then show it
		require_once("DBClass.php");
		require_once("UserClass.php");

		$db = new DataBase();
		$ur = new User();

		$sqlB = "SELECT uidB
				 FROM Friend
				 WHERE uidA = $uid";
		$sqlA = "SELECT uidA
				 FROM Friend
				 WHERE uidB = $uid";
		$resA = $db->query($sqlA);
		$resB = $db->query($sqlB);

		$arrayA = $resA->fetch_all(MYSQLI_ASSOC);
		$arrayB = $resB->fetch_all(MYSQLI_ASSOC);

?>
	<div>
	<br>
	<select name="friendlist" onchange="atUser(this.value)">
		<!-- option to not at anyone -->
		<option value="0">Click here to choose one friend to mention...</option>
		<!-- list all the user's friends -->
		<?php foreach($arrayA as $row){ ?>
			<option value="<?php echo $row['uidA']; ?>">
				<?php echo $ur->getUserName($row['uidA']); ?>
			</option>
		<?php } ?>
		<?php foreach($arrayB as $row){ ?>
			<option value="<?php echo $row['uidB']; ?>">
				<?php echo $ur->getUserName($row['uidB']); ?>
			</option>
		<?php } ?>
	</select>
	</div>

<?php }else{ ?>

	<!-- if the friend list has been shown, then hide it -->
	<div>
	</div>

<?php } ?>