<template>
  <div>
    <div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Manage Resumes</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><Link href="/user/home">Home</Link></li>
					<li><Link href="/user/resumes">Manage Resume</Link></li>
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

		<p class="margin-bottom-25">Your resume can be viewed, edited or removed below.</p>

		<table class="manage-table resumes responsive-table">

			<tr>
				<th><i class="fa fa-user"></i> Name</th>
				<th><i class="fa fa-file-text"></i> Title</th>
				<th><i class="fa fa-map-marker"></i> Location</th>
				<th><i class="fa fa-calendar"></i> Date Posted</th>
				<th></th>
			</tr>

			<!-- Item #1 -->
			<tr v-for="(resume,index) in resumes.data" :key="index">
				<td class="title"><a href="#">{{ resume.name }}</a></td>
				<td>{{ resume.professional_title }}</td>
				<td>{{ resume.location }}</td>
				<td>{{ resume.date }}</td>
				<td class="action">
					<Link :href="'/user/resumes/edit/'+resume.id"><i class="fa fa-pencil"></i> Edit</Link>
					<a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
					<Link :href="'/user/resumes/'+resume.id"><i class="fa  fa-eye"></i> View</Link>
					<Link :href="'/user/resumes/'+resume.id" method="DELETE" class="delete"><i class="fa fa-remove"></i> Delete</Link>
				</td>
			</tr>

		</table>

    <div class="pagination-container d-flex justify-content-center mt-5">
			<nav class="pagination-next-prev mt-5">
				<ul class="d-flex">
				<li v-for="(link,index) in resumes.links"  :key="index" ><Link  preserve-scroll class="mx-1" :href="link.url" v-html="link.label"></Link></li>
				</ul>
			</nav>
		</div>

		<br>

		<a href="#" class="button">Add Resume</a>

	</div>

</div>

  </div>
</template>

<script>
export default {
props:{errors:Object,resumes:Object}
}
</script>

<style>

</style>