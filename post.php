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
            if(! isset($_GET['id']) || $_GET['id'] == NULL){
                header("Location: 404.php");
            }
            else{
                $id=$_GET['id'];

                $post=$db->select("SELECT * FROM post WHERE id=$id");
                if($post){
                    while( $result = $post->fetch_assoc() ){
                        ?>
            <div class="about">
                <h2><?php echo $result['title'];?></h2>
                <h4><?php echo $for->date($result['data']);?> BY <a href=""><?php echo $for->author( $result['author']);?></a></h4>
                <img src="<?php echo $for->pic($result['img']);?>" alt="post image"/>
                <p><?php echo $result['body'];
                    /*End Showing post*/
                    ?></p>
                <div class="relatedpost clear">
                    <h2>Related articles</h2>
                 <?php
                 $catid=$result['cat'];
                 $cat=$db->select("SELECT * FROM post WHERE cat=$catid  LIMIT 6");
                 if($cat){
                     while($catresult= $cat->fetch_assoc()){
                         ?>
                         <a href="post.php?id=<?php echo $catresult['id'];?>">
                             <img src="<?php echo $for->pic($catresult['img']);?>" alt="post image"/>
                         <p><?php echo $catresult['title'];?></p>
                         </a>
                         <?php
                     }
                 }
                    }
                }
            }
            ?>


				</div>
	      </div>

		</div>
        <?php include "inc/sidebar.php";?>
	</div>

<?php
include "inc/footer.php";
?>