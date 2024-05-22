<template>
  <div>
    <div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Add Blog</h2>
		</div>

	</div>
</div>


<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page">

			<!-- Notice -->
			<div class="notification notice closeable margin-bottom-40">
				<p><span>Add a job offer?</span>Please follow the term and services which is essential to obey and post job offer for a best community.</p>
			</div>

			<div v-if="errors.status" class="notification notice closeable margin-bottom-40 bg-success text-white shadow">
				<p><span>MESSAGE:</span>{{ errors.status }}</p>
			</div>




			<!-- Email -->
			<div class="form">
				<h5>Blog Title</h5>
				<input v-model="blog.title" class="search-field" type="text" placeholder="mail@example.com" value=""/>
				<strong><div v-if="errors.title" class="text-danger" v-text="errors.title"></div></strong>
			</div>


			<!-- Title -->
			<div class="form">
				<h5>Blog Statement</h5>
				<input v-model="blog.statement" class="search-field" type="text" placeholder="" value=""/>
				<strong><div v-if="errors.statement" class="text-danger" v-text="errors.statement"></div></strong>
			</div>


			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea v-model="blog.body" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" 
				placeholder="e.g job requirement and bodys" spellcheck="true"></textarea>
				<strong><div v-if="errors.body" class="text-danger" v-text="errors.body"></div></strong>
			</div>

      <div class="form">
				<h5>Blog Image <span>(optional)</span></h5>
				<label class="upload-btn">
				    <input type="file" @change="uploadImage" />
				    <i class="fa fa-upload"></i> Browse
				</label>
				<span class="fake-input">No file selected</span>
				<strong><div v-if="errors.image" class="text-danger" v-text="errors.image"></div></strong>
			</div>


			<div class="divider margin-top-0"></div>
			<button href="#" @click="send()" class="button big margin-top-5">Post <i class="fa fa-arrow-circle-right"></i></button>


		</div>
	</div>

</div>
  </div>
</template>

<script>
export default {
	props:{form_data:Array,errors:Object},
	data:()=>({
		blog:{
      title:"",
			statement:'',
			body:'',
      image:""
		}
	}),
  methods:{
    uploadImage(e)
    {
      this.blog.image = e.target.files[0];
    },
    send()
    {
      this.$inertia.post('/user/blogs',this.blog,{onFinish:()=>{
			if(this.errors.status)
			{
				setTimeout(() => {
						this.errors.status=false;
				}, 2000);
			}
		}})
    }
  }
}
</script>

<style>

</style>