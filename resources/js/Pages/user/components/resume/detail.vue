<template>
  <div>
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
				<img :src="'http://127.0.0.1:8000/storage/resume_images/'+resume.image" alt="">
				<div class="resumes-list-content">
					<h4>{{ resume.name }}<span style="text-transform: capitalize;">{{ resume.professional_title }}</span></h4>
					<span class="icons"><i class="fa fa-map-marker"></i>{{ resume.location }}</span>
					<span class="icons"><i class="fa fa-money"></i> $100 / hour</span>
					<span class="icons"><a href="#"><i class="fa fa-link"></i> Website</a></span>
					<span class="icons"><a href="mailto:john.doe@example.com"><i class="fa fa-envelope"></i>{{ resume.email }}</a></span>
					<div class="skills">
						<span v-for="(skill,index) in resume.socials" :key="index">{{skill.name}}</span>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="two-buttons">

				<a href="#small-dialog" class="popup-with-zoom-anim button"><i class="fa fa-envelope"></i> Send Message</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Send Message to John Doe</h2>
					</div>

					<div class="small-dialog-content">
						<form action="#" method="get" >
							<input type="text" placeholder="Full Name" value=""/>
							<input type="text" placeholder="Email Address" value=""/>
							<textarea placeholder="Message"></textarea>

							<button class="send">Send Application</button>
						</form>
					</div>
					
				</div>
				<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Resume</a>


			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
  <div class="row">
	<div class="col-lg-12">
	<div class="padding-right">

		<h3 class="margin-bottom-15">About Me</h3>

		<p class="margin-reset">
      {{ resume.about_me }}
		</p>

		<br>

		<p>The <strong>Food Service Specialist</strong> will have responsibilities that include:</p>

		<ul class="list-1" v-html="resume.resume_content">

		</ul>

	</div>
	</div>
</div>
<div class="row">
  <div class="col-lg-6">

<h3 class="margin-bottom-20">Education</h3>

<!-- Resume Table -->
<dl class="resume-table">
  <div v-for="(edu,index) in resume.educations" :key="index">
  <dt>
    <small class="date">{{ edu.start_and_end_date }}</small>
    <strong style="text-transform: capitalize;">{{ edu.school_name }}</strong>
  </dt>
  <dd>
    <p>{{ edu.note }}</p>
  </dd>
</div>


</dl>

</div>


  <div class="col-lg-6">

<h3 class="margin-bottom-20">Experience</h3>

<!-- Resume Table -->
<dl class="resume-table">

  <div v-for="(exp,index) in resume.experiences" :key="index">
  <dt>
    <small class="date">{{ exp.start_and_end_date }}</small>
    <strong style="text-transform: capitalize;">{{ exp.employer }}</strong>
  </dt>
  <dd>
    <p>{{ exp.note }}</p>
  </dd>
</div>

</dl>

</div>
</div>
</div>
  </div>
</template>

<script>
export default {
props:{errors:Object,resume:Object}
}
</script>

<style>

</style>