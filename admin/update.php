<?php
include "inc/header.php";
include "inc/sidebar.php";
if(!isset($_GET['editpost'] )|| $_GET['editpost'] == null){
    echo "<script>window.location= 'addpost.php';</script>";
}else{
    $postid=$_GET['editpost'];
}
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
                    if(!empty($img_name)) {
                        move_uploaded_file($img_tmpname, $img_get);
                        $query = "UPDATE post SET cat='$cat',title='$title', body='$body',img='$img_get',author='$author', tags='$tags' WHERE id='$postid'";
                        // $query="INSERT INTO post (cat,title,body,img,author,tags) VALUES ('$cat','$title','$body','$img_get','$author','$tags')";
                        $post = $db->update($query);
                        if ($post) {
                            echo "Data update Insert Successfully";
                        } else {
                            echo "fuck you";
                        }
                    }else{
                        $query = "UPDATE post SET cat='$cat',title='$title', body='$body',author='$author', tags='$tags' WHERE id='$postid'";
                        // $query="INSERT INTO post (cat,title,body,img,author,tags) VALUES ('$cat','$title','$body','$img_get','$author','$tags')";
                        $post = $db->update($query);
                        if ($post) {
                            echo "Data update Insert Successfully";
                        } else {
                            echo "fuck you";
                        }

                    }

                }
                ?>
<form action="" method="post" enctype="multipart/form-data">
<?php
$query="SELECT * FROM post WHERE id='$postid' ORDER BY id DESC ";
$postcat=$db->select($query);
if($postcat){
    while($postresult = $postcat->fetch_assoc()){
        ?>

<table class="form">

<tr>
<td>
<label>Title</label>
</td>
<td>
<input type="text"   value="<?php echo $postresult['title'];?>" class="medium" name="title" />
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
<option
    <?php
    if($postresult['cat'] == $result['id']){
     ?>
        selected="selected"
        <?php
    }
    ?>
    value="<?php echo $result['id'];?>"><?php echo $result['cat'];?></option>
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
<input type="text" name="author"  value="<?php echo $postresult['author'];?>"/>
</td>
</tr>
<tr>
<td>
<label>Tags</label>
</td>
<td>
<input type="text" name="tags"  value="<?php echo $postresult['tags'];?>" />
</td>
</tr>
<tr>
<td>
<label>Upload Image</label>
</td>
<td>
    <img src="<?php echo $postresult['img'];?>" height="80px" width="200px"/>
<input type="file" name="pic" />
</td>
</tr>
<tr>
<td style="vertical-align: top; padding-top: 9px;">
<label>Content</label>
</td>
<td>
<textarea class="tinymce" name="body" >
      <?php echo $postresult['body'];?>
</textarea>
</td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" name="submit" Value="Save" />
</td>
</tr>
</table>

        <?php
    }
}
?>
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