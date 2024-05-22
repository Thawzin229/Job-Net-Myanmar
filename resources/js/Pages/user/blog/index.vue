<template>
  <div id="wrapper">
    <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <Content :errors="errors" :blogs="blogs" :recents="recents"></Content>
    <div class="margin-top-15"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Content from '../components/blog/content.vue';
export default {
  components:{Nav,Footer,Content},
props:{authed_user:Array,errors:Object,blogs:Object,recents:Array}
  
}
</script>

<style>

</style>