<template>
  <div>
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span>We've found {{ resumes.data.length }} resumes for:</span>
			<h2>Web, Software & IT</h2>
		</div>

		<div class="six columns">
			<Link href="/user/resumes/create" class="button">Post a Resume, It’s Free!</Link>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
  <div class="row">
	<div class="col-lg-8">
	<div class="padding-right">
		
		<form action="#" @submit="submit.prevent" method="get" class="list-search">
			<button><i class="fa fa-search"></i></button>
			<input type="text"   v-model="search"  placeholder="Search freelancer or developer  (e.g.mobile , web)" value=""/>
			<div class="clearfix"></div>
		</form>

		<ul class="resumes-list">

			<li v-for="(resume,index) in resumes.data" :key="index"><Link :href="'/user/resumes/'+resume.id">
				<img :src="'http://127.0.0.1:8000/storage/resume_images/'+resume.image" alt="">
				<div class="resumes-list-content">
					<h4>{{ resume.name }}<span>{{ resume.professional_title }}</span></h4>
					<span><i class="fa fa-map-marker"></i>{{ resume.location }}</span>
					<span><i class="fa fa"></i>{{resume.date}}</span>
					<p>{{ resume.resume_content }}</p>

					<div class="skills">
						<span v-for="(skill,index) in resume.socials" :key="index">{{ skill.name }}</span>
					</div>
					<div class="clearfix"></div>

				</div>
      </Link>
				<div class="clearfix"></div>
			</li>


		</ul>
		<div class="clearfix"></div>


	</div>

  <div class="pagination-container d-flex justify-content-center mt-5">
			<nav class="pagination-next-prev mt-5">
				<ul class="d-flex">
				<li v-for="(link,index) in resumes.links"  :key="index" ><Link  preserve-scroll class="mx-1" :href="link.url" v-html="link.label"></Link></li>
				</ul>
			</nav>
		</div>
	</div>


	<!-- Widgets -->
	<div class="col-lg-4">

    <div class="widget">
                        <h4>Sort by</h4>

                        <!-- Select -->
                        <select
                            v-model="param.sorting"
                            data-placeholder="Choose Category"
                            id="job-input"
                            class="form-control"
                        >
                        <option value="">Sorting</option>
                            <option value="desc">
                                Newest
                            </option>
                            <option value="asc">Oldest</option>
                        </select>
                    </div>

                    <!-- Location -->
                    <div class="widget">
                        <h4>Location</h4>
                        <form @submit.prevent="submit">
                            <select
                                v-model="param.location"
                                data-placeholder="Choose Category"
                                id="job-input"
                                class="form-control"
                            >
                        <option value="">Locations</option>
                                <option
                                    v-for="(loca, index) in data.location"
                                    :key="index"
                                    :value="loca.name"
                                >
                                    {{ loca.name }}
                                </option>
                            </select>
                        </form>
                    </div>
                    <button class="button w-100 mt-4" @click="filter()">
                        Filter
                    </button>

	</div>
</div>
	<!-- Widgets / End -->


</div>

  </div>
</template>

<script>
import debounce from 'lodash/debounce';
export default {
  props:{errors:Object,resumes:Object,data:Object},
  data:()=>({
    param: {
            sorting: "",
            location: "",
        },
        search:""
  }),
  methods:{
      filter() {
            this.$inertia.get(
                "/user/browse-resumes",
                { param: this.param },
                { preserveState: true, replace: true }
            );
        },
  },
  watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/user/browse-resumes",
                { search: val },
                { preserveState: true,replace:true },
							);
        },1000)
    },
}
</script>

<style>

</style>