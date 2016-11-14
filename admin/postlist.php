<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">
					<?php
					if(isset($_GET['delete'])){
                       $delete=$_GET['delete'];
						$se_query="SELECT * FROM post WHERE id='$delete'";
						$post=$db->select($se_query);
						if($post){
							while($result = $post->fetch_assoc()){
								$get_img=$result['img'];
								unlink($get_img);
							}
						}
						$query="DElETE FROM post WHERE id='$delete'";
						$post=$db->delete($query);
						if($post){
							echo "<script>alert('Data Deleted Successfully');</script>";
							echo "<script>window.location = 'postlist.php';</script>";

						}else{
							echo "<script>alert('Data not deleted');</script>";
						}
					}
					?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="12%">Post Title</th>
							<th width="15%">Description</th>
							<th width="10%">Category</th>
							<th width="15%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="13%">Action</th>
						</tr>
					</thead>
						<tbody>
						<?php
						$db=new Database();
						$for=new formet();
						$query="SELECT post.*,cat.cat FROM post INNER JOIN cat on post.cat =cat.id ORDER BY post.title DESC ";
						$post=$db->select($query);
						if($post){
							$i=0;
							while($result = $post->fetch_assoc()){
							$i++;
								?>
								<tr class="odd gradeX">
									<td><?php echo $i;?></td>
									<td><?php echo $result['title'];?></td>
									<td><?php echo $for->short($result['body'],80);?></td>
									<td class="center"><?php echo $result['cat'];?></td>
									<td><img src="<?php echo $result['img'];?>" height="40px" width="60px" /></td>
									<td><?php echo $result['author'];?></td>
									<td><?php echo $result['tags'];?></td>
									<td class="center"><?php echo $for->date($result['title']);?></td>
									<td><a href="update.php?editpost=<?php echo $result['id'];?>">Edit</a> || <a href="?delete=<?php echo $result['id'];?>">Delete</a></td>
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
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>

<?php
include "inc/footer.php";
?>
