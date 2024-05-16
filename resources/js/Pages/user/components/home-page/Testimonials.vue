<template>
  <div>
    <div id="testimonials">
	<!-- Slider -->
	<div class="container">
		<div class="sixteen columns">
			<div class="testimonials-slider">
				  <ul class="slides">
				    <li v-for="(review,index) in reviews" :key="index">
				      <p>{{ review.review }}
				      <span>{{ review.user_name }}</span></p>
				    </li>

				  </ul>
			</div>
		</div>
	</div>
</div>

  </div>
</template>

<script>
export default {
props:{reviews:Array}
}
</script>

<style>

</style>