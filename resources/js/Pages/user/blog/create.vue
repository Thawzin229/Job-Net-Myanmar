<template>
  <div id="wrapper">
    <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <Form :errors="errors"></Form>
    <div class="margin-top-15"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Form from '../components/blog/form.vue';
export default {
  components:{Nav,Footer,Form},
  props:{authed_user:Array,errors:Object}
  
}
</script>

<style>

</style>