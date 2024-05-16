<template>
  <div>
    <div id="banner" style="">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="search-container">

				<!-- Form -->
				<h2>Find job</h2>
				<div class="row">
				<input v-model="search" type="text" class="" placeholder="job title, keywords or company name" value=""/>
				<select name="" id="job-input" class="col-lg-5" v-model="filters.location">
					<option value="">Chosee Locations Like Yangon or Mandaly</option>
					<option :value="location.id" v-for="(location,index) in locations" :key="index">{{ location.name }}</option>
				</select>
				<button @click="searching()"><i class="fa fa-search"></i></button>
			</div>

				
				<!-- Announce -->
				<div class="announce">
					We’ve over <strong>{{ job_count }}</strong> jobs offers for you!
				</div>

			</div>

		</div>
	</div>
</div>
  </div>
</template>

<script>
export default {
	props:{locations:Array,job_count:Number},
data:()=>({
	search:"",
	filters:{location:"",}
}),
methods:{
	searching()
	{
		this.$inertia.get('/user/jobs',{'search':this.search,'param':this.filters.location?this.filters:null});
	}
}
}
</script>

<style>

</style>