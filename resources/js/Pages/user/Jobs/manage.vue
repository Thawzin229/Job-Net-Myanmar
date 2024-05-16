<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <ManageJob :jobs="jobs"></ManageJob>
    <div class="margin-top-15"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import ManageJob from '../components/jobs/manage.vue'
export default {  
  components:{Nav,Footer,ManageJob},
  props:{authed_user:Array,errors:Object,jobs:Array}
}
</script>

<style>

</style>