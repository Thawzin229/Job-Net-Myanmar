<template>
  <div>
    <div id="titlebar" class="photo-bg" style="background-image: url(images/all-categories-photo.jpg);">
	<div class="container">
		<div class="ten columns">
			<h2>All Categories</h2>
		</div>

		<div class="six columns">
			<a href="add-job.html" class="button">Post a Job, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div id="categories">
	<!-- Categories Group -->
	<div class="categories-group">
		<div class="container">
			<div class="four columns"><h4>Web, Software & IT</h4></div>
      <div class="row">
			<div class="col-lg-3"  v-for="(category,index) in categories" :key="index">
				<ul>
					<li><Link :href="'/user/jobs?category_id='+category.id">{{ category.name }}</Link></li>
				</ul>
			</div>
    </div>
		</div>
	</div>



</div>

  </div>
</template>

<script>
export default {
  props: { errors: Object,categories:Array},
}
</script>

<style>

</style>