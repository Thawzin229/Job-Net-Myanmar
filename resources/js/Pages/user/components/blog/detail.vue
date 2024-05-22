<template>
  <div>
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Blog</h2>
			<span>Keep up to date with the latest news</span>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
<div class="row">
	<!-- Blog Posts -->
	<div class="col-lg-8">
		<div class="padding-right">

			<!-- Post -->
			<div class="post-container">
				<div class="post-img"><Link href="#">
          <img v-if="blog.image" style="width:100%;height: 400px;" :src="'http://127.0.0.1:8000/storage/blog_images/'+blog.image" alt=""></Link></div>
          <img v-if="!blog.image" style="width:100%;height: 400px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANUAAACUCAMAAAAzmpx4AAAASFBMVEXf39/i4uLb29vl5eXIyMhxcXHo6Oipqalubm7S0tK1tbV+fn54eHiGhobV1dWWlpbCwsKcnJyMjIxpaWmvr6+ioqJiYmJbW1uzXVlrAAAC9klEQVR4nO3a25KjIBQFUK4qVxGx5///dABNYmaqp5OHKeuk9noC88IuhBxIGAMAAAAAAAAAAAAAAAAAAAAAAACA/4Gn8QVWXj3O98iyTj9a5+Hqcb5OVLxo/yNNKNUwu8a71PN9ywRSqbL2us6UU5zxs/rZqcMjtVRuXoJuqdKJEkw8epFeqiyG0lKJVd9NtW++br01SbqpJq/Xna5vpDS/jt76RTqVXtRum0J7I9WNIPwGTnqUfW8YbE9Ferd4StUfytJTmTvqc9Uf7qmidzfk1tX8Xaq6W9yLJfsxqXhctsOiPicVk3ec2rp6TrUXg3xPdSoDKafyYem2rGsqMS+HmfRu4W/1ktattnhUTJR3i8dO7lzbLfSt4wnP1fNJhLOn/oekYqTPV6c30J5FLsq9Y+imiucrGd92i4+oLb7WB11PjY/zFeFUpxq9lemMcs0+6yCGsX0/cXlW94hTR9K6Y5KbdkVl7az6p9Hrjc7dbd0j9htO929eT5FfPdjXyaRfuI6eVp0IhaqzJZL9WRKkQlXyFVcPEgAAAOi4XVTU1vnR301KxHEyZCya/Uk9QSq11+inJinchpxDmOtpuCyiP4mzCyHY1jSLC643aeHFJaNS9oyPuaXiItQnpqyF8+hCbW4ruVi8hLp2pNJJ7qmGcY1tMY3ODNmbtqxUvHqU7zpSGa1uc+X6FQWP2prV9tsKiuvKqbpbLJnvqXj0+9/LRCi2nevbtQy5WNzqnLP3RrI9lfFpT5XHMrX/2ZVi1dWjfFedq7pbqCWIP+cq17kSvP170G1Xj/Jdx7qKugz7umJu6+tKeKvWNm2czcvFg3zbkUr4saWqO96wTa2gkMWrweX+O48nOFd9t9imugeG1orCZRVjWkfGld5MrN/E9FJZXwuJkG2tLXpr5Cb74FypRZS0tbJwoyWXisV25WxarddbytQlpVIy/VuKR5VULRWvHuT7TjX7+XfGx4cUv4YBAAAAAAAAAAAAAAAAAAAAAADg4/wGhuM3+PTlSm8AAAAASUVORK5CYII=" alt="">
				<div class="post-content">
					<a href="#"><h3>{{ blog.title }}</h3></a>
					<div class="meta-tags">
						<span>{{ blog.date }}</span>
						<span><a href="#">0 Comments</a></span>
					</div>
					<div class="clearfix"></div>
					<div class="margin-bottom-25"></div>

					<p>{{ blog.statement }}</p>

					<div class="post-quote">
						<span class="icon"></span>
						<blockquote>
							Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum.
						</blockquote>
					</div>

					<p>{{ blog.body }}</p>

				</div>
			</div>

			<!-- Comments -->
			<section class="comments">
			<h4>Comments <span class="comments-amount">(4)</span></h4>

				<ul>
					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by">Kathy Brown<span class="date">12th, June 2015</span>
								<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
							</div>
							<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
						</div>
					</li>

					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by">John Doe<span class="date">15th, May 2015</span>
								<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
							</div>
							<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
						</div>

					</li>
				 </ul>
			</section>


			<div class="clearfix"></div>
			<div class="margin-top-35"></div>


			<!-- Add Comment -->
			<h4 class="comment">Add Comment</h4>
			<div class="margin-top-20"></div>
			
			<!-- Add Comment Form -->
			<form id="add-comment" class="add-comment">
				<fieldset>

					<div>
						<label>Name:</label>
						<input type="text" value=""/>
					</div>
						
					<div>
						<label>Email: <span>*</span></label>
						<input type="text" value=""/>
					</div>

					<div>
						<label>Comment: <span>*</span></label>
						<textarea cols="40" rows="3"></textarea>
					</div>

				</fieldset>

				<a href="#" class="button color">Add Comment</a>
				<div class="clearfix"></div>
				<div class="margin-bottom-20"></div>

			</form>

		</div>
	</div>
	<!-- Blog Posts / End -->


	<!-- Widgets -->
	<div class="col-lg-4 blog">

		<!-- Search -->
		<div class="widget">
			<h4>Search</h4>
			<div class="widget-box search">
				<div class="input"><input class="search-field" type="text" placeholder="To search type and hit enter" value=""/></div>
			</div>
		</div>

		<div class="widget">
			<h4>Got any questions?</h4>
			<div class="widget-box">
				<p>If you are having any questions, please feel free to ask.</p>
				<a href="contact.html" class="button widget-btn"><i class="fa fa-envelope"></i> Drop Us a Line</a>
			</div>
		</div>

		<!-- Tabs -->
		<div class="widget">

			<ul class="tabs-nav blog">
				<li class="active"><a href="#tab1">Popular</a></li>
				<li><a href="#tab2">Featured</a></li>
				<li><a href="#tab3">Recent</a></li>
			</ul>

			<!-- Tabs Content -->
			<div class="tabs-container">

				<div class="tab-content" id="tab1">
					
					<!-- Recent Posts -->
					<ul class="widget-tabs">
						
						<!-- Post #1 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">How to "Woo" a Recruiter and Land Your Dream Job</a></h5>
								<span>September 12, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
						
						<!-- Post #2 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">Hey Job Seeker, It’s Time To Get Up And Get Hired</a></h5>
								<span>October 10, 2015</span>
							</div>
							<div class="clearfix"></div>

						</li>
						
						<!-- Post #3 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">11 Tips to Help You Get New Clients Through Cold Calling</a></h5>
								<span>August 27, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
		
				</div>

				<div class="tab-content" id="tab2">
				
					<!-- Featured Posts -->
					<ul class="widget-tabs">

						<!-- Post #1 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">Hey Job Seeker, It’s Time To Get Up And Get Hired</a></h5>
								<span>October 10, 2015</span>
							</div>
							<div class="clearfix"></div>

						</li>
						
						<!-- Post #2 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">How to "Woo" a Recruiter and Land Your Dream Job</a></h5>
								<span>September 12, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
						
						<!-- Post #3 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">11 Tips to Help You Get New Clients Through Cold Calling</a></h5>
								<span>August 27, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>

				<div class="tab-content" id="tab3">
				
					<!-- Recent Posts -->
					<ul class="widget-tabs">
            <li v-for="(blog,index) in recents" :key="index">
							<div class="widget-thumb">
								<a href=""><img :src="'http://127.0.0.1:8000/storage/blog_images/'+blog.image" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">{{ blog.title }}</a></h5>
								<span>{{ blog.date }}</span>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>
				
			</div>
		</div>


		<div class="widget">
			<h4>Social</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
		</div>
		
		<div class="clearfix"></div>
		<div class="margin-bottom-40"></div>

	</div>
</div>
	<!-- Widgets / End -->


</div>
  </div>
</template>

<script>
export default {
props:{blog:Array,recents:Array}
}
</script>

<style>

</style>