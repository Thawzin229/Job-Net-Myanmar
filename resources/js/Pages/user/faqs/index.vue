<template>
  <div>
    <Nav :authed_user="authed_user"></Nav>
      <div class="clearfix"></div>
      <Content :faqs="faqs" ></Content>
      <div class="margin-top-15"></div>
      <Footer></Footer>
  </div>
  </template>
  
  <script>
  import Nav from "../layouts/Nav-user.vue";
  import Footer from "../layouts/footer-user.vue";
  import Content from '../components/faqs/content.vue';
  export default {
    components:{Nav,Footer,Content},
    props:{authed_user:Array,faqs:Array}
  }
  </script>
  
  <style>
  
  </style>