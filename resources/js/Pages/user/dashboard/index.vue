<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
      <div class="clearfix"></div>
      <Content :errors="errors" :user_profile="user_profile"  :authed_user="authed_user"></Content>
      <div class="margin-top-15"></div>
      <Footer></Footer>
  </div>
  </template>
  
  <script>
  import Nav from "../layouts/Nav-user.vue";
  import Footer from "../layouts/footer-user.vue";
  import Content from '../components/dashboard/content.vue';
  export default {
    components:{Nav,Footer,Content},
    props:{authed_user:Array,errors:Object,user_profile:Object}
  }
  </script>
  
  <style>
  
  </style>