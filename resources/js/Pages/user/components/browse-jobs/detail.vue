<template>
  <div>

<div id="titlebar" class="photo-bg" style="background: url()">
	<div class="container">
		<div class="ten columns">
			<span><a href="browse-jobs.html">{{ job.jobdetails.job_tag }}</a></span>
			<h2>{{ job.jobdetails.job_title }} 
        <span class="full-time" >{{ job.jobdetails.job_type_name }}</span>
      </h2>
		</div>

		<div class="six columns" v-if="!job.is_bookmarked"  >
			<a class="button white" @click="bookmark(job.id)"><i class="fa fa-star"></i> Bookmark This Job</a>
		</div>
		<div  v-if="job.is_bookmarked"  class="six columns">
			<a class="button white" ><i class="fa fa-star"></i>Bookmarked</a>
		</div>

	</div>
</div>



<div class="container">
	
  <div class="row">
	<!-- Recent Jobs -->
	<div class="col-lg-8">
	<div class="padding-right">
		
		<!-- Company Info -->
		<div class="company-info">
      <div id='image-container'>
			<img :src="'http://localhost:8000/storage/job_images/'+job.jobdetails.image" alt="" class="mt-4  ms-3">
			<div class="content">
				<h4>{{ job.campany_name }}</h4>
				<span><a :href="job.jobdetails.website_link"><i class="fa fa-link me-1" ></i> Website</a></span>
				<span><a href="#"><i class="fa fa-twitter me-1"></i>{{ job.jobdetails.twitter_user_name }}</a></span>
				<span><a :href="job.jobdetails.application_email"><i class="fa fa-file-text me-2"></i>Email</a></span>
        <div id="category" class="mt-2">
          <span v-for="(cat,index) in job.jobdetails.category_data" :key="index" class="freelance text-white py-2 px-3 shadow">{{ cat }}</span>
        </div>
			</div>
    </div>
      <div class="clearfix"></div>
		</div>

		<p class="margin-reset">
      {{ job.jobdetails.tag_line }}
		</p>

		<br>
		<p>The <strong>{{ job.jobdetails.job_title }}</strong> will have responsibilities that include:</p>

		<ul class="list-1" v-html="job.jobdetails.description">
		</ul>
		
		<br>

		<h4 class="margin-bottom-10">Job Requirment</h4>

		<ul class="list-1" v-html="job.jobdetails.requirement">
		</ul>

	</div>
	</div>


	<!-- Widgets -->
	<div class="col-lg-4">

		<!-- Sort by -->
		<div class="widget">
			<h4>Overview</h4>

			<div class="job-overview">
				
				<ul>
          <li class="">
            <i class="fa fa-map-marker"></i>
            <div>
              <strong class="">Location:</strong>
							<span>{{ job.jobdetails.location_name }}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Job Title:</strong>
							<span>{{ job.jobdetails.job_title }}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-clock-o"></i>
						<div>
							<strong>Deadline (CV)</strong>
              <span>{{ job.jobdetails.deadline }}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-money"></i>
						<div>
							<strong>Rate:</strong>
							<span>${{ job.jobdetails.fee }} / hour</span>
						</div>
					</li>
				</ul>


				<Link href="#small-dialog" class="popup-with-zoom-anim button">Apply For This Job</Link>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Apply For This Job</h2>
					</div>

					<div class="small-dialog-content">
						<form @submit.prevent="submit" >
							<input :class="errors.full_name?'border-danger':''" type="text" placeholder="Full Name" v-model="application.full_name"/>
							<p class="text-danger mt-2" v-if="errors.full_name" v-text="errors.full_name"></p>

							<input :class="errors.email?'border-danger':''"  type="text" placeholder="Email Address" v-model="application.email"/>
							<p class="text-danger mt-2" v-if="errors.email" v-text="errors.email"></p>

							<textarea :class="errors.cover_letter?'border-danger':''" placeholder="Your message / cover letter sent to the employer" v-model="application.cover_letter"></textarea>
							<p class="text-danger mt-2" v-if="errors.cover_letter" v-text="errors.cover_letter"></p>


							<!-- Upload CV -->
							<div class="upload-info"><strong>Upload your CV (must)</strong> <span>Max. file size: 1MB</span></div>
							<div class="clearfix"></div>

							<label class="upload-btn">
							    <input type="file"  @change="uploadCV" :class="errors.cv?'border-danger':''"/>
							    <i class="fa fa-upload"></i> Browse
							</label>
							<span class="fake-input">No file selected</span>
							<p class="text-danger mt-2" v-if="errors.cv" v-text="errors.cv"></p>

							<div class="divider"></div>
							<button class="send" v-if="errors.status" v-text="errors.status"></button>

							<button @click="apply()" class="send">Send Application</button>
						</form>
					</div>
					
				</div>

			</div>

		</div>

	</div>
	<!-- Widgets / End -->
</div>

</div>
  </div>
</template>

<script>
export default {
props:{errors:Object,job:Object,authed_user:Array},
data:()=>({
	application:{
		user_id:'',
		job_id:'',
		full_name:'',
		email:'',
		cover_letter:'',
		cv:'',
	}
}),
methods:{
	uploadCV(e)
	{
		this.application.cv = e.target.files[0];
	},
	apply()
	{
		this.application.user_id = this.authed_user[0].id;
		this.application.job_id = this.job.id;
		console.log(this.application);
		this.$inertia.post('/user/applications',this.application,{
			onFinish:()=>{
				setTimeout(() => {
					this.errors.status = false;
				}, 2000);
			}
		});
	},
	bookmark(job_id)
	{
		this.$inertia.post('/user/book-marks',{'job_id':job_id});
	}
}
}
</script>

<style>

</style>