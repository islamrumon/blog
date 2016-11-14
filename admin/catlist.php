<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
						<tbody>
						<?php
						$db= new Database();
						$for= new formet();


						/*Delete catagory */

						if(isset($_GET['delete'])){
							$delete=$_GET['delete'];
							$delete=$for->validation($delete);
							$delete=mysqli_real_escape_string($db->link,$delete);
							$query="DElETE FROM cat WHERE id='$delete'";
							//$sql = "DELETE FROM MyGuests WHERE id=3";
							$delete=$db->delete($query);
							if($delete){
                                echo "Delete Successfully";
							}else{
								echo "Action Load Failde";
							}
						}

						/*Query the all catagory list*/
						$query="SELECT * FROM cat ORDER BY id DESC";
						$cat=$db->select($query);
						if($cat){
							$i=0;
							while($result = $cat->fetch_assoc()){
								$i++;
								?>
								<tr class="odd gradeX">
									<td><?php echo $i;?></td>
									<td><?php echo $result['cat'];?></td>
									<td><a href="updatecat.php?edit=<?php echo $result['id'];?>">Edit</a> || <a href="?delete=<?php echo $result['id'];?>">Delete</a></td>
								</tr>
								<?php
							}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
 <?php
include "inc/footer.php";
?>