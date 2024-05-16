<template>
  <div>
    <Nav></Nav>
        <SideBar></SideBar>
<main class="content">
    <div class="d-flex  justify-content-center align-items-center" style="height: 100vh;">
                                    <!-- Modal Content -->
                                    <div class="col-12" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card p-3 p-lg-4">
                                                        <Link href="/admin/categories" class="ms-auto">
                                                            <span class="material-symbols-outlined">arrow_back_ios</span>
                                                        </Link>
                                                        <div class="text-center text-md-center mb-4 mt-md-0">
                                                            <h1 class="mb-0 h4">Edit </h1>
                                                        </div>
                                                        <form action="" class="mt-4" @submit.prevent="submit">
                                                            <!-- Form -->
                                                            <div class="form-group mb-4">
                                                                <label for="email">Name</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="category_update.name"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.name"
                                                v-text="errors.name"
                                            ></p> 
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="email">Status</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <select v-model="category_update.status" id="" class="form-control">
                                                                      <option value="active">Active</option>
                                                                      <option value="pending">Pending</option>
                                                                    </select>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.status"
                                                v-text="errors.status"
                                            ></p> 
                                                            </div>
                                                            <!-- End of Form -->
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
  props:{category_update:Object,admin:Array,errors:Object},
  components: { Nav, SideBar, TopNav, footer },
  methods:{
    uplaodImage(e)
      {
          this.category_update.image = e.target.files[0];
      },
      send()
      {
        this.category_update._method = "PATCH";
        this.$inertia.post('/admin/categories',this.category_update);
      },
  }

}
</script>

<style>

</style>