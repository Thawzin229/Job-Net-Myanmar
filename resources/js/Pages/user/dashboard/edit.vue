<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
      <div class="clearfix"></div>
      <Edit :errors="errors" :user_profile="user_profile"></Edit>
      <div class="margin-top-15"></div>
      <Footer></Footer>
  </div>
  </template>
  
  <script>
  import Nav from "../layouts/Nav-user.vue";
  import Footer from "../layouts/footer-user.vue";
  import Edit from '../components/dashboard/edit.vue';
  export default {
    components:{Nav,Footer,Edit},
    props:{authed_user:Array,errors:Object,user_profile:Object}
  }
  </script>
  
  <style>
  
  </style>