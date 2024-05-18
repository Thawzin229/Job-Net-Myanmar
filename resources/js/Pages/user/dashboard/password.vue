<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
      <div class="clearfix"></div>
      <Password :errors="errors"></Password>
      <div class="margin-top-15"></div>
      <Footer></Footer>
  </div>
  </template>
  
  <script>
  import Nav from "../layouts/Nav-user.vue";
  import Footer from "../layouts/footer-user.vue";
  import Password from '../components/dashboard/password.vue';
  export default {
    components:{Nav,Footer,Password},
    props:{authed_user:Array,errors:Object}
  }
  </script>
  
  <style>
  
  </style>