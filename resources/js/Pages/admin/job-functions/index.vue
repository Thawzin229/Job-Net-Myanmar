<template>
  <div>
    <Nav></Nav>
        <SideBar></SideBar>
    <main class="content">

<TopNav :admin="admin"></TopNav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><Link href="/admin/dashboard">Dashboard</Link></li>
                <li class="breadcrumb-item active" aria-current="page"><Link href="/admin/job-functions">Job-functions</Link></li>
            </ol>
        </nav>
        <h2 class="h4">Job Types <span class="material-symbols-outlined">
work
</span></h2>
        <p class="mb-0">You can manage any job of types.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0 mx-5">
      <div class="col-lg-12">
                                    <!-- Button Modal -->
                                    <button type="button" class="btn btn-block btn-gray-800 px-4 mb-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-form-signup">
                                      <span class="material-symbols-outlined">add</span><span class="mx-2">add</span>
                                    </button>
                                    <!-- Modal Content -->
                                    <div class="modal fade" id="modal-form-signup" tabindex="-1" role="dialog" aria-labelledby="modal-form-signup" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card p-3 p-lg-4">
                                                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <div class="text-center text-md-center mb-4 mt-md-0">
                                                            <h1 class="mb-0 h4">Add Job</h1>
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
                                                                    v-model="job.name"
                                                                    placeholder="name" id="email" autofocus required>
                                                                </div> 
                                                                <p
                                                class="text-danger mt-2"
                                                v-if="errors.name"
                                                v-text="errors.name"
                                            ></p> 
                                                            </div>
                                                            <div class="d-grid">
                                                                <button @click="send()" type="submit" class="btn btn-gray-800">ADD</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Content -->
        </div>
        

    </div>
</div>
<div class="table-settings mb-4">
    <div class="row align-items-center justify-content-between">
        <div class="col col-md-6 col-lg-3 col-xl-4">
            <div class="input-group me-2 me-lg-3 fmxw-400">
                <span class="input-group-text">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" v-model="search" class="form-control" placeholder="Search orders">
            </div>
        </div>
        <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
            <div class="dropdown">
                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0">
                    <span class="small ps-3 fw-bold text-dark">Show</span>
                    <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <svg class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg></a>
                    <a class="dropdown-item fw-bold" href="#">20</a>
                    <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">#</th>
                <th class="border-gray-200">Name</th>
                <th class="border-gray-200">Date</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            <tr class="shadow border p-5 " v-for="(job,index) in datas.data" :key="index">
                <td>
                    <a href="#" class="fw-bold">
                        {{ job.id }}
                    </a>
                </td>
                <td><span class="fw-normal">{{ job.name }}</span></td>
                <td><span class="fw-normal">{{ job.date }}</span></td>                        
                <td><span class="fw-bold px-2 py-1 text-white" style="border-radius: 20px" :class="job.status==='active'?'bg-success':'bg-warning'">{{ job.status }}</span></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                            <span class="material-symbols-outlined">
format_list_bulleted
</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <Link class="dropdown-item" :href="'/admin/job-functions/'+job.id"><span class="fas fa-edit me-2"></span>Edit</Link>
                            <Link class="dropdown-item text-danger rounded-bottom" :href="'/admin/job-functions/'+job.id" method="DELETE"><span class="fas fa-trash-alt me-2"></span>Remove</Link>
                        </div>
                    </div>
                </td>
            </tr>                          
        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                <li class="page-item d-flex" v-if="datas.data.length !==0">
                    <Component  preserve-scroll :is="link.url?'Link':'span'" class="page-link" :href="link.url" v-for="(link,index) in datas.links" :key="index" v-html="link.label"></Component>
                </li>

            </ul>
        </nav>
    </div>
</div>
<div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
<div class="card-body bg-gray-800 text-white pt-4">
<button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
<div class="d-flex justify-content-between align-items-center mb-3">
<p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
<a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
    data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
    data-size="large" data-show-count="true"
    aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
</div>
<a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank"
class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
Download 
<svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
</a>
<p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
<div class="d-flex justify-content-center">
<a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
    target="_blank">
    <img src="../assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
</a>
<a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
    <img src="../assets/img/technologies/react-logo.svg" class="image image-xs">
</a>
</div>
</div>
</div>

<div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
<div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
<span class="fw-bold d-inline-flex align-items-center h6">
<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
Settings
</span>
</div>
</div>

<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
<div class="row">
<div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
<p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
</div>
<div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
<!-- List -->
<ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
    <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/about">About</a>
    </li>
    <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/themes">Themes</a>
    </li>
    <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/blog">Blog</a>
    </li>
    <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/contact">Contact</a>
    </li>
</ul>
</div>
</div>
</footer>
</main>
<footer></footer>
  </div>
</template>
<script>

import Nav from "../layouts/Nav/Nav.vue";
import SideBar from "../layouts/Nav/SideNav.vue";
import TopNav from "../layouts/Nav/TopNav.vue";
import footer from "../layouts/Footer/footer.vue";
import debounce from "lodash/debounce";
export default {
    props: { admin: Array ,errors:Object,datas:Object},
    data:()=>({
      job:{name:''},
      search:''
    }),
    watch:{
      search:debounce(function(val)
      {
        this.$inertia.get('/admin/job-functions',{'search':val},{preserveState:true,replace:true});
      },1000)
    },
    methods:{
      send()
      {
        this.$inertia.post('/admin/job-functions',this.job);
      },
    },
    components: { Nav, SideBar, TopNav, footer },
};
</script>

<style>

</style>