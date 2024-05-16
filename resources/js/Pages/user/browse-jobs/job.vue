<template>
  <div id="wrapper">
    <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <Detail :errors="errors" :job="job" :authed_user="authed_user"></Detail>
    <div class="margin-top-15"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Detail from '../components/browse-jobs/detail.vue'
export default {
  components:{Nav,Footer,Detail},
    props: { errors: Object ,job:Object,authed_user:Array},


}
</script>

<style>

</style>