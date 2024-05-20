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
                                                        <Link href="/admin/faqs" class="ms-auto">
                                                            <span class="material-symbols-outlined">arrow_back_ios</span>
                                                        </Link>
                                                        <div class="text-center text-md-center mb-4 mt-md-0">
                                                            <h1 class="mb-0 h4">Edit </h1>
                                                        </div>
                                                        <form action="" class="mt-4" @submit.prevent="submit">
                                                            <!-- Form -->
                                                            <div class="form-group mb-4">
                                                                <label for="email">Question</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="faq.question"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.question"
                                                v-text="errors.question"
                                            ></p> 
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="email">Answer</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                                    </span>
                                                                    <input type="text" class="form-control" 
                                                                    v-model="faq.answer"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.answer"
                                                v-text="errors.answer"
                                            ></p> 
                                                            </div>
                                                            <!-- End of Form -->
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
  props:{faq:Object,admin:Array,errors:Object},
  components: { Nav, SideBar, TopNav, footer },
  methods:{
      send()
      {
        this.faq._method = "PATCH";
        this.$inertia.post('/admin/faqs',this.faq);
      },
  }

}
</script>

<style>

</style>