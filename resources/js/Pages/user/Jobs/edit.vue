<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <UpdateForm :job="job" :errors="errors" :form_data="form_data"></UpdateForm>
    <div class="margin-top-15"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import UpdateForm from '../components/jobs/form-update.vue';
export default {
  components:{Nav,Footer,UpdateForm},
  props:{authed_user:Array,job:Object,errors:Object,form_data:Array}
  
}
</script>

<style>

</style>