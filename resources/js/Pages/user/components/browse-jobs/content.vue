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
                <div class="col-lg-9 col-sm-12">
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

                <!-- Widgets -->
                <div class="col-lg-3 col-sm-12">
                    <!-- Sort by -->
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
                                    :value="loca.id"
                                >
                                    {{ loca.name }}
                                </option>
                            </select>
                        </form>
                    </div>

                    <div class="widget">
                        <h4>Campany</h4>
                        <form @submit.prevent="submit">
                            <select
                                v-model="param.campany"
                                id="job-input"
                                data-placeholder="Choose Category"
                                class="form-control"
                            >
                        <option value="">Campany</option>
                                <option
                                    v-for="(cam, index) in data.campanies"
                                    :key="index"
                                    :value="cam.id"
                                >
                                    {{ cam.name }}
                                </option>
                            </select>
                        </form>
                    </div>

                    <!-- Job Type -->
                    <div class="widget">
                        <h4>Job Type</h4>

                        <ul class="checkboxes">
                            <li>
                                <input
                                    id="check-1"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.job_type.any"
                                    checked
                                />
                                <label for="check-1">Any Type</label>
                            </li>
                            <li>
                                <input
                                    id="check-2"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.job_type.full_time"
                                />
                                <label for="check-2"
                                    >Full-Time <span>(312)</span></label
                                >
                            </li>
                            <li>
                                <input
                                    id="check-3"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.job_type.part_time"
                                />
                                <label for="check-3"
                                    >Part-Time <span>(269)</span></label
                                >
                            </li>
                            <li>
                                <input
                                    id="check-4"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.job_type.internship"
                                />
                                <label for="check-4"
                                    >Internship <span>(46)</span></label
                                >
                            </li>
                            <li>
                                <input
                                    id="check-5"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.job_type.freelance"
                                />
                                <label for="check-5"
                                    >Freelance <span>(119)</span></label
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Rate/Hr -->
                    <div class="widget">
                        <h4>Rate / Hr</h4>

                        <ul class="checkboxes">
                            <li>
                                <input
                                    id="check-6"
                                    type="checkbox"
                                    name="check"
                                    value="check-6"
                                    checked
                                />
                                <label for="check-6">Any Rate</label>
                            </li>
                            <li>
                                <input
                                    id="check-7"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.fee.zero_one"
                                />
                                <label for="check-7"
                                    >$0 - $100 <span>(231)</span></label
                                >
                            </li>
                            <li>
                                <input
                                    id="check-8"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.fee.one_five"
                                />
                                <label for="check-8"
                                    >$100 - $500 <span>(297)</span></label
                                >
                            </li>
                            <li>
                                <input
                                    id="check-9"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.fee.five_ten"
                                />
                                <label for="check-9"
                                    >$500 - $1000 <span>(78)</span></label
                                >
                            </li>
                            <li>
                                <input
                                    id="check-10"
                                    type="checkbox"
                                    name="check"
                                    v-model="param.fee.ten_twoten"
                                />
                                <label for="check-10"
                                    >$1000 - $2000 <span>(98)</span></label
                                >
                            </li>
                        </ul>
                    </div>

                    <button class="button w-100 mt-4" @click="filter()">
                        Filter
                    </button>
                </div>
                <!-- Widgets / End -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: { errors: Object, jobs: Object, data: Object },
    data: () => ({
        search: "",
        param: {
            sorting: "",
            location: "",
            job_type: {
                any: "",
                full_time: "",
                part_time: "",
                internship: "",
                freelance: "",
            },
            fee: {
                zero_one: "",
                one_five: "",
                five_ten: "",
                ten_twoten: "",
            },
            campany: "",
        },
    }),
    methods: {
        filter() {
            this.$inertia.get(
                "/user/jobs",
                { param: this.param },
                { preserveState: true, replace: true }
            );
        },
    },
    watch: {
        search: function (val) {
            this.$inertia.get(
                "/user/jobs",
                { search: val },
                { preserveState: true,replace:true },
							);
        }
    },
    mounted() {
    },
};
</script>

<style></style>
