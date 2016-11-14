<?php
include "config/config.php";
include "lib/Database.php";
include "inc/header.php";
include "inc/slider.php";
include "helpers/formet.php"
?>


    <div class="contentsection contemplete clear">
        <div class="maincontent clear">
            <?php
            $db=new Database();
            $for= new formet();

            if(! isset($_GET['catagoriy']) || $_GET['catagoriy'] == NULL){
                header("Location: 404.php");
            }else {
                $cat = $_GET['catagoriy'];

                /*pagenatino*/
                $per_page = 4;/*proti page ay kotogula post show korbay*/
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start_page = ($page - 1) * $per_page;/*kota taika page a post dakano suru hoba*/

                /*pagenatino end*/


                /*print the post*/
                $query = "SELECT * FROM post WHERE cat=$cat limit $start_page,$per_page";/*This is reverse query*/
                if ($post = $db->select($query)) {
                    while ($result = $post->fetch_assoc()) {

                        ?>
                        <div class="samepost clear">
                            <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a>
                            </h2>
                            <h4><?php echo $for->date($result['data']); ?>, By <a
                                    href=""><?php echo $for->author($result['author']); ?></a></h4>
                            <img src="<?php echo $for->pic($result['img']); ?>" alt="post image"/>
                            <p><?php echo $for->short($result['body'], 400); ?></p>
                            <div class="readmore clear">
                                <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }

            /*print post is end */
            ?>


        </div>
        <!-- this is catagory section-->
        <?php include "inc/sidebar.php";?>
        <!-- this is catagory section-->
    </div>
<?php
/*this is footer section*/
include "inc/footer.php";
?>