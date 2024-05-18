<template>
  <div>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img v-if="user_profile.profile.avatar" class="rounded-circle mt-5" width="150px" :src="user_profile.profile.avatar">
              <img style="border-radius: 50%;width: 100px;height: 100px;" v-if="user_profile.profile.image" class="mt-5" width="150px" :src="'http://127.0.0.1:8000/storage/user_profile_images/'+user_profile.profile.image">
              <img v-if="user_profile.profile.image === null && user_profile.profile.avatar === null" class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
              <span class="font-weight-bold">{{ user_profile.profile.name }}</span><span class="text-black-50">{{ user_profile.email }}</span><span> </span></div>


        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="name" v-model="user_profile.profile.name">
                        <strong><div v-if="errors.name" class="text-danger" v-text="errors.name"></div></strong>
                    </div>
                    <div class="col-md-6"><label class="labels">Email</label><input  disabled type="text" class="form-control" v-model="user_profile.email" placeholder="surname">
                        <strong><div v-if="errors.email" class="text-danger" v-text="errors.email"></div></strong>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" v-model="user_profile.profile.phone">
                        <strong><div v-if="errors.phone" class="text-danger" v-text="errors.phone"></div></strong>
                    </div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" v-model="user_profile.profile.address">
                        <strong><div v-if="errors.address" class="text-danger" v-text="errors.address"></div></strong>
                    </div>
                    <div class="col-md-12"><label class="labels">Date of Birthday</label><input type="date" class="form-control" placeholder="enter your birthday" v-model="user_profile.profile.birthday">
                        <strong><div v-if="errors.birthday" class="text-danger" v-text="errors.birthday"></div></strong>
                    </div>
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" placeholder="enter your gender" v-model="user_profile.profile.gender">
                        <strong><div v-if="errors.gender" class="text-danger" v-text="errors.gender"></div></strong>
                    </div>

                    <div class="col-md-12"><label class="labels">Job</label><input type="text" class="form-control" placeholder="enter your current job" v-model="user_profile.profile.job">
                        <strong><div v-if="errors.job" class="text-danger" v-text="errors.job"></div></strong>
                    </div>
                    <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter your city" v-model="user_profile.profile.city">
                        <strong><div v-if="errors.city" class="text-danger" v-text="errors.city"></div></strong>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter your state" v-model="user_profile.profile.state">
                        <strong><div v-if="errors.state" class="text-danger" v-text="errors.state"></div></strong>
                    </div>
                    <div class="col-md-6"><label class="labels">Hobby</label><input type="text" class="form-control" v-model="user_profile.profile.hobby" placeholder="enter your hobby">
                        <strong><div v-if="errors.hobby" class="text-danger" v-text="errors.hobby"></div></strong>
                    </div>
                </div>
                <div class="mt-5 text-center"><button @click="save()" class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Role and Status and Avatar</span></div><br>
                <div class="col-md-12"><label class="labels">Role</label><input disabled type="text" class="form-control" placeholder="experience" v-model="user_profile.role"></div> <br>
                <div class="col-md-12"><label class="labels">Status</label><input disabled type="text" class="form-control" placeholder="additional details" v-model="user_profile.status"></div>
                <div class="col-md-12 mt-4"><label class="labels">Avatar</label><input @change="uploadimage" type="file" class="form-control" placeholder="additional details"></div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
props:{user_profile:Object,errors:Object,sessionStorage:Object},
methods:{
   
    uploadimage(e)
    {
        this.user_profile.profile.image = e.target.files[0];
    },
    save()
    {
        this.$inertia.post('/user/dashboards',this.user_profile.profile);
    },
}
}
</script>

<style>

</style>