<template>
  <div>
    <Nav></Nav>
        <SideBar></SideBar>
<main class="content">
    <div class="d-flex col-12  justify-content-center align-items-center" style="height: 200vh;">
                                    <!-- Modal Content -->
                                    <div class="w-100" id="modal-form-signup" tabindex="" role="dialog" aria-labelledby="modal-form-signup" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card p-3 p-lg-4">
                                                        <Link :href="'/admin/campanies/'+campany.id" class="ms-auto">
                                                            <span class="material-symbols-outlined">arrow_back_ios</span>
                                                        </Link>
                                                        <div class="text-center text-md-center mb-4 mt-md-0">
                                                            <h1 class="mb-0 h4">Edit </h1>
                                                        </div>
                                                        <form action="" class="mt-4 col-12" @submit.prevent="submit">
                                                            <div class="d-flex">
                                                            <!-- name -->
                                                            <div class="form-group mb-4 me-4">
                                                                <label for="email">Name</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="campany.name"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.name"
                                                v-text="errors.name"
                                            ></p> 
                                                            </div>
                                                            <!-- statement -->
                                                            <div class="form-group mb-4">
                                                                <label for="email">Stetement</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="campany.statement"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.statement"
                                                v-text="errors.statement"
                                            ></p> 
                                                            </div>
                                                        </div>
                                                           <!-- type -->
                                                           <div class="form-group mb-4">
                                                                <label for="email">Type </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="campany.type"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.type"
                                                v-text="errors.type"
                                            ></p> 
                                                            </div>
                                                             <!-- employee -->
                                                             <div class="form-group mb-4">
                                                                <label for="email">Employee</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="campany.employee"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.employee"
                                                v-text="errors.employee"
                                            ></p> 
                                                            </div>
                                                             <!-- address -->
                                                             <div class="form-group mb-4">
                                                                <label for="email">Address</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="campany.address"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.address"
                                                v-text="errors.address"
                                            ></p> 
                                                            </div>
                                                            <!-- visions -->
                                                            <div class="form-group mb-4">
                                                                <label for="email">Visions</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <textarea v-model="campany.visions" name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.visions"
                                                v-text="errors.visions"
                                            ></p> 
                                                            </div>
                                                            <!-- what we do -->
                                                            <div class="form-group mb-4">
                                                                <label for="email">What we do </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <textarea v-model="campany.what_we_do" name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.what_we_do"
                                                v-text="errors.what_we_do"
                                            ></p> 
                                                            </div>
                                                             <!-- why you should choose ua -->
                                                             <div class="form-group mb-4">
                                                                <label for="email">Why you should choose us </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <textarea v-model="campany.why_you_should_us" name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.why_you_should_us"
                                                v-text="errors.why_you_should_us"
                                            ></p> 
                                                            </div>
                                                          
                                                            <!-- logo -->
                                                            <div class="form-group">
                                                                <!-- Form -->
                                                                <div class="form-group mb-4">
                                                                    <label for="password">Logo</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="basic-addon2">
                                                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                                                        </span>
                                                                        <input type="file" placeholder="logo"
                                                                        @change="uplaodImage"
                                                                       class="form-control" id="password" required>
                                                                    </div>  
                                                                    <p
                                                class="text-danger mt-2"
                                                v-if="errors.image"
                                                v-text="errors.image"
                                            ></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <!-- gallery -->
                                                                <div class="form-group mb-4">
                                                                    <label for="password">Gallery</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="basic-addon2">
                                                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                                                        </span>
                                                                        <input multiple type="file" placeholder="logo"
                                                                        @change="uplaodImages"
                                                                       class="form-control" id="password" required>
                                                                    </div>  
                                                                    <p
                                                class="text-danger mt-2"
                                                v-if="errors.image"
                                                v-text="errors.image"
                                            ></p>
                                                                </div>
                                                            </div>
                                                            <div class="d-grid">
                                                                <button @click="send()" type="submit" class="btn btn-gray-800">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Content -->
    </div>
  </main>
  </div>
</template>

<script>
import Nav from "../layouts/Nav/Nav.vue";
import SideBar from "../layouts/Nav/SideNav.vue";
import TopNav from "../layouts/Nav/TopNav.vue";
import footer from "../layouts/Footer/footer.vue";
export default {
  props:{campany:Object,admin:Array,errors:Object},
  components: { Nav, SideBar, TopNav, footer },
  methods:{
    uplaodImage(e)
      {
          this.campany.image = e.target.files[0];
      },
      uplaodImages(e)
      {
          this.campany.gallery = e.target.files;
      },
      send()
      {
        this.campany._method = "PATCH";
        this.$inertia.post('/admin/campanies',this.campany);
      },
  }

}
</script>

<style>

</style>