<template>
  <div>
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Add Reviews</h2>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page">

			<!-- Notice -->
			<div class="notification notice closeable margin-bottom-40">
				<p><span>Any thoughts?</span> You can write any thoughts that on your minds which is affected to our organzations. </p>
			</div>



			<!-- Description -->
			<div class="form">
				<h5>Your Thoughts</h5>
				<textarea v-model="review" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true" placeholder="What do you think of our community..."></textarea>
				<strong><div v-if="errors.review" class="text-danger" v-text="errors.review"></div></strong>
				<strong><div v-if="errors.status" class="text-success" v-text="errors.status"></div></strong>
			</div>






			<div class="divider margin-top-0 padding-reset"></div>
			<Link perserve-scroll @click="send()" class="button big margin-top-5">Preview <i class="fa fa-arrow-circle-right"></i></Link>

		</div>
	</div>

</div>

  </div>
</template>

<script>
export default {
props:{errors:Object},
data:()=>({
  review:""
}),
methods:{
  send()
  {
    this.$inertia.post('/user/reviews',{'review':this.review});
  }
}
}
</script>

<style>

</style>