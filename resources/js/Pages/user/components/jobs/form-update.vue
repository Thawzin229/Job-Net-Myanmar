<template>
    <div>
        <div id="titlebar" class="single submit-page">
            <div class="container">
                <div class="sixteen columns">
                    <h2><i class="fa fa-edit"></i> Edit Job</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Submit Page -->
            <div class="sixteen columns">
                <div class="submit-page">
                    <!-- Notice -->

                    <div
                        v-if="errors.status"
                        class="notification notice closeable margin-bottom-40 bg-success text-white shadow"
                    >
                        <p><span>MESSAGE:</span>{{ errors.status }}</p>
                    </div>

                    <!-- Email -->
                    <div class="form">
                        <h5>Your Email</h5>
                        <input
                            v-model="job.jobdetails.email"
                            class="search-field"
                            type="text"
                            placeholder="mail@example.com"
                            value=""
                        />
                        <strong><div v-if="errors.email" class="text-danger" v-text="errors.email"></div></strong>
                    </div>

                    <div class="form">
                        <h5>Employer Name</h5>
                        <select
                            v-model="job.employer_id"
                            data-placeholder="Full-Time"
                            class="form-control"
                            id="job-input"
                        >
                            <option
                                v-for="(employer, index) in form_data.employers"
                                :key="index"
                                :value="employer.id"
                            >
                                {{ employer.name }}
                            </option>
                        </select>
                        <strong><div v-if="errors.employer_id" class="text-danger" v-text="errors.employer_id"></div></strong>
                    </div>

                    <!-- Title -->
                    <div class="form">
                        <h5>Job Title</h5>
                        <input
                            v-model="job.jobdetails.job_title"
                            class="search-field"
                            type="text"
                            placeholder=""
                            value=""
                        />
                        <strong><div v-if="errors.job_title" class="text-danger" v-text="errors.job_title"></div></strong>
                    </div>

                    <!-- Location -->
                    <div class="form">
                        <h5>Locations</h5>
                        <select
                            v-model="job.jobdetails.location"
                            data-placeholder="Full-Time"
                            class="form-control"
                            id="job-input"
                        >
                            <option
                                v-for="(Location, index) in form_data.location"
                                :key="index"
                                :value="Location.id"
                            >
                                {{ Location.name }}
                            </option>
                        </select>
                        <strong><div v-if="errors.location" class="text-danger" v-text="errors.location"></div></strong>
                    </div>

                    <!-- Job Type -->
                    <div class="form">
                        <h5>Job Funtions/Type</h5>
                        <select
                            v-model="job.jobdetails.job_type"
                            data-placeholder="Full-Time"
                            class="form-control"
                            id="job-input"
                        >
                            <option
                                v-for="(job, index) in form_data.job_types"
                                :key="index"
                                :value="job.id"
                            >
                                {{ job.name }}
                            </option>
                        </select>
                        <strong><div v-if="errors.job_type" class="text-danger" v-text="errors.job_type"></div></strong>
                    </div>

                    <div class="form">
                        <h5>Categories</h5>
                        <select
                            data-placeholder="Full-Time"
                            class="form-control"
                            id="job-input"
                        >
                            <option
                                v-for="(cate, index) in form_data.categories"
                                :key="index"
                                :value="cate.id"
                                @click="put(cate.id)"
                            >
                                {{ cate.name }}
                            </option>
                        </select>
                        <strong><div v-if="errors.category" class="text-danger" v-text="errors.category"></div></strong>
                    </div>
                    <!-- Choose Category -->

                    <!-- Tags -->
                    <div class="form">
                        <h5>Job Tags <span>(favors)</span></h5>
                        <input
                            v-model="job.jobdetails.job_tag"
                            class="search-field"
                            type="text"
                            placeholder="e.g. PHP, Social Media, Management"
                            value=""
                        />
                        <strong><div v-if="errors.job_tag" class="text-danger" v-text="errors.job_tag"></div></strong>
                        <p class="note">
                            Comma separate tags, such as required skills or
                            technologies, for this job.
                        </p>
                    </div>
                    

                    <!-- Tags -->
                    <div class="form">
                        <h5>Fee <span>(Per hour)</span></h5>
                        <input
                            v-model="job.jobdetails.fee"
                            class="search-field"
                            type="text"
                            placeholder="e.g. PHP, Social Media, Management"
                            value=""
                        />
                        <strong><div v-if="errors.fee" class="text-danger" v-text="errors.fee"></div></strong>
                        <p class="note">
                            Comma separate tags, such as required skills or
                            technologies, for this job.
                        </p>
                    </div>

                    <!-- Description -->
                    <div class="form">
                        <h5>Description</h5>
                        <textarea
                            v-model="job.jobdetails.description"
                            class="WYSIWYG"
                            name="summary"
                            cols="40"
                            rows="3"
                            id="summary"
                            placeholder="e.g job requirement and descriptions"
                            spellcheck="true"
                        ></textarea>
                        <strong><div v-if="errors.description" class="text-danger" v-text="errors.description"></div></strong>
                    </div>

                         <!-- Description -->
                         <div class="form">
                        <h5>Requirment</h5>
                        <textarea
                            v-model="job.jobdetails.requirement"
                            class="WYSIWYG"
                            name="summary"
                            cols="40"
                            rows="3"
                            id="summary"
                            placeholder="e.g job requirement and descriptions"
                            spellcheck="true"
                        ></textarea>
                        <strong><div v-if="errors.requirement" class="text-danger" v-text="errors.requirement"></div></strong>
                    </div>

                    <!-- Application email/url -->
                    <div class="form">
                        <h5>Application email / URL</h5>
                        <input
                            v-model="job.jobdetails.application_email"
                            type="text"
                            placeholder="Enter an email address or website URL"
                        />
                        <strong><div v-if="errors.application_email" class="text-danger" v-text="errors.application_email"></div></strong>
                    </div>

                    <!-- TClosing Date -->
                    <div class="form">
                        <h5>Closing Date <span></span></h5>
                        <input
                            v-model="job.jobdetails.deadline"
                            data-role="date"
                            type="text"
                            placeholder="yyyy-mm-dd"
                        />
                        <strong><div v-if="errors.deadline" class="text-danger" v-text="errors.deadline"></div></strong>
                        <p class="note">Deadline for new applicants.</p>
                    </div>

                    <!-- Company Details -->
                    <div class="divider"><h3>Company Details</h3></div>

                    <!-- Company Name -->
                    <div class="form">
                        <h5>Company Name</h5>
                        <select
                            v-model="job.campany_id"
                            data-placeholder="Choose Campanies"
                            class="form-control"
                            id="job-input"
                        >
                            <option
                                v-for="(cam, index) in form_data.campanies"
                                :key="index"
                                :value="cam.id"
                            >
                                {{ cam.name }}
                            </option>
                        </select>
                        <strong><div v-if="errors.campany_id" class="text-danger" v-text="errors.campany_id"></div></strong>
                    </div>

                    <!-- Website -->
                    <div class="form">
                        <h5>Website <span></span></h5>
                        <input
                            v-model="job.jobdetails.website_link"
                            type="text"
                            placeholder="http://"
                        />
                        <strong><div v-if="errors.website_link" class="text-danger" v-text="errors.website_link"></div></strong>
                    </div>

                    <!-- Teagline -->
                    <div class="form">
                        <h5>Tagline <span>(campany's statement)</span></h5>
                        <input
                            v-model="job.jobdetails.tag_line"
                            type="text"
                            placeholder="Briefly describe your company"
                        />
                        <strong><div v-if="errors.tag_line" class="text-danger" v-text="errors.tag_line"></div></strong>
                    </div>

                    <!-- Twitter -->
                    <div class="form">
                        <h5>Twitter Username <span></span></h5>
                        <input
                            v-model="job.jobdetails.twitter_user_name"
                            type="text"
                            placeholder="@yourcompany"
                        />
                        <strong><div v-if="errors.twitter_user_name" class="text-danger" v-text="errors.twitter_user_name"></div></strong>
                    </div>

                    <!-- Logo -->
                    <div class="form">
                        <h5>Logo <span>(campany's logo)</span></h5>
                        <label class="upload-btn">
                            <input type="file" @change="uploadLogo" />
                            <i class="fa fa-upload"></i> Browse
                        </label>
                        <span class="fake-input">No file selected</span>
                        <strong><div v-if="errors.image" class="text-danger" v-text="errors.image"></div></strong>
                    </div>

                    <div class="divider margin-top-0"></div>
                    <button
                        href="#"
                        @click="send()"
                        class="button big margin-top-5"
                    >
                        Post <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: { job: Object, errors: Object, form_data: Array },
    data: () => ({
        new_cate: [],
    }),
    methods: {
        uploadLogo(e) {
            this.job.jobdetails.image = e.target.files[0];
        },
        send() {
          const data = {
            'id' : this.job.id,
            'campany_id' : this.job.campany_id,
            'employer_id' :this.job.employer_id,
            'email' :this.job.jobdetails.email,
            'job_title':this.job.jobdetails.job_title,
            'location':this.job.jobdetails.location,
            'job_type':this.job.jobdetails.job_type,
            'category':this.job.jobdetails.category,
            'job_tag':this.job.jobdetails.job_tag,
            'fee':this.job.jobdetails.fee,
            'description':this.job.jobdetails.description,
            'requirement':this.job.jobdetails.requirement,
            'application_email':this.job.jobdetails.application_email,
            'deadline':this.job.jobdetails.deadline,
            'website_link':this.job.jobdetails.website_link,
            'tag_line':this.job.jobdetails.tag_line,
            'twitter_user_name':this.job.jobdetails.twitter_user_name,
            'image':this.job.jobdetails.image,
          } 
            this.$inertia.post("/user/manage-job", data, {
                onFinish: () => {
                    if (this.errors.status) {
                        setTimeout(() => {
                            this.errors.status = false;
                        }, 2000);
                    }
                },
            });
        },
        put(cate_id) {
            this.new_cate.push(cate_id);
            this.job.jobdetails.category = this.new_cate;
        },
    },
};
</script>

<style></style>
