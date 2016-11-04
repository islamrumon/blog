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
			$query="SELECT * FROM post";
			if($post=$db->select($query)){
				while($result =$post->fetch_assoc()){

					?>
					<div class="samepost clear">
						<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
						<h4><?php echo $for->date($result['data']);?>, By <a href=""><?php echo $for->author( $result['author']);?></a></h4>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p><?php echo $result['body'];?></p>
						<div class="readmore clear">
							<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
						</div>
					</div>
					<?php
				}
			} else{
				echo "fuck you";
			}
			?>



		</div>
		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<li><a href="#">Category One</a></li>
						<li><a href="#">Category Two</a></li>
						<li><a href="#">Category Three</a></li>
						<li><a href="#">Category Four</a></li>
						<li><a href="#">Category Five</a></li>						
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
					
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
					
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
					
					<div class="popular clear">
						<h3><a href="#">Post title will be go here..</a></h3>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
	
			</div>
			
		</div>
	</div>

<?php
include "inc/footer.php";
?>