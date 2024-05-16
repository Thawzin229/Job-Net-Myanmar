<template>
  <div>
      <Nav></Nav>
      <SideBar></SideBar>
      <main class="content">
          <TopNav :admin="admin"></TopNav>

          <!-- <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4"
          >
              <div>
                  <div class="dropdown">
                      <button
                          class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                      >
                          <svg
                              class="icon icon-xs me-2"
                              fill="none"
                              stroke="currentColor"
                              viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                              ></path>
                          </svg>
                          New
                      </button>
                      <div
                          class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"
                      >
                          <a
                              class="dropdown-item d-flex align-items-center"
                              href="#"
                          >
                              <svg
                                  class="dropdown-icon text-gray-400 me-2"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                              >
                                  <path
                                      fill-rule="evenodd"
                                      d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                      clip-rule="evenodd"
                                  ></path>
                              </svg>
                              Document
                          </a>
                          <a
                              class="dropdown-item d-flex align-items-center"
                              href="#"
                          >
                              <svg
                                  class="dropdown-icon text-gray-400 me-2"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                              >
                                  <path
                                      fill-rule="evenodd"
                                      d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                      clip-rule="evenodd"
                                  ></path>
                              </svg>
                              Message
                          </a>
                          <a
                              class="dropdown-item d-flex align-items-center"
                              href="#"
                          >
                              <svg
                                  class="dropdown-icon text-gray-400 me-2"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                              >
                                  <path
                                      d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"
                                  ></path>
                                  <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                              </svg>
                              Product
                          </a>
                          <div
                              role="separator"
                              class="dropdown-divider my-1"
                          ></div>
                          <a
                              class="dropdown-item d-flex align-items-center"
                              href="#"
                          >
                              <svg
                                  class="dropdown-icon text-danger me-2"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg"
                              >
                                  <path
                                      fill-rule="evenodd"
                                      d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                      clip-rule="evenodd"
                                  ></path>
                              </svg>
                              My Plan
                          </a>
                      </div>
                  </div>
              </div>
              <div>
                  <button
                      type="button"
                      class="btn btn-gray-800 d-inline-flex align-items-center me-2"
                  >
                      <svg
                          class="icon icon-xs"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                          <path
                              fill-rule="evenodd"
                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                              clip-rule="evenodd"
                          ></path>
                      </svg>
                  </button>
                  <button
                      class="btn btn-gray-800 d-inline-flex align-items-center dropdown-toggle"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                  >
                      <svg
                          class="icon icon-xs me-2"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                          <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                          <path
                              fill-rule="evenodd"
                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                              clip-rule="evenodd"
                          ></path>
                      </svg>
                      Reports
                      <svg
                          class="icon icon-xs ms-1"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                          <path
                              fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"
                          ></path>
                      </svg>
                  </button>
                  <div
                      class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"
                  >
                      <a
                          class="dropdown-item d-flex align-items-center"
                          href="#"
                      >
                          <svg
                              class="dropdown-icon text-gray-400 me-2"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"
                              ></path>
                              <path
                                  fill-rule="evenodd"
                                  d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                  clip-rule="evenodd"
                              ></path>
                          </svg>
                          Products
                      </a>
                      <a
                          class="dropdown-item d-flex align-items-center"
                          href="#"
                      >
                          <svg
                              class="dropdown-icon text-gray-400 me-2"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"
                              ></path>
                          </svg>
                          Customers
                      </a>
                      <a
                          class="dropdown-item d-flex align-items-center"
                          href="#"
                      >
                          <svg
                              class="dropdown-icon text-gray-400 me-2"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  fill-rule="evenodd"
                                  d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                  clip-rule="evenodd"
                              ></path>
                          </svg>
                          Orders
                      </a>
                      <a
                          class="dropdown-item d-flex align-items-center"
                          href="#"
                      >
                          <svg
                              class="dropdown-icon text-gray-400 me-2"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  fill-rule="evenodd"
                                  d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                  clip-rule="evenodd"
                              ></path>
                          </svg>
                          Console
                      </a>
                      <div
                          role="separator"
                          class="dropdown-divider my-1"
                      ></div>
                      <a
                          class="dropdown-item d-flex align-items-center"
                          href="#"
                      >
                          <svg
                              class="dropdown-icon text-gray-800 me-2"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"
                              ></path>
                              <path
                                  fill-rule="evenodd"
                                  d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                  clip-rule="evenodd"
                              ></path>
                          </svg>
                          All Reports
                      </a>
                  </div>
              </div>
          </div> -->
          <div class="row mt-5">
              <div class="col-12 col-xl-8">
                  <div class="card card-body border-0 shadow mb-4">
                      <h2 class="h5 mb-4">General information</h2>
                      <form @submit.prevent="submit">
                          <div class="row">
                              <div class="col-md-6 mb-3">
                                  <div>
                                      <label for="first_name">Name</label>
                                      <input
                                          v-model="
                                              profile[0]['profile']['name']
                                          "
                                          class="form-control"
                                          id="first_name"
                                          type="text"
                                          placeholder="Enter your first name"
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.name"
                                      v-text="errors.name"
                                  ></p>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <div>
                                      <label for="last_name">Hobby</label>
                                      <input
                                          class="form-control"
                                          v-model="
                                              profile[0]['profile']['hobby']
                                          "
                                          id="last_name"
                                          type="text"
                                          placeholder="Also your last name"
                                          required
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.hobby"
                                      v-text="errors.hobby"
                                  ></p>
                              </div>
                          </div>
                          <div class="row align-items-center">
                              <div class="col-md-6 mb-3">
                                  <label for="birthday">Birthday</label>
                                  <div class="input-group">
                                      <span class="input-group-text">
                                          <svg
                                              class="icon icon-xs"
                                              fill="currentColor"
                                              viewBox="0 0 20 20"
                                              xmlns="http://www.w3.org/2000/svg"
                                          >
                                              <path
                                                  fill-rule="evenodd"
                                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                  clip-rule="evenodd"
                                              ></path>
                                          </svg>
                                      </span>
                                      <input
                                          data-datepicker=""
                                          v-model="
                                              profile[0]['profile'][
                                                  'birthday'
                                              ]
                                          "
                                          class="form-control"
                                          id="birthday"
                                          type="text"
                                          placeholder=""
                                          required
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.birthday"
                                      v-text="errors.birthday"
                                  ></p>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="gender">Gender</label>
                                  <select
                                      v-model="
                                          profile[0]['profile']['gender']
                                      "
                                      class="form-select mb-0"
                                      id="gender"
                                      aria-label="Gender select example"
                                  >
                                      <option selected>Gender</option>
                                      <option value="female">Female</option>
                                      <option value="male">Male</option>
                                  </select>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.gender"
                                      v-text="errors.gender"
                                  ></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input
                                          disabled
                                          v-model="profile[0]['email']"
                                          class="form-control"
                                          id="email"
                                          type="email"
                                          placeholder="name@company.com"
                                          required
                                      />
                                  </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                      <label for="phone">Phone</label>
                                      <input
                                          v-model="
                                              profile[0]['profile']['phone']
                                          "
                                          class="form-control"
                                          id="phone"
                                          type="text"
                                          placeholder="+12-345 678 910"
                                          required
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.phone"
                                      v-text="errors.phone"
                                  ></p>
                              </div>
                          </div>
                          <h2 class="h5 my-4">Location</h2>
                          <div class="row">
                              <div class="col-sm-9 mb-3">
                                  <div class="form-group">
                                      <label for="address">Address</label>
                                      <input
                                          v-model="
                                              profile[0]['profile']['address']
                                          "
                                          class="form-control"
                                          id="address"
                                          type="text"
                                          placeholder="Enter your home address"
                                          required
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.address"
                                      v-text="errors.address"
                                  ></p>
                              </div>
                              <div class="col-sm-3 mb-3">
                                  <div class="form-group">
                                      <label for="number">Number</label>
                                      <input
                                          v-model="
                                              profile[0]['profile'][
                                                  'address_number'
                                              ]
                                          "
                                          class="form-control"
                                          id="number"
                                          type="number"
                                          placeholder="No."
                                          required
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.address_number"
                                      v-text="errors.address_number"
                                  ></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-4 mb-3">
                                  <div class="form-group">
                                      <label for="city">City</label>
                                      <input
                                          v-model="
                                              profile[0]['profile']['city']
                                          "
                                          class="form-control"
                                          id="city"
                                          type="text"
                                          placeholder="City"
                                          required
                                      />
                                  </div>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.city"
                                      v-text="errors.city"
                                  ></p>
                              </div>
                              <div class="col-sm-4 mb-3">
                                  <label for="state">State</label>
                                  <select
                                      v-model="profile[0]['profile']['state']"
                                      class="form-select w-100 mb-0"
                                      id="state"
                                      name="state"
                                      aria-label="State select example"
                                  >
                                      <!-- <option selected>State</option> -->
                                      <option
                                          v-for="(state, index) in states"
                                          :key="index"
                                          :value="state.name"
                                      >
                                          {{ state.name }}
                                      </option>
                                  </select>
                                  <p
                                      class="text-danger mt-2"
                                      v-if="errors.state"
                                      v-text="errors.state"
                                  ></p>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <label for="zip">Professional Job</label>
                                      <input
                                          class="form-control"
                                          id="zip"
                                          type="tel"
                                          placeholder="Job"
                                          required
                                          v-model="profile[0]['profile'].job"
                                      />
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="zip">Status</label>
                                      <input
                                          class="form-control"
                                          id="zip"
                                          type="tel"
                                          placeholder="status"
                                          required
                                          v-model="profile[0]['status']"
                                      />
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="zip">Role</label>
                                      <input
                                          class="form-control"
                                          id="zip"
                                          type="tel"
                                          placeholder="role"
                                          required
                                          v-model="profile[0]['role']"
                                      />
                                  </div>
                              </div>
                          </div>
                          <div class="mt-3">
                              <button
                                  @click="send()"
                                  class="btn btn-gray-800 mt-2 animate-up-2"
                                  type="submit"
                              >
                                  Save all
                              </button>
                          </div>
                      </form>
                  </div>
                  <!-- <div class="card card-body border-0 shadow mb-4 mb-xl-0">
                      <h2 class="h5 mb-4">Alerts & Notifications</h2>
                      <ul class="list-group list-group-flush">
                          <li
                              class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom"
                          >
                              <div>
                                  <h3 class="h6 mb-1">Company News</h3>
                                  <p class="small pe-4">
                                      Get Rocket news, announcements, and
                                      product updates
                                  </p>
                              </div>
                              <div>
                                  <div class="form-check form-switch">
                                      <input
                                          class="form-check-input"
                                          type="checkbox"
                                          id="user-notification-1"
                                      />
                                      <label
                                          class="form-check-label"
                                          for="user-notification-1"
                                      ></label>
                                  </div>
                              </div>
                          </li>
                          <li
                              class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom"
                          >
                              <div>
                                  <h3 class="h6 mb-1">Account Activity</h3>
                                  <p class="small pe-4">
                                      Get important notifications about you or
                                      activity you've missed
                                  </p>
                              </div>
                              <div>
                                  <div class="form-check form-switch">
                                      <input
                                          class="form-check-input"
                                          type="checkbox"
                                          id="user-notification-2"
                                          checked
                                      />
                                      <label
                                          class="form-check-label"
                                          for="user-notification-2"
                                      ></label>
                                  </div>
                              </div>
                          </li>
                          <li
                              class="list-group-item d-flex align-items-center justify-content-between px-0"
                          >
                              <div>
                                  <h3 class="h6 mb-1">Meetups Near You</h3>
                                  <p class="small pe-4">
                                      Get an email when a Dribbble Meetup is
                                      posted close to my location
                                  </p>
                              </div>
                              <div>
                                  <div class="form-check form-switch">
                                      <input
                                          class="form-check-input"
                                          type="checkbox"
                                          id="user-notification-3"
                                          checked
                                      />
                                      <label
                                          class="form-check-label"
                                          for="user-notification-3"
                                      ></label>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div> -->
              </div>
              <div class="col-12 col-xl-4">
                  <div class="row">
                      <div class="col-12 mb-4">
                          <div class="card shadow border-0 text-center p-0">
                              <div
                                  class="profile-cover rounded-top"
                                  data-background="../assets/img/profile-cover.jpg"
                              ></div>
                              <div class="card-body pb-5">
                                  <img
                                      :src="'http://localhost:8000/storage/user_profile_images/'+profile[0]['profile'].image"
                                      class="avatar-xl rounded-circle mx-auto mt-n7 mb-4"
                                      alt="Neil Portrait"
                                  />
                                  <h4 class="h3">{{ profile[0]['profile'].name }}</h4>
                                  <h5 class="fw-normal">
                                    {{ profile[0]['profile'].job }}
                                  </h5>
                                  <p class="text-gray mb-4">{{ profile[0]['profile'].city }} </p>

                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="card card-body border-0 shadow mb-4">
                              <h2 class="h5 mb-4">Select profile photo</h2>
                              <div class="d-flex align-items-center">
                                  <div class="me-3">
                                      <!-- Avatar -->
                                      <img
                                          class="rounded avatar-xl"
                                          src="../assets/img/team/profile-picture-3.jpg"
                                          alt="change avatar"
                                      />
                                  </div>
                                  <div class="file-field">
                                      <div
                                          class="d-flex justify-content-xl-center ms-xl-3"
                                      >
                                          <div class="d-flex">
                                              <svg
                                                  class="icon text-gray-500 me-2"
                                                  fill="currentColor"
                                                  viewBox="0 0 20 20"
                                                  xmlns="http://www.w3.org/2000/svg"
                                              >
                                                  <path
                                                      fill-rule="evenodd"
                                                      d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                      clip-rule="evenodd"
                                                  ></path>
                                              </svg>
                                              <input
                                                  type="file"
                                                  @change="uplaodImage"
                                              />
                                              <div
                                                  class="d-md-block text-left"
                                              >
                                                  <div
                                                      class="fw-normal text-dark mb-1"
                                                  >
                                                      Choose Image
                                                  </div>
                                                  <div
                                                      class="text-gray small"
                                                  >
                                                      JPG, GIF or PNG. Max
                                                      size of 800K
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <p v-if="errors.image" v-text="errors.image" class="text-danger"></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div
              class="theme-settings card bg-gray-800 pt-2 collapse"
              id="theme-settings"
          >
              <div class="card-body bg-gray-800 text-white pt-4">
                  <button
                      type="button"
                      class="btn-close theme-settings-close"
                      aria-label="Close"
                      data-bs-toggle="collapse"
                      href="#theme-settings"
                      role="button"
                      aria-expanded="false"
                      aria-controls="theme-settings"
                  ></button>
                  <div
                      class="d-flex justify-content-between align-items-center mb-3"
                  >
                      <p class="m-0 mb-1 me-4 fs-7">
                          Open source
                          <span role="img" aria-label="gratitude">💛</span>
                      </p>
                      <a
                          class="github-button"
                          href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
                          data-color-scheme="no-preference: dark; light: light; dark: light;"
                          data-icon="octicon-star"
                          data-size="large"
                          data-show-count="true"
                          aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub"
                          >Star</a
                      >
                  </div>
                  <a
                      href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                      target="_blank"
                      class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100"
                  >
                      Download
                      <svg
                          class="icon icon-xs ms-2"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                          <path
                              fill-rule="evenodd"
                              d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                              clip-rule="evenodd"
                          ></path>
                      </svg>
                  </a>
                  <p class="fs-7 text-gray-300 text-center">
                      Available in the following technologies:
                  </p>
                  <div class="d-flex justify-content-center">
                      <a
                          class="me-3"
                          href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                          target="_blank"
                      >
                          <img
                              src="../assets/img/technologies/bootstrap-5-logo.svg"
                              class="image image-xs"
                          />
                      </a>
                      <a
                          href="https://demo.themesberg.com/volt-react-dashboard/#/"
                          target="_blank"
                      >
                          <img
                              src="../assets/img/technologies/react-logo.svg"
                              class="image image-xs"
                          />
                      </a>
                  </div>
              </div>
          </div>

          <div
              class="card theme-settings bg-gray-800 theme-settings-expand"
              id="theme-settings-expand"
          >
              <div
                  class="card-body bg-gray-800 text-white rounded-top p-3 py-2"
              >
                  <span class="fw-bold d-inline-flex align-items-center h6">
                      <svg
                          class="icon icon-xs me-2"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                          <path
                              fill-rule="evenodd"
                              d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                              clip-rule="evenodd"
                          ></path>
                      </svg>
                      Settings
                  </span>
              </div>
          </div>

          <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
              <div class="row">
                  <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                      <p class="mb-0 text-center text-lg-start">
                          © 2019-<span class="current-year"></span>
                          <a
                              class="text-primary fw-normal"
                              href="https://themesberg.com"
                              target="_blank"
                              >Themesberg</a
                          >
                      </p>
                  </div>
                  <div
                      class="col-12 col-md-8 col-xl-6 text-center text-lg-start"
                  >
                      <!-- List -->
                      <ul
                          class="list-inline list-group-flush list-group-borderless text-md-end mb-0"
                      >
                          <li class="list-inline-item px-0 px-sm-2">
                              <a href="https://themesberg.com/about">About</a>
                          </li>
                          <li class="list-inline-item px-0 px-sm-2">
                              <a href="https://themesberg.com/themes"
                                  >Themes</a
                              >
                          </li>
                          <li class="list-inline-item px-0 px-sm-2">
                              <a href="https://themesberg.com/blog">Blog</a>
                          </li>
                          <li class="list-inline-item px-0 px-sm-2">
                              <a href="https://themesberg.com/contact"
                                  >Contact</a
                              >
                          </li>
                      </ul>
                  </div>
              </div>
          </footer>
      </main>
  </div>
</template>

<script>
import Nav from "../layouts/Nav/Nav.vue";
import SideBar from "../layouts/Nav/SideNav.vue";
import TopNav from "../layouts/Nav/TopNav.vue";
import footer from "../layouts/Footer/footer.vue";
export default {
  props: { admin: Array, profile: Array, states: Array ,errors:Object},
  components: { Nav, SideBar, TopNav, footer },
  data:()=>({
    status:'',
    role:''
  }),
  methods: {
      uplaodImage(e) {
          this.profile[0]["profile"].image = e.target.files[0];
      },
      send() {
          this.profile[0]["profile"].role = this.profile[0]['role'];
          this.profile[0]["profile"].status =  this.profile[0]['status'];
          this.$inertia.post("/admin/userlists", this.profile[0]["profile"]);
      },
  },
};
</script>

<style></style>
