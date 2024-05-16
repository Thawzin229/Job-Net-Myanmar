<template>
<div>
  <Nav :authed_user="authed_user"></Nav>
    <div class="clearfix"></div>
    <Content :jobs="jobs" :errors="errors" :data="data"></Content>
    <div class="margin-top-15"></div>
    <Footer></Footer>
</div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Content from '../components/browse-jobs/content.vue';
export default {
  components:{Nav,Footer,Content},
  props:{authed_user:Array,errors:Object,jobs:Object,data:Object}
}
</script>

<style>

</style>