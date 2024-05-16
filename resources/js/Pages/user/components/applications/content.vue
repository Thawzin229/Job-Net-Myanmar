<template>
  <div>
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Manage Applications</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><Link href="/user/home">Home</Link></li>
					<li><Link href="/user/manage-job">Job Dashboard</Link></li>
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

		<p class="margin-bottom-25" style="float: left;">The job applications for <strong><Link :href="'/user/jobs/'+job.jobs_id">{{ job.job_title }}</Link></strong> are listed below.</p>
		<strong><a href="#" class="download-csv">Download CSV</a></strong>

	</div>

<div class="row">
	<div class="col-lg-6">
		<!-- Select -->
		<select  v-model="status" data-placeholder="Filter by status" id="job-input">
			<option  value="">Filter by status</option>
			<option  value="new">New</option>
			<option  value="interviewed">Interviewed</option>
			<option  value="offer">Offer extended</option>
			<option  value="hired">Hired</option>
			<option  value="archived">Archived</option>
		</select>
		<div class="margin-bottom-15"></div>
	</div>

	<div class="col-lg-6">
		<!-- Select -->
		<select v-model="sorting" data-placeholder="Newest first" id="job-input">
			<option value="">Sorting by</option>
			<option value="desc">Sort by Newest</option>
			<option value="asc">Sort by Oldest</option>
			<option value="most">Most Rated</option>
		</select>
		<div class="margin-bottom-35"></div>
	</div>
</div>


	<!-- Applications -->
	<div class="sixteen columns">
		
		<div class="application" v-for="(app,index) in applications.data" :key="index">
			<div class="app-content">
				
				<!-- Name / Avatar -->
				<div class="info">
					<img src="../../../../../../public/user/images/resumes-list-avatar-01.png" alt="">
					<span style="text-transform: uppercase;">{{ app.user_name }}</span>
					<ul>
						<li><a :href="'http://127.0.0.1:8000/storage/application_images/'+app.cv"><i class="fa fa-file-text"></i> Download CV</a></li>
						<li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
					</ul>
				</div>
				
				<!-- Buttons -->
				<div class="buttons">
					<a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
					<a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
					<a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
				</div>
				<div class="clearfix"></div>

			</div>

			<!--  Hidden Tabs -->
			<div class="app-tabs">

				<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
				
				<!-- First Tab -->
			    <div class="app-tab-content" id="one-1">

					<div class="select-grid">
						<select v-model="application.status" data-placeholder="Application Status" id="job-input">
							<option value="">Application Status</option>
							<option value="new">New</option>
							<option value="interviewed">Interviewed</option>
							<option value="offer">Offer extended</option>
							<option value="hired">Hired</option>
							<option value="archived">Archived</option>
						</select>
					</div>

					<div class="select-grid">
						<input type="number" min="1" max="5" v-model="application.rating" placeholder="Rating (out of 5)">
            <div v-if="errors.rating" v-text="errors.rating" class="text-danger"></div>
					</div>

					<div class="clearfix"></div>
					<button @click="save(app.id)"   class="button margin-top-15">Save</button>
					<Link :href="'/user/applications/'+app.id" method="delete" class="button gray margin-top-15 delete-application">Delete this application</Link>

			    </div>
			    
			    <!-- Second Tab -->
			    <div class="app-tab-content"  id="two-1">
					<textarea v-model="note" placeholder="Private note regarding this application"></textarea>
          <div v-if="errors.note" v-text="errors.note" class="text-danger"></div>
          <div v-if="errors.status" v-text="errors.status" class="text-success"></div>
					<button class="button margin-top-15" @click="addnote(app.id)">Add Note</button>
			    </div>
			    
			    <!-- Third Tab -->
			    <div class="app-tab-content"  id="three-1">
					<i>Full Name:</i>
					<span>{{ app.full_name }}</span>

					<i>Email:</i>
					<span><a href="mailto:john.doe@example.com">{{ app.email }}</a></span>

					<i>Message:</i>
					<span>{{ app.cover_letter }}</span>
			    </div>

			</div>

			<!-- Footer -->
			<div class="app-footer">

				<div v-if="app.rating === 0" class="rating no-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>
        <div v-if="app.rating === 1" class="rating one-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>
        <div v-if="app.rating === 2" class="rating two-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>
        <div v-if="app.rating === 3" class="rating three-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>
        <div v-if="app.rating === 4" class="rating four-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>
        <div v-if="app.rating === 5" class="rating five-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>

				<ul>
					<li style="text-transform:capitalize;"><i class="fa fa-file-text-o"></i> {{ app.status }}</li>
					<li><i class="fa fa-calendar"></i> {{ app.date }}</li>
				</ul>
				<div class="clearfix"></div>

			</div>
		</div>



	</div>

	<div
                            class="pagination-container d-flex justify-content-center"
                        >
                            <nav class="pagination-next-prev mt-5">
                                <ul class="d-flex">
                                    <li
                                        v-for="(link, index) in applications.links"
                                        :key="index"
                                    >
                                        <a
                                            preserve-scroll
                                            class="mx-1"
                                            :href="link.url"
                                            v-html="link.label"
                                        ></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
</div>
  </div>
</template>

<script>
import { watch } from 'vue';
export default {
props:{errors:Object,applications:Object,job:Object},
data:()=>({
  application:{
    status:'',
    rating:''
  },
  note:'',
	status:'',
	sorting:''
}),
methods:{
  save(id)
  {
    this.$inertia.patch('/user/applications/status/'+id,this.application);
  },
  addnote(id)
  {
    let app_note  = {
        note:this.note,
        app_id:id,
    }
    this.$inertia.post('/user/applications/note',app_note,{
      onFinish:()=>{
        setTimeout(() => {
            this.errors.status = false;
        }, 2000);
      }
    });
  },
},
watch:{
	status:function(status){
		this.$inertia.get('/user/applications/'+this.job.jobs_id,{'status':status},{preserveState:true,replace:true});
	},
	sorting:function(sorting){
		this.$inertia.get('/user/applications/'+this.job.jobs_id,{'sorting':sorting},{preserveState:true,replace:true});
	}
}	
}
</script>

<style>

</style>