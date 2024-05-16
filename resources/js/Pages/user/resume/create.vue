<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
      <div class="clearfix"></div>
      <Content :errors="errors"></Content>
      <div class="margin-top-15"></div>
      <Footer></Footer>
  </div>
  </template>
  
  <script>
  import Nav from "../layouts/Nav-user.vue";
  import Footer from "../layouts/footer-user.vue";
  import Content from '../components/resume/content.vue';
  export default {
    components:{Nav,Footer,Content},
    props:{authed_user:Array,errors:Object}
  }
  </script>
  
  <style>
  
  </style>