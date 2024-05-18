<template>
  <div>
    <div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-lock"></i> Change Your Password</h2>
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
				<p><span>Careful</span> You can write any thoughts that on your minds which is affected to our organzations. </p>
			</div>



			<!-- Description -->
			<div class="form">
				<h5>Old Password</h5>
				<input v-model="old_password" class="search-field" type="text" placeholder="########" value=""/>
				<strong><div v-if="errors.old_password" class="text-danger" v-text="errors.old_password"></div></strong>
			</div>

      <div class="form">
				<h5>New Password</h5>
				<input v-model="new_password" class="search-field" type="text" placeholder="########" value=""/>
				<strong><div v-if="errors.new_password" class="text-danger" v-text="errors.new_password"></div></strong>
				<strong><div v-if="errors.password_status" class="text-danger" v-text="errors.password_status"></div></strong>
			</div>






			<div class="divider margin-top-0 padding-reset"></div>
			<Link perserve-scroll @click="save()" class="button big margin-top-5">Save Changes <i class="fa fa-save"></i></Link>

		</div>
	</div>

</div>
  </div>
</template>

<script>
export default {
props:{errors:Object},
data:()=>({
  old_password:"",
  new_password:"",
}),
methods:{
  save()
  {
    this.$inertia.patch('/user/dashboards/password',{
      'old_password' : this.old_password,
      'new_password' : this.new_password
    });
  }
}
}
</script>

<style>

</style>