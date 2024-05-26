<template>
  <div>
    <header>
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1 class="" style=""><a href="/user/home"><img class="w-25" src="" alt="JOBNET" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="index.html" id="current">Home</a>
					<ul>
						<li><a href="index.html">Home #1</a></li>
						<li><a href="index-2.html">Home #2</a></li>
						<li><a href="index-3.html">Home #3</a></li>
						<li><a href="index-4.html">Home #4</a></li>
					</ul>
				</li>

				<li><a href="#">Pages</a>
					<ul>
						<li><Link href="/user/jobs">Job Page</Link></li>
						<li><Link href="/user/resumes">Resume Page</Link></li>
						<li><a href="/user/faqs">FAQs</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</li>

				<li><a href="#">For Candidates</a>
					<ul>
						<li><Link href="/user/jobs">Browse Jobs</Link></li>
						<li><Link href="/user/browse-categories">Browse Categories</Link></li>
						<li><Link href="/user/book-marks">Bookmarked Jobs</Link></li>
						<li><Link href="/user/resumes">My Resume</Link></li>
						<li><Link href="/user/resumes/create">Add Resume</Link></li>
						<li><Link href="/user/resumes">Manage Resume</Link></li>
						<li><a href="/user/reviews">Add Reviews</a></li>
					</ul>
				</li>

				<li><a href="#">For Employers</a>
					<ul>
						<li><Link href="/user/add-job">Add Job</Link></li>
						<li><Link href="/user/manage-job">Manage Jobs</Link></li>
						<li><Link href="/user/browse-resumes">Browse Resumes</Link></li>
					</ul>
				</li>

				<li><a href="/user/blogs/">Blog</a></li>

	

			</ul>


			<ul class="float-right" v-if="authed_user.length === 0">
				<li><Link href="/user/auth/sign-up"><i class="fa fa-user"></i> Sign Up</Link></li>
				<li><Link href="/user/auth/sign-in"><i class="fa fa-lock"></i> Log In</Link></li>
			</ul>
			<ul class="float-right" v-if="authed_user.length !==0">
				<li><a href="#"><span class="material-symbols-outlined">person</span></a>
					<ul>
						<li><Link href="/user/dashboards">Profile</Link></li>
						<li><Link href="/user/auth/logout" method="post"><i class="fa fa-lock"></i>Logout</Link></li>
					</ul>
				</li>
			</ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
  </div>
</template>

<script>
export default {
	props:{authed_user:Array}

}
</script>

<style>

</style>