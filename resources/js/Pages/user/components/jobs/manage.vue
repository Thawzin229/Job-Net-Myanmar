<template>
  <div>
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Manage Jobs</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Job Dashboard</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Table -->
	<div class="sixteen columns">

		<p class="margin-bottom-25">Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.</p>

		<table class="manage-table responsive-table">

			<tr>
				<th><i class="fa fa-file-text"></i> Title</th>
				<th><i class="fa fa-calendar"></i> Date Posted</th>
				<th><i class="fa fa-calendar"></i> Date Expires</th>
				<th><i class="fa fa-user"></i> Applications</th>
				<th></th>
			</tr>
					
			<!-- Item #1 -->
			<tr v-for="(job,index) in jobs.data" :key="index">
				<td class="title"><a href="#">{{ job.jobdetails.job_title }}<span class="pending">(Pending Approval)</span></a></td>
				<td>{{ job.date  }}</td>
				<td>{{ job.jobdetails.deadline  }}</td>
				<td class="centered"><a :href="'/user/applications/'+job.id" class="button">Show ({{ job.jobdetails.applications }})</a></td>
				<td class="action">
					<Link :href="'/user/manage-job/'+job.id"><i class="fa fa-pencil"></i> Edit</Link>
					<Link :href="'/user/manage-job/'+job.id" method="DELETE" class="delete"><i class="fa fa-remove"></i> Delete</Link>
				</td>
			</tr>


			
			
		</table>
		<div class="pagination-container d-flex justify-content-center mt-5">
			<nav class="pagination-next-prev mt-5">
				<ul class="d-flex">
				<li v-for="(link,index) in jobs.links"  :key="index" ><Link  preserve-scroll class="mx-1" :href="link.url" v-html="link.label"></Link></li>
				</ul>
			</nav>
		</div>

		<br>
		<Link href="/user/add-job" class="button">Add Job</Link>

	</div>

</div>
  </div>
</template>

<script>
export default {
  props:{jobs:Object}

}
</script>

<style>

</style>