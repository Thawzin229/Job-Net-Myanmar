<template>
    <div>
        <div id="wrapper">
            <Nav :authed_user="authed_user"></Nav>
            <div class="clearfix"></div>
            <Banner :locations="locations" :job_count="jobs.data.length"></Banner>
            <Category :categories="categories"></Category>
            <Jobs :jobs="jobs"></Jobs>
            <Testimonials :reviews="reviews"></Testimonials>
            <Info></Info>
            <Post></Post>
            <div class="margin-top-15"></div>
            <Footer></Footer>
            <div id="backtotop"><a href="#"></a></div>
        </div>
    </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Banner from "../components/home-page/Banner.vue";
import Category from "../components/home-page/Category.vue";
import Jobs from "../components/home-page/Jobs.vue";
import Testimonials from "../components/home-page/Testimonials.vue";
import Info from "../components/home-page/Info.vue";
import Post from "../components/home-page/Post.vue";
export default {
    components: {
        Nav,
        Footer,
        Banner,
        Category,
        Jobs,
        Testimonials,
        Info,
        Post,
    },
    props:{
        authed_user:Array,
        categories:Array,
        locations:Array,
        reviews:Array,
        jobs:Object,

    }
};
</script>

<style></style>
