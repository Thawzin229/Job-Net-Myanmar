<template>
  
  <div>
    <div class="container">
	<div class="sixteen columns">
		<h3 class="margin-bottom-25">Recent Posts</h3>
	</div>

<div class="row">
	<div v-for="(post,index) in recents" :key="index" class="col-lg-4 col-md-6 col-sm-12">

		<!-- Post #1 -->
		<div class="recent-post">
			<div class="recent-post-img"><a href="blog-single-post.html">
				<img style="width: 100%;height: 350px;"  v-if="post.image"  :src="'http://127.0.0.1:8000/storage/blog_images/'+post.image" alt="">
				<img  v-if="!post.image" style="width:100%;height: 350px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANUAAACUCAMAAAAzmpx4AAAASFBMVEXf39/i4uLb29vl5eXIyMhxcXHo6Oipqalubm7S0tK1tbV+fn54eHiGhobV1dWWlpbCwsKcnJyMjIxpaWmvr6+ioqJiYmJbW1uzXVlrAAAC9klEQVR4nO3a25KjIBQFUK4qVxGx5///dABNYmaqp5OHKeuk9noC88IuhBxIGAMAAAAAAAAAAAAAAAAAAAAAAACA/4Gn8QVWXj3O98iyTj9a5+Hqcb5OVLxo/yNNKNUwu8a71PN9ywRSqbL2us6UU5zxs/rZqcMjtVRuXoJuqdKJEkw8epFeqiyG0lKJVd9NtW++br01SbqpJq/Xna5vpDS/jt76RTqVXtRum0J7I9WNIPwGTnqUfW8YbE9Ferd4StUfytJTmTvqc9Uf7qmidzfk1tX8Xaq6W9yLJfsxqXhctsOiPicVk3ec2rp6TrUXg3xPdSoDKafyYem2rGsqMS+HmfRu4W/1ktattnhUTJR3i8dO7lzbLfSt4wnP1fNJhLOn/oekYqTPV6c30J5FLsq9Y+imiucrGd92i4+oLb7WB11PjY/zFeFUpxq9lemMcs0+6yCGsX0/cXlW94hTR9K6Y5KbdkVl7az6p9Hrjc7dbd0j9htO929eT5FfPdjXyaRfuI6eVp0IhaqzJZL9WRKkQlXyFVcPEgAAAOi4XVTU1vnR301KxHEyZCya/Uk9QSq11+inJinchpxDmOtpuCyiP4mzCyHY1jSLC643aeHFJaNS9oyPuaXiItQnpqyF8+hCbW4ruVi8hLp2pNJJ7qmGcY1tMY3ODNmbtqxUvHqU7zpSGa1uc+X6FQWP2prV9tsKiuvKqbpbLJnvqXj0+9/LRCi2nevbtQy5WNzqnLP3RrI9lfFpT5XHMrX/2ZVi1dWjfFedq7pbqCWIP+cq17kSvP170G1Xj/Jdx7qKugz7umJu6+tKeKvWNm2czcvFg3zbkUr4saWqO96wTa2gkMWrweX+O48nOFd9t9imugeG1orCZRVjWkfGld5MrN/E9FJZXwuJkG2tLXpr5Cb74FypRZS0tbJwoyWXisV25WxarddbytQlpVIy/VuKR5VULRWvHuT7TjX7+XfGx4cUv4YBAAAAAAAAAAAAAAAAAAAAAADg4/wGhuM3+PTlSm8AAAAASUVORK5CYII=" alt="">
	</a><div class="hover-icon"></div></div>
			<a href="blog-single-post.html"><h4>{{ post.title }}</h4></a>
			<div class="meta-tags">
				<span>{{ post.date }}</span>
				<span><a href="#">{{ post.comments_count }} Comments</a></span>
			</div>
			<p>{{ post.body }}</p>
			<a :href="'/user/blogs/'+post.id" class="button">Read More</a>
		</div>

	</div>
</div>
</div>
  </div>
</template>

<script>
export default {
props:{recents:Array}
}
</script>

<style>

</style>