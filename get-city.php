
<?php
include("admin/inc/config.php");
if($_POST['id'])
{
	$id = $_POST['id'];
	
	$statement = $pdo->prepare("SELECT * FROM tbl_city WHERE state_id=?");
	$statement->execute(array($id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	?><option value="">Select City</option><?php						
	foreach ($result as $row) {
		?>
        <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
        <?php
	}
}