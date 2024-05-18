<template>
  <div>
    <div class="container">
    <div class="main-body mt-5">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-5">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img v-if="user_profile.profile.avatar" :src="user_profile.profile.avatar" alt="Admin" class="rounded-circle" width="150">
                    <img style="border-radius: 50%;width: 100px;height: 100px;" v-if="user_profile.profile.image" :src="'http://127.0.0.1:8000/storage/user_profile_images/'+user_profile.profile.image" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ user_profile.profile.name }}</h4>
                      <p class="text-dark mb-1">{{ user_profile.profile.job }}</p>
                      <p class="text-muted font-size-sm">{{ user_profile.profile.address }}</p>
                      <Link href="/user/dashboards/password" v-if="user_profile.google_id === null &&user_profile.github_id === null ">
                        <button class="btn btn-outline-primary">Change Password</button>
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush" v-if="user_profile.resume.length !== 0">
                  <li v-for="(link,index) in user_profile.resume[0].socials" :key="index" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 v-if="link.name === 'website'" class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <h6 v-if="link.name === 'github'" class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <h6 v-if="link.name === 'twitter'" class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <h6 v-if="link.name === 'instagram'" class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-dark"><a :href="link.link" target="_blank">{{ link.link }}</a></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      {{ user_profile.profile.name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                      {{ user_profile.email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div v-if="user_profile.profile.phone" class="col-sm-9 text-dark">
                      {{ user_profile.profile.phone }}
                    </div>
                    <div  v-else class="col-sm-9 text-dark">
                      NO PHONE 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-muted">
                      {{ user_profile.profile.gender }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div  v-if="user_profile.profile.address" class="col-sm-9 text-dark">
                      {{ user_profile.profile.address }}
                    </div>
                    <div  v-else class="col-sm-9 text-dark">
                      NO ADDRESS 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <Link class="btn btn-info " target="__blank" href="/user/dashboards/edit">Edit</Link>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3 col-lg-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <h4 class="mb-3">My Applications</h4>
                      <table class="manage-table responsive-table">

<tr>
  <th><i class="fa fa-file-text"></i>Name</th>
  <th><i class="fa fa-file-text"></i>Email</th>
  <th><i class="fa fa-user"></i>CV</th>
  <th><i class="fa fa-user"></i>Status</th>
  <th></th>
</tr>
    
<!-- Item #1 -->
<tr v-for="(app,index) in user_profile.applications" :key="index">
  <td class="title"><a href="#">{{ app.full_name }}<span class="pending"></span></a></td>
  <td class="title"><a href="#">{{ app.email }}<span class="pending"></span></a></td>
  <td><a :href="'http://127.0.0.1:8000/storage/application_images/'+app.cv">CV</a></td>
  <td class="title"><a href="#">{{ app.status }}<span class="pending"></span></a></td>
</tr>




</table>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
</div>
</template>

<script>
export default {
props:{user_profile:Object,authed_user:Array}
}
</script>

<style>

</style>