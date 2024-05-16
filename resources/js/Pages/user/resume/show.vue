<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
      <div class="clearfix"></div>
      <Detail :errors="errors" :resume="resume"></Detail>
      <div class="margin-top-15"></div>
      <Footer></Footer>
  </div>
  </template>
  
  <script>
  import Nav from "../layouts/Nav-user.vue";
  import Footer from "../layouts/footer-user.vue";
  import Detail from '../components/resume/detail.vue';
  export default {
    components:{Nav,Footer,Detail},
    props:{authed_user:Array,errors:Object,resume:Object}
  }
  </script>
  
  <style>
  
  </style>