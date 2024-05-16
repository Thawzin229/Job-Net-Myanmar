<template>
  <div>
      <div id="titlebar">
          <div class="container">
              <div class="ten columns">
                  <span>We found 1,412 jobs matching:</span>
                  <h2>Web, Software & IT</h2>
              </div>

              <div class="six columns">
                  <Link href="/user/add-job" class="button"
                      >Post a Job, It’s Free!</Link
                  >
              </div>
          </div>
      </div>

      <div class="container">
          <!-- Recent Jobs -->
          <div class="row">
              <div class="col-lg-12 col-sm-12">
                  <div class="padding-right">
                      <form @submit.prevent="submit" class="list-search">
                          <button><i class="fa fa-search"></i></button>
                          <input
                              type="search"
                              placeholder="job title, keywords or company name"
                              v-model="search"
                          />
                          <div class="clearfix"></div>
                      </form>

                      <ul class="job-list full">
                          <li
                              v-for="(job, index) in jobs.data"
                              :key="index"
                              class="col-sm-12"
                          >
                              <Link :href="'/user/jobs/'+job.id">
                                  <img
                                      src="../../../../../../public/user/images/company-logo.png"
                                  />
                                  <div class="job-list-content">
                                      <div class="d-flex justify-content-between">
                                      <div>
                                      <h4
                                          v-if="
                                              job.jobdetails.job_type_name ===
                                              'full_time'
                                          "
                                      >
                                          {{ job.jobdetails.job_title }}
                                          <span class="full-time">{{
                                              job.jobdetails.job_type_name
                                          }}</span>
                                      </h4>
                                      <h4
                                          v-if="
                                              job.jobdetails.job_type_name ===
                                              'part_time'
                                          "
                                      >
                                          {{ job.jobdetails.job_title }}
                                          <span class="part-time">{{
                                              job.jobdetails.job_type_name
                                          }}</span>
                                      </h4>
                                      <h4
                                          v-if="
                                              job.jobdetails.job_type_name ===
                                              'internship'
                                          "
                                      >
                                          {{ job.jobdetails.job_title }}
                                          <span class="internship">{{
                                              job.jobdetails.job_type_name
                                          }}</span>
                                      </h4>
                                      <h4
                                          v-if="
                                              job.jobdetails.job_type_name ===
                                              'freelance'
                                          "
                                      >
                                          {{ job.jobdetails.job_title }}
                                          <span class="freelance">{{
                                              job.jobdetails.job_type_name
                                          }}</span>
                                      </h4>
                                  </div>
                                  <div v-if="job.jobdetails.is_applied" title="already applied"><i class="fa fa-star"></i></div>
                                  </div>

                                      <div class="job-icons">
                                          <span
                                              ><i class="fa fa-briefcase"></i>
                                              {{ job.campany_name }}</span
                                          >
                                          <span
                                              ><i
                                                  class="fa fa-map-marker"
                                              ></i>
                                              {{
                                                  job.jobdetails.location_name
                                              }}</span
                                          >
                                          <span
                                              ><i class="fa fa-money"></i> ${{
                                                  job.jobdetails.fee
                                              }}
                                              / hour</span
                                          >
                                      </div>
                                      <p>{{ job.jobdetails.main_description }}</p>
                                  </div>
                              </Link>
                              <div class="clearfix"></div>
                          </li>
                      </ul>
                      <div class="clearfix"></div>

                      <div
                          class="pagination-container d-flex justify-content-center"
                      >
                          <nav class="pagination-next-prev mt-5">
                              <ul class="d-flex">
                                  <li
                                      v-for="(link, index) in jobs.links"
                                      :key="index"
                                  >
                                      <Link
                                          preserve-scroll
                                          class="mx-1"
                                          :href="link.url"
                                          v-html="link.label"
                                      ></Link>
                                  </li>
                              </ul>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  props: { errors: Object, jobs: Object },
  data:()=>({
    search:'',
  }),
  watch: {
        search: function (val) {
            this.$inertia.get(
                "/user/book-marks",
                { search: val },
                { preserveState: true,replace:true },
							);
        }
    },
};
</script>

<style></style>
