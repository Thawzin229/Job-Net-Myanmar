<template>
  <div id="wrapper">
    <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <Form :form_data="form_data" :errors="errors"></Form>
    <div class="margin-top-15"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Form from '../components/jobs/form.vue';
export default {
  components:{Nav,Footer,Form},
  props:{authed_user:Array,form_data:Array,errors:Object}
  
}
</script>

<style>

</style>