<?php

include "inc/header.php";
include "config/config.php";
include "lib/Database.php";
include "helpers/formet.php";

$db=new Database();
$for= new formet();
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
<?php
if(! isset($_GET['search']) || $_GET['search'] == NULL){
    header("Location: 404.php");
} else{
    $search=$_GET['search'];

    $query="SELECT * FROM post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";

    $post=$db->select($query);
    if($post){
        while($result=$post->fetch_assoc()){
            ?>
            <div class="samepost clear">
                <h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
                <h4><?php echo $for->date($result['data']);?>, By <a href=""><?php echo $for->author( $result['author']);?></a></h4>
                <img src="<?php echo $for->pic($result['img']);?>" alt="post image"/>
                <p><?php echo $for->short($result['body'],400);?></p>
                <div class="readmore clear">
                    <a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
                </div>
            </div>
<?php
        }
    }else{
        echo "<p>This related post is not posted</p>";
    }
}
?>


    </div>
    <!-- this is catagory section-->
    <?php include "inc/sidebar.php";?>
    <!-- this is catagory section-->
</div>
<?php

include "inc/footer.php";
?>
