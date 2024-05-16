<template>
  <div>
    <div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Add Resume</h2>
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
				<p><span>Have an account?</span> If you don’t have an account you can create one below by entering your email address. A password will be automatically emailed to you.</p>
			</div>


			<!-- Linked In -->
			<div class="form">
				<h5>LinkedIn</h5>
				<a href="#" class="button linkedin-btn">Import from LinkedIn</a>
			</div>

			<!-- Email -->
			<div class="form">
				<h5>Your Name</h5>
				<input v-model="resume.name" class="search-field" type="text" placeholder="Your full name" value=""/>
				<strong><div v-if="errors.name" class="text-danger" v-text="errors.name"></div></strong>
				
			</div>

			<!-- Email -->
			<div class="form">
				<h5>Your Email</h5>
				<input v-model="resume.email" class="search-field" type="text" placeholder="mail@example.com" value=""/>
				<strong><div v-if="errors.email" class="text-danger" v-text="errors.email"></div></strong>
			</div>

			<!-- Title -->
			<div class="form">
				<h5>Professional Title</h5>
				<input v-model="resume.professional_title" class="search-field" type="text" placeholder="e.g. Web Developer" value=""/>
				<strong><div v-if="errors.professional_title" class="text-danger" v-text="errors.professional_title"></div></strong>
			</div>

			<!-- Location -->
			<div class="form">
				<h5>Location</h5>
				<input v-model="resume.location" class="search-field" type="text" placeholder="e.g. London, UK" value=""/>
				<strong><div v-if="errors.location" class="text-danger" v-text="errors.location"></div></strong>
			
			</div>

			<div class="form">
				<h5>About Me</h5>
				<textarea class="WYSIWYG" v-model="resume.about_me" name="summary" cols="30" rows="2" id="summary" spellcheck="true"></textarea>
				<strong><div v-if="errors.about_me" class="text-danger" v-text="errors.about_me"></div></strong>
			</div>

			<!-- Logo -->
			<div class="form">
				<h5>Photo <span>(optional)</span></h5>
				<label class="upload-btn">
				    <input type="file"  @change="uploadImage" />
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>
				<strong><div v-if="errors.image" class="text-danger" v-text="errors.image"></div></strong>
			</div>

			<!-- Email -->
			<div class="form">
				<h5>Video <span>(optional)</span></h5>
				<input v-model="resume.video" class="search-field" type="text" placeholder="A link to a video about you" value=""/>
				<strong><div v-if="errors.video" class="text-danger" v-text="errors.video"></div></strong>
			</div>

			<!-- Description -->
			<div class="form">
				<h5>Resume Content</h5>
				<textarea class="WYSIWYG" v-model="resume.resume_content" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
				<strong><div v-if="errors.resume_content" class="text-danger" v-text="errors.resume_content"></div></strong>
			</div>


			<!-- Add URLs -->
			<div class="form with-line">
				<h5>URL(s) <span>(optional)</span></h5>
				<div class="">
					
					<!-- Adding URL(s) -->
					<div class="form boxed url-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
						<div class="d-flex mb-4">
							<div class="mx-2 border ps-4 pe-1 py-2 bg-success text-white" v-for="(link,index) in resume['socials']" :key="index">
								<div class="d-flex align-items-center">
								<div>
									{{ link.name }}
								</div>
								<span class="material-symbols-outlined ms-4" @click="canclesocial(index)">close</span>
							</div>
							</div>
						</div>
						<input v-model="new_resume.social.name" class="search-field" type="text" placeholder="Name" />
						<input v-model="new_resume.social.link" class="search-field" type="text" placeholder="http://" />
						<div v-if="error.social !== '' " v-text="error.social" class="text-danger"></div>
					</div>
					<div class="my-3 bg-success text-white p-2 text-center" v-if="addedurl">You added Social Media.</div>
					<a   @click="addsocial(new_resume.social.name,new_resume.social.link)" class="button gray add-url add-box"><i class="fa fa-plus-circle"></i> Add URL</a>
					<p class="note">Optionally provide links to any of your websites or social network profiles.</p>
				</div>
			</div>


			<!-- Education -->
			<div class="form with-line">
				<h5>Education <span>(optional)</span></h5>
				<div class="form-inside">

					<!-- Add Education -->
					<div class="form boxed education-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
						<div class="d-flex mb-4">
							<div class="mx-2 border ps-4 pe-1 py-2 bg-success text-white" v-for="(edu,index) in resume['educations']" :key="index">
								<div class="d-flex align-items-center">
								<div>
									{{ edu.school_name }}
								</div>
								<span class="material-symbols-outlined ms-4" @click="cancleeducation(index)">close</span>
							</div>
							</div>
						</div>
						<input  v-model="new_resume.education.school_name" class="search-field" type="text" placeholder="School Name" value=""/>
						<input  v-model="new_resume.education.qualifications" class="search-field" type="text" placeholder="Qualification(s)" value=""/>
						<input  v-model="new_resume.education.start_and_end_date" class="search-field" type="text" placeholder="Start / end date" value=""/>
						<textarea  v-model="new_resume.education.note" name="desc" id="desc" cols="30" rows="10" placeholder="Notes (optional)"></textarea>
						<div v-if="error.education !== '' " v-text="error.education" class="text-danger"></div>
					</div>
					<div class="my-3 bg-success text-white p-2 text-center" v-if="addededu">You added Education.</div>
					<a  @click="addEdu(new_resume.education.school_name,new_resume.education.qualifications,new_resume.education.start_and_end_date,new_resume.education.note)" class="button gray add-education add-box"><i class="fa fa-plus-circle"></i> Add Education</a>
				</div>
			</div>


			<!-- Experience  -->
			<div class="form with-line">
				<h5>Experience <span>(optional)</span></h5>
				<div class="form-inside">

					<!-- Add Experience -->
					<div class="form boxed experience-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>

						<div class="d-flex mb-4">
							<div class="mx-2 border ps-4 pe-1 py-2 bg-success text-white" v-for="(exp,index) in resume['experiences']" :key="index">
								<div class="d-flex align-items-center">
								<div>
									{{ exp.employer }}
								</div>
								<span class="material-symbols-outlined ms-4" @click="cancleexperience(index)">close</span>
							</div>
							</div>
						</div>
						<input  v-model="new_resume.experience.employer" class="search-field" type="text" placeholder="Employer" value=""/>
						<input  v-model="new_resume.experience.job_title" class="search-field" type="text" placeholder="Job Title" value=""/>
						<input  v-model="new_resume.experience.start_and_end_date" class="search-field" type="text" placeholder="Start / end date" value=""/>
						<textarea v-model="new_resume.experience.note" name="desc1" id="desc1" cols="30" rows="10" placeholder="Notes (optional)"></textarea>
						<div v-if="error.experience !== '' " v-text="error.experience" class="text-danger"></div>
					</div>
					<div class="my-3 bg-success text-white p-2 text-center" v-if="addedexp">You added Experience.</div>
					<a  perserve-scroll @click="addExp(new_resume.experience.employer,new_resume.experience.job_title,new_resume.experience.start_and_end_date,new_resume.experience.note)" class="button gray add-experience add-box"><i class="fa fa-plus-circle"></i> Add Experience</a>
				</div>
			</div>


			<div class="divider margin-top-0 padding-reset"></div>
      <div v-if="errors.status" v-text="errors.status" class="text-white bg-success p-2 text-center"></div>
			<Link perserve-scroll  class="button big margin-top-5" @click="add()">Preview <i class="fa fa-arrow-circle-right"></i></Link>

		</div>
	</div>

</div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
props:{errors:Object,resume:Object},
data:()=>({
  new_resume:{
      social:{name:'',link:''},
			education:{school_name:'',qualifications:'',start_and_end_date:'',note:''},
			experience:{employer:'',job_title:'',start_and_end_date:'',note:''}
  },
  addedurl:false,
		addededu:false,
		addedexp:false,
		error:{social:'',education:'',experience:''},
}),
methods:{
	addsocial(name,link)
	{
		if(name !== "" && link !== "")
		{
		this.resume.socials.push({'name':name,'link':link});
		this.addedurl = true;
		setTimeout(() => {
			this.addedurl = false;
		}, 1000);
	}else{
		this.error.social = "The expected fields are required."
	}
	},
	addEdu(school_name,qualifications,start_and_end_date,note)
	{
		if(school_name && qualifications && start_and_end_date && note !== ''){
		this.resume.educations.push({'school_name':school_name,'qualifications':qualifications,'start_and_end_date':start_and_end_date,'note':note});
		this.addededu = true;
		setTimeout(() => {
			this.addededu = false;
		}, 1000);
	}else{
		this.error.education = "The expected fields are required."
	}
	},
	addExp(employer,job_title,start_and_end_date,note)
	{
		if(employer && job_title && start_and_end_date && note !== ''){
		this.resume.experiences.push({'employer':employer,'job_title':job_title,'start_and_end_date':start_and_end_date,'note':note});
		this.addedexp = true;
		setTimeout(() => {
			this.addedexp = false;
		}, 1000);
	}else{
		this.error.experience = "The expected fields are required."
	}
	},
	canclesocial(index)
	{
    this.resume.socials.splice(index, 1);
	},
	cancleeducation(index)
	{
    this.resume.educations.splice(index, 1);
	},
	cancleexperience(index)
	{
    this.resume.experiences.splice(index, 1);
	},
	uploadImage(e)
	{
		this.resume.image = e.target.files[0];
	},
	add()
	{
		this.$inertia.post("/user/resumes/update",this.resume,{onFinish:()=>{
      setTimeout(() => {
        this.errors.status = false;
      }, 2000);
    }})
	},
},

}
</script>

<style>

</style>