<template>
    <div id="wrapper">
        <Nav :authed_user="authed_user"></Nav>
        <div class="clearfix"></div>
        <Detail
            :errors="errors"
            :blog="blog"
            :recents="recents"
            :populars="populars"
            :authed_user="authed_user"
            :cmts="cmts"
        ></Detail>
        <div class="margin-top-15"></div>
        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../layouts/Nav-user.vue";
import Footer from "../layouts/footer-user.vue";
import Detail from "../components/blog/detail.vue";
export default {
    components: { Nav, Footer, Detail },
    props: {
        authed_user: Array,
        errors: Object,
        blog: Array,
        recents: Array,
        cmts: Object,
        populars: Array,
    },
};
</script>

<style></style>
