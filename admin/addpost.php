<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">
                    <?php
                    $for=new formet();
                    $db= new Database();
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $title=$_POST['title'];
                        $cat=$_POST['cat'];
                        $body=$_POST['body'];
                        $author=$_POST['author'];
                        $tags=$_POST['tags'];

                        $img_name=$_FILES['pic']['name'];
                        $img_size=$_FILES['pic']['size'];
                        $img_tmpname=$_FILES['pic']['tmp_name'];
                        $img_get=$for->image($img_name,$img_tmpname);
                        //move_uploaded_file($img_tmpname,$img_get);
                        if($title == "" || $cat == "" || $body == "" || $author == "" || $tags == "" || $img_name == ""){
                            echo "Filed Must not be Empty";
                        }else{
                            move_uploaded_file($img_tmpname,$img_get);
                            $query="INSERT INTO post (cat,title,body,img,author,tags) VALUES ('$cat','$title','$body','$img_get','$author','$tags')";
                            $post=$db->insert($query);
                            if($post){
                                echo "Data Insert Successfully";
                            }else{
                                echo "fuck you";
                            }
                        }

                    }
                    ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="title" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Catagory</option>
                                    <?php
                                    $query="SELECT * FROM cat";
                                    $cat=$db->select($query);
                                    if($cat){
                                        while($result = $cat->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id'];?>"><?php echo $result['cat'];?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="pic" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
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