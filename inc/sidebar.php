<!-- this is catagory section-->

<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>
        <ul>
        <?php
        $db=new Database();
        $query="SELECT * FROM cat";
       $catagori=$db->select($query);
        if($catagori){
            while($result= $catagori->fetch_assoc()){
            ?>
                <li><a href="postcat.php?catagoriy=<?php echo $result['id'];?>"><?php echo $result['cat'];?></a></li>
            <?php
            }
        }else{
            ?>
            <li>No Category Need</li>
            <?php
        }
        ?>
    </div>




    <div class="samesidebar clear">
        <h2>Olds articles</h2>
        <?php
        $for=new formet();

        $post=$db->select("SELECT * FROM post limit 4");
        if($post){
        while($result = $post->fetch_assoc()) {
            ?>
            <div class="popular clear">
                <h3><a href="post.php?id=<?php echo $result['id']; ?>"> <?php echo $result['title']; ?></a></h3>
                <img src="<?php echo $for->pic($result['img']); ?>" />
                <p><?php echo $for->short($result['body'],50);?></p>
            </div>
            <?php
        }
        }
        ?>
    </div>

</div>
<!-- this is catagory section-->