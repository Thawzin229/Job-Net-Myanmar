<template>
  <div>
    <!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Blog</h2>
			<span>Keep up to date with the latest news</span>
		</div>


    <div class="six columns">
                    <Link href="/user/blogs/createpage" class="button"
                        >Post a Blog, It’s Free!</Link
                    >
                </div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
  <div class="row">
	<div class="col-lg-8">
		<div class="padding-right">

			<!-- Post -->
			<div class="post-container" v-for="(blog,index) in blogs.data" :key="index">
				<div class="post-img"><Link >
          <img v-if="blog.image" style="width: 100%;height: 370px;" :src="'http://127.0.0.1:8000/storage/blog_images/'+blog.image" alt="">
          <img  v-if="!blog.image" style="width: 100%;height: 370px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAACUCAMAAADhypYgAAAAMFBMVEXp7vG6vsHs8fTCxsnk6ezg5ejV2t28wcTHy863u77Y3eDP1NbS19q0uLvM0NPb4OMON2S8AAAC3ElEQVR4nO2b25aDIAxFMXhDUf//b0et2lLQOoKQdp39OFNb9oIACSIEAAAAAAAAAAAAAAAAAAAAACA5FJZkFnlgRAoXoqGuAiP7PLoJ5bLLgqNUG9ujqFR4j0mljdwn9T0eo0kT04SauzwyVUUVkbeJZF0Z0+Th0RdBaeTcJX08EcpnkaoIvCDqWaROIRL2a8u5n39AREPk6i+6RPy3fSxEKC/7vi8LHxcGIiTqTE1bJVV7DDcGIo1aF0jV6cvtSC6yTJurymWT5CKFucdQV0dXahHqzY2Xkl8qUrxnWFd34olFqLVELm77UovYOdZRU2jYzWZTi9i5iTx4tNjPZlOLOHpk/8lphttbalKLtOdFaKjmINLu/yYWsWatbC9ZXTxGnCapp19hVYbyncdeakiu0ZVa5L2kslc9oNcdgGsjk1pECCNK9nJuGkxd2yS9iOi33e+4GgpnQ6zapB3xDEREmXXTn1TnDuPZ431KsOKEgwgJLcfUSmp3d6xPmLyvjBxE5pRd7J5vUGFrzHFifoqFyOHnC+kUycxTBPYirvhwxQl3EWd8uOKEuchOfGxx8jThLXI0rh59so0uZiLarD+eOKNbI56VyLipr16OZik/cda49gknkbmi8jT5EB8rS5xwEmnNyt2n+NhMBuIlsm6D5ZJynT3DfhSQ2IhQu7VsGl2n4oOjiJm85yfjg6GIWaiTzcn4YCeiz7ebswj5eDASIe31KgQbEUeR7itF/MYVHxFvDyYinvHBRsQ+6PlWkQDvbvEQCfBWIA+Rn+kRiEAEIh9EfmUd6SvpDYviQ5ALF4KBSLivhcjlX/w1kcD3b+KLrC/567C3xUQ9T8UxRWiZ//3n3VcehbCod3p8iw1HqJgXxij/Rxnxnx5RQ+S+u0kq9Azy0aS8xaQLPaWfMMnl9C58ULJKJ7gbSqJoyrA08S+GLi6hSaMBAAAAAAAAAAAAAAAAAAAAAHjyB/T5NCBAGKkWAAAAAElFTkSuQmCC" alt="">
        </Link><div class="hover-icon"></div></div>
				<div class="post-content">
					<a href="#"><h3>{{blog.title}}</h3></a>
					<div class="meta-tags">
						<span>{{ blog.date }}</span>
						<span><a href="#">0 Comments</a></span>
					</div>
					<p>{{ blog.statement }}</p>
					<Link class="button" :href="'/user/blogs/'+blog.id">Read More</Link>
				</div>
			</div>

			<!-- Pagination -->
      <div class="pagination-container d-flex justify-content-center mt-5">
			<nav class="pagination-next-prev mt-5">
				<ul class="d-flex">
				<li v-for="(link,index) in blogs.links"  :key="index" ><Link  preserve-scroll class="mx-1" :href="link.url" v-html="link.label"></Link></li>
				</ul>
			</nav>
		</div>

		</div>
	</div>
	<!-- Blog Posts / End -->


	<!-- Widgets -->
	<div class="col-lg-4 blog">

		<!-- Search -->
		<div class="widget">
			<h4>Search</h4>
			<div class="widget-box search">
				<div class="input"><input class="search-field" type="text" placeholder="To search type and hit enter" value=""/></div>
			</div>
		</div>

		<div class="widget">
			<h4>Got any questions?</h4>
			<div class="widget-box">
				<p>If you are having any questions, please feel free to ask.</p>
				<a href="contact.html" class="button widget-btn"><i class="fa fa-envelope"></i> Drop Us a Line</a>
			</div>
		</div>

		<!-- Tabs -->
		<div class="widget">

			<ul class="tabs-nav blog">
				<li class="active"><a href="#tab1">Popular</a></li>
				<li><a href="#tab2">Featured</a></li>
				<li><a href="#tab3">Recent</a></li>
			</ul>

			<!-- Tabs Content -->
			<div class="tabs-container">

				<div class="tab-content" id="tab1">
					
					<!-- Recent Posts -->
					<ul class="widget-tabs">
						
						<!-- Post #1 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">How to "Woo" a Recruiter and Land Your Dream Job</a></h5>
								<span>September 12, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
						
						<!-- Post #2 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">Hey Job Seeker, It’s Time To Get Up And Get Hired</a></h5>
								<span>October 10, 2015</span>
							</div>
							<div class="clearfix"></div>

						</li>
						
						<!-- Post #3 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">11 Tips to Help You Get New Clients Through Cold Calling</a></h5>
								<span>August 27, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
		
				</div>

				<div class="tab-content" id="tab2">
				
					<!-- Featured Posts -->
					<ul class="widget-tabs">

						<!-- Post #1 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">Hey Job Seeker, It’s Time To Get Up And Get Hired</a></h5>
								<span>October 10, 2015</span>
							</div>
							<div class="clearfix"></div>

						</li>
						
						<!-- Post #2 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">How to "Woo" a Recruiter and Land Your Dream Job</a></h5>
								<span>September 12, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
						
						<!-- Post #3 -->
						<li>
							<div class="widget-thumb">
								<a href="blog-single-post.html"><img src="" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">11 Tips to Help You Get New Clients Through Cold Calling</a></h5>
								<span>August 27, 2015</span>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>

				<div class="tab-content" id="tab3">
				
					<!-- Recent Posts -->
					<ul class="widget-tabs">
						
						<!-- Post #1 -->
						<li v-for="(blog,index) in recents" :key="index">
							<div class="widget-thumb">
								<a href=""><img :src="'http://127.0.0.1:8000/storage/blog_images/'+blog.image" alt="" /></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="blog-single-post.html">{{ blog.title }}</a></h5>
								<span>{{ blog.date }}</span>
							</div>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>
				
			</div>
		</div>


		<div class="widget">
			<h4>Social</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>

		</div>
		
		<div class="clearfix"></div>
		<div class="margin-bottom-40"></div>

	</div>
</div>
	<!-- Widgets / End -->


</div>
  </div>
</template>

<script>
export default {
  props:{blogs:Object,recents:Array}
}
</script>

<style>

</style>