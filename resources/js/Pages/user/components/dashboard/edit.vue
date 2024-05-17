<template>
  <div>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img v-if="user_profile.profile.avatar" class="rounded-circle mt-5" width="150px" :src="user_profile.profile.avatar">
              <img v-if="user_profile.profile.image" class="rounded-circle mt-5" width="150px" :src="user_profile.profile.avatar">
              <img v-if="user_profile.profile.image === null && user_profile.profile.avatar === null" class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
              <span class="font-weight-bold">{{ user_profile.profile.name }}</span><span class="text-black-50">{{ user_profile.email }}</span><span> </span></div>


        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="name" v-model="user_profile.profile.name"></div>
                    <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" v-model="user_profile.email" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" v-model="user_profile.profile.phone"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" v-model="user_profile.profile.address"></div>
                    <div class="col-md-12"><label class="labels">Date of Birthday</label><input type="text" class="form-control" placeholder="enter your birthday" v-model="user_profile.profile.birthday"></div>
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" placeholder="enter your gender" v-model="user_profile.profile.gender"></div>

                    <div class="col-md-12"><label class="labels">Job</label><input type="text" class="form-control" placeholder="enter your current job" v-model="user_profile.profile.job"></div>
                    <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter your city" v-model="user_profile.profile.city"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter your state" v-model="user_profile.profile.state"></div>
                    <div class="col-md-6"><label class="labels">Hobby</label><input type="text" class="form-control" v-model="user_profile.profile.hobby" placeholder="enter your hobby"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Role and Status and Avatar</span></div><br>
                <div class="col-md-12"><label class="labels">Role</label><input type="text" class="form-control" placeholder="experience" v-model="user_profile.role"></div> <br>
                <div class="col-md-12"><label class="labels">Status</label><input type="text" class="form-control" placeholder="additional details" v-model="user_profile.status"></div>
                <div class="col-md-12 mt-4"><label class="labels">Avatar</label><input type="file" class="form-control" placeholder="additional details"></div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
props:{user_profile:Object}
}
</script>

<style>

</style>