<template>
  <div>
    <div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-question-circle"></i>FAQs</h2>
		</div>

	</div>
</div>
<div class="container d-flex justify-content-center">
    <div class="col-lg-7 my-5">
		<h3>Accordions</h3>
		<div class="margin-bottom-20"></div>

			<!-- Accordion -->
			<div class="accordion">

				<!-- Section 1 -->
        <div v-for="(faq,index) in faqs" :key="index">
				<h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span>{{ faq.question }}</h3>
				<div>
					<p>{{ faq.answer }}</p>
				</div>
      </div>

			</div>
			<!-- Accordion / End -->
	</div>
</div>
  </div>
</template>

<script>
export default {
props:{faqs:Array}
}
</script>

<style>

</style>