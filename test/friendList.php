<?php
	if ($show == 0) {
	require_once("DBClass.php");
	// $uid = 3;

	$db = new DataBase();

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
			<?php echo $db->getUserName($row['uidA']); ?>
		</option>
	<?php } ?>
	<?php foreach($arrayB as $row){ ?>
		<option value="<?php echo $row['uidB']; ?>">
			<?php echo $db->getUserName($row['uidB']); ?>
		</option>
	<?php } ?>
</select>
</div>

<?php }else{ ?>

<div>
</div>

<?php } ?>