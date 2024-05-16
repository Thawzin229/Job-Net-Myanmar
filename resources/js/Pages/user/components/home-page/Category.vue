<template>
  <div>
    
<!-- Categories -->
<div class="container">
	<div class="sixteen columns">
		<h3 class="margin-bottom-25">Popular Categories</h3>
		<ul  class="row">
			<div class="col-lg-3 my-2"  v-for="(cat,index) in categories" :key="index">
				<Link :href="'/user/jobs?category_id='+cat.id"><img style="width:100%;height: 100%;" :src="cat.image" alt="">
				</Link>
			</div>
		</ul>

		<div class="clearfix"></div>
		<div class="margin-top-30"></div>

		<Link href="/user/browse-categories" class="button centered">Browse All Categories</Link>
		<div class="margin-bottom-50"></div>
	</div>
</div>

  </div>
</template>

<script>
export default {
props:{categories:Array}
}
</script>

<style>

</style>