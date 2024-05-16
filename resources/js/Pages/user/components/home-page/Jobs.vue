<template>
  <div>
    <div class="container">
	<div class="row">
	<!-- Recent Jobs -->
	<div class="col-lg-8 col-md-12 col-sm-12s">
	<div class="padding-right">
		<h3 class="margin-bottom-25">Recent Jobs</h3>
		<ul class="job-list">

			<li v-for="(job,index) in jobs.data" :key="index" class="highlighted"><Link :href="'/user/jobs/'+job.id">
				<img :src="'http://127.0.0.1:8000/storage/job_images/'+job.jobdetails.image" alt="">
				<div class="job-list-content">
					<div class="d-flex justify-content-between">
					<h4 class="">{{ job.jobdetails.job_title }}<span class="full-time ms-3">{{ job.jobdetails.job_type_name }}</span></h4>
				<div v-if="job.jobdetails.is_applied" title="already applied"><i class="fa fa-star"></i></div>
			</div>

					<div class="job-icons">
						<span><i class="fa fa-briefcase"></i>{{ job.campany_name }}</span>
						<span><i class="fa fa-map-marker"></i>{{ job.jobdetails.location_name }}</span>
						<span><i class="fa fa-money"></i> $ {{ job.jobdetails.fee }} / hour</span>
					</div>
				</div>
			</Link>
				<div class="clearfix"></div>
			</li>

		</ul>

		<Link href="/user/home?limit=12" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</Link>
		<div class="margin-bottom-55"></div>
	</div>
	</div>

	<!-- Job Spotlight -->
	<div class="col-lg-4 col-sm-12">
		<h3 class="margin-bottom-5">Job Spotlight</h3>

		<!-- Navigation -->
		<div class="showbiz-navigation">
			<div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
			<div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="clearfix"></div>
		
		<!-- Showbiz Container -->
		<div id="job-spotlight" class="showbiz-container">
			<div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
				<div class="overflowholder">

					<ul>

						<li v-for="(job,index) in jobs.data" :key="index" >
							<div class="job-spotlight">
								<Link :href="'/user/jobs/'+job.id"><h4>{{ job.jobdetails.job_title }}<span class="part-time">{{ job.jobdetails.job_type_name }}</span></h4></Link>
								<span><i class="fa fa-briefcase"></i>{{ job.campany_name }}</span>
								<span><i class="fa fa-map-marker"></i>{{ job.jobdetails.location_name }}</span>
								<span><i class="fa fa-money"></i> ${{ job.jobdetails.fee }} / hour</span>
								<p>{{ job.jobdetails.tag_line }}</p>
								<Link :href="'/user/jobs/'+job.id" class="button">Apply For This Job</Link>
							</div>
						</li>


					</ul>
					<div class="clearfix"></div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
</div>
</div>
</div>
</template>

<script>
export default {
props:{jobs:Object
}
}
</script>

<style>

</style>