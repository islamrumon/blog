<?php
include "inc/header.php";
include "inc/sidebar.php";

if(! isset($_GET['edit'])|| $_GET['edit'] == NULl){
    header("Loaction:catlist.php");
}else{
    $id=$_GET['edit'];
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">
            <?php

            $db= new Database();
            $for= new formet();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $cat=$_POST['cat'];
                $query="UPDATE cat SET cat='$cat' WHERE id='$id'";
                $catgory=$db->update($query);
                if($catgory){
                    echo "Catagory Is updated";
                }else{
                    echo "Sorry CAtagory Update is Faild";
                }

            }
                 /*Select Query*/
                $query="SELECT * FROM cat WHERE id='$id'";
                $cat=$db->select($query);
                if($cat) {
                    while($result = $cat->fetch_assoc()) {
                        ?>
                        <form action="" method="post">
                            <table class="form">
                                <tr>
                                    <td>
                                        <p>Catagory ID =<?php echo $result['id'];?></p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="cat" value="<?php echo $result['cat'];?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="" value=" SEND" />
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <?php

                    }
                }
?>

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

