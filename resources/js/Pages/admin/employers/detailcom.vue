<template>
  <div>
<div class="blog-single gray-bg">
    <div class="container">
        <div class="row align-items-start">
            <Link class="text-end" :href="'/admin/campanies/edit/'+campany.id">
                <span class="material-symbols-outlined">edit</span>
            </Link>
            <div class="col-lg-8 m-15px-tb" >
                <article class="article">
                    <div class="article-img">
                            <strong>
                                <h4 class="text-decoration-underline">{{ campany.name }}</h4>
                            </strong>
                            <img style="width:100%;height: 300px;" :src="'http://localhost:8000/storage/campany_images/'+campany.image" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h6><a href="#">Statement</a></h6>
                            <h2>{{ campany.statement }}</h2>
                            <!-- <div class="media">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label>Rachel Roth</label>
                                    <span>26 FEB 2020</span>
                                </div>
                            </div> -->
                        </div>
                        <div class="article-content">
                            <h4>Visions</h4>
                            <p>{{ campany.visions }}</p>
                            <hr>
                            <h4>What can we do ?</h4>
                            <p>{{campany.what_we_do}}</p>
                            <hr>
                            <h4>Why you should choose us?</h4>
                            <p>{{campany.why_you_should_us}}</p>
                        </div>
                        <div class="nav tag-cloud">
                            <a href="#">{{ campany.type }}</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Employer</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <h6>Hello, I'm<br> {{ campany.employee }}</h6>
                                </div>
                            </div>
                            <p></p>
                        </div>
                    </div>
                    <!-- End Author -->
                    <!-- Trending Post -->
                    <div class="widget widget-post">
                        <div class="widget-title">
                            <h3>Address</h3>
                            <p>{{campany.address}}</p>
                        </div>
                        <div class="widget-body">

                        </div>
                    </div>
                    <!-- End Trending Post -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Campany images</h3>
                        </div>
                        <div class="widget-body">
                            <div class="latest-post-aside media" v-for="(img,index) in gallery" :key="index">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Memories and achievements of this campany {{ index+1 }}</a></h5>
                                    </div>
                                    <div class="lpa-meta mb-2">
                                        <a class="date" href="#">
                                            {{ img.date }}
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img :src="'http://localhost:8000/storage/campany_gallery/'+img.image" title="" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Post -->
                </div>
            </div>
        </div>
</div>
  </div>
</template>

<script>
export default {
    props: {campany:Object,gallery:Array},

}
</script>

<style>

</style>