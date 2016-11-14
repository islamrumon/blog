<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                   <?php
                   $db=new Database();
                   $for=new formet();
                   if($_SERVER['REQUEST_METHOD'] == 'POST') {
                       $name = $_POST['name'];
                       $name=ucfirst($name);
                       $name = $for->validation($name);
                       $name = mysqli_real_escape_string($db->link, $name);
                       if (empty($name)) {
                           echo "Insert valide value";
                       } else {
                           $query = "INSERT INTO cat(cat) VALUES('$name')";
                           $result = $db->insert($query);
                           if ($result) {
                               echo "Insert Successfully";
                           } else {
                               echo "Sorry Data Is not Insert";
                           }
                       }

                   }
                   ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name='name' placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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