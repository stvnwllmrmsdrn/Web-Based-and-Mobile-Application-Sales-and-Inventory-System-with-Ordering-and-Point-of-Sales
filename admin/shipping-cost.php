<?php require_once('header.php'); ?>

<?php

if(isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['city_id'])) {
        $valid = 0;
        $error_message .= 'You must have to select a city.<br>';
    }

    if($_POST['amount'] == '') {
        $valid = 0;
        $error_message .= 'Amount can not be empty.<br>';
    } else {
        if(!is_numeric($_POST['amount'])) {
            $valid = 0;
            $error_message .= 'You must have to enter a valid number.<br>';
        }
    }

    if($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO tbl_shipping_cost (city_id,amount) VALUES (?,?)");
        $statement->execute(array($_POST['city_id'],$_POST['amount']));

        $success_message = 'Shipping cost is added successfully.';
    }

}


if(isset($_POST['form2'])) {
    $valid = 1;

    if($_POST['amount'] == '') {
        $valid = 0;
        $error_message .= 'Amount can not be empty.<br>';
    } else {
        if(!is_numeric($_POST['amount'])) {
            $valid = 0;
            $error_message .= 'You must have to enter a valid number.<br>';
        }
    }

    if($valid == 1) {

        $statement = $pdo->prepare("UPDATE tbl_shipping_cost_all SET amount=? WHERE sca_id=1");
        $statement->execute(array($_POST['amount']));

        $success_message = 'Shipping cost is updated successfully.';

    }
}
?>


<section class="content-header">
    <div class="content-header-left">
        <h1>Add Shipping Cost</h1>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <?php if($error_message): ?>
            <div class="callout callout-danger">
            
            <p>
            <?php echo $error_message; ?>
            </p>
            </div>
            <?php endif; ?>

            <?php if($success_message): ?>
            <div class="callout callout-success">
            
            <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>

            <form class="form-horizontal" action="" method="post">

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Select City <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="city_id" class="form-control select2">
                                    <option value="">Select a city</option>
                                    <?php
                                    $statement = $pdo->prepare("SELECT * FROM tbl_city ORDER BY city_name ASC");
                                    $statement->execute();
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {


                                        $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE city_id=?");
                                        $statement->execute(array($row['city_id']));
                                        $total = $statement->rowCount();
                                        if($total) {
                                            continue;
                                        }

                                        ?>
                                        <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    title="Numbers only" class="form-control" name="amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
</section>




<section class="content-header">
	<div class="content-header-left">
		<h1>View Shipping Costs</h1>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
			        <th>City Name</th>
                    <th>City Shipping Cost Amount</th>
			        <th>Action</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * 
                                        FROM tbl_shipping_cost t1
                                        JOIN tbl_city t2 
                                        ON t1.city_id = t2.city_id 
                                        ORDER BY t2.city_name ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr>
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $row['city_name']; ?></td>
                        <td>₱<?php echo formatMoney ($row['amount'], true); ?></td>
	                    <td>
	                        <a href="shipping-cost-edit.php?id=<?php echo $row['shipping_cost_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                        <!--<a href="#" class="btn btn-danger btn-xs" data-href="shipping-cost-delete.php?id=<?php echo $row['shipping_cost_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>-->
	                    </td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div> 

      <h4 style="background: #dd4b39;color:#fff;padding:10px 20px;">NOTE: If a city does not exist in the above list, the following city shipping cost will be applied upon that.</h4>

</section>


<section class="content-header">
    <div class="content-header-left">
        <h1>Shipping Cost for All City</h1>
    </div>
</section>

<section class="content">

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost_all WHERE sca_id=1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {
        $amount = $row['amount'];
    }
    ?>

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="" method="post">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount" value="<?php echo $amount; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form2">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>