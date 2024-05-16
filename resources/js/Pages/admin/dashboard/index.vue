<template>
    <div>
        <Nav></Nav>
        <SideBar></SideBar>
        <main class="content">
            <TopNav :admin="admin"></TopNav>
            <div class="py-4">
                <div class="dropdown">
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
                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                ></path>
                            </svg>
                            Add User
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
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                ></path>
                            </svg>
                            Add Widget
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
                            Upload Files
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
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            Preview Security
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
                            Upgrade to Pro
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="row d-block d-xl-flex align-items-center"
                            >
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                                >
                                    <div
                                        class="icon-shape icon-shape-primary rounded me-4 me-sm-0"
                                    >
                                        <svg
                                            class="icon"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5">Customers</h2>
                                        <h3 class="fw-extrabold mb-1">
                                            345,678
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">
                                            Customers
                                        </h2>
                                        <h3 class="fw-extrabold mb-2">{{ count[0]['users'] }}</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="row d-block d-xl-flex align-items-center"
                            >
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                                >
                                    <div
                                        class="icon-shape icon-shape-secondary rounded me-4 me-sm-0"
                                    >
                                        <svg
                                            class="icon"
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
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5">Revenue</h2>
                                        <h3 class="mb-1">$43,594</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">
                                            Campanies
                                        </h2>
                                        <h3 class="fw-extrabold mb-2">
                                            {{ count[0]['campanies'] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="row d-block d-xl-flex align-items-center"
                            >
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                                >
                                    <div
                                        class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0"
                                    >
                                        <svg
                                            class="icon"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5">
                                            Bounce Rate
                                        </h2>
                                        <h3 class="mb-1">50.88%</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">
                                            Employers
                                        </h2>
                                        <h3 class="fw-extrabold mb-2">
                                            {{ count[0]['employers'] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="row d-block d-xl-flex align-items-center"
                            >
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                                >
                                    <div
                                        class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0"
                                    >
                                        <svg
                                            class="icon"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5">
                                            Bounce Rate
                                        </h2>
                                        <h3 class="mb-1">50.88%</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">
                                            Locations
                                        </h2>
                                        <h3 class="fw-extrabold mb-2">
                                            {{ count[0]['locations'] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="row d-block d-xl-flex align-items-center"
                            >
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                                >
                                    <div
                                        class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0"
                                    >
                                        <svg
                                            class="icon"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5">
                                            Bounce Rate
                                        </h2>
                                        <h3 class="mb-1">50.88%</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">
                                            Jobs
                                        </h2>
                                        <h3 class="fw-extrabold mb-2">
                                            {{ count[0]['jobs'] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="row d-block d-xl-flex align-items-center"
                            >
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                                >
                                    <div
                                        class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0"
                                    >
                                        <svg
                                            class="icon"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="fw-extrabold h5">
                                            Bounce Rate
                                        </h2>
                                        <h3 class="mb-1">50.88%</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">
                                            Categories
                                        </h2>
                                        <h3 class="fw-extrabold mb-2">
                                            {{ count[0]['categories'] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">
                                                Campanies
                                            </h2>
                                        </div>
                                        <div class="col text-end">
                                            <Link
                                                href="/admin/campanies"
                                                class="btn btn-sm btn-primary"
                                                >See all</Link
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table align-items-center table-flush"
                                    >
                                        <thead class="thead-light">
                                            <tr>
                                                <th
                                                    class="border-bottom"
                                                    scope="col"
                                                >
                                                    Logo
                                                </th>
                                                <th
                                                    class="border-bottom"
                                                    scope="col"
                                                >
                                                    Name
                                                </th>
                                                <th
                                                    class="border-bottom"
                                                    scope="col"
                                                >
                                                    Type
                                                </th>
                                                <th
                                                    class="border-bottom"
                                                    scope="col"
                                                >
                                                    Employer
                                                </th>
                                                <th
                                                    class="border-bottom"
                                                    scope="col"
                                                >
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(cam,index) in campanies" :key="index">
                                                <th>
                                                    <Link :href="'/admin/campanies/'+cam.id" class="avatar">
                                                    <img
                                                            class="rounded"
                                                            alt="Image placeholder"
                                                            :src="'http://localhost:8000/storage/campany_images/'+cam.image"
                                                        />
                                                    </Link>
                                                </th>
                                                <th
                                                    class="text-gray-900"
                                                    scope="row"
                                                >
                                                    {{ cam.name }}
                                                </th>
                                                <td
                                                    class="fw-bolder text-gray-500"
                                                >
                                                {{cam.type}}
                                                </td>
                                                <td
                                                    class="fw-bolder text-gray-500"
                                                >
                                                    {{ cam.employee }}
                                                </td>
                                                <td><span class="fw-bold px-2 py-1 text-white" style="border-radius: 20px" :class="cam.status==='active'?'bg-success':'bg-warning'">{{ cam.status }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6 mb-4">
                            <div class="card border-0 shadow">
                                <div
                                    class="card-header border-bottom d-flex align-items-center justify-content-between"
                                >
                                    <h2 class="fs-5 fw-bold mb-0">
                                        Team members
                                    </h2>
                                    <Link href="/admin/userlists" class="btn btn-sm btn-primary"
                                        >See all</Link
                                    >
                                </div>
                                <div class="card-body">
                                    <ul
                                        class="list-group list-group-flush list my--3"
                                    >
                                        <li v-for="(member,index) in members" :key="index" class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <a href="#" class="avatar">
                                                        <img
                                                            class="rounded"
                                                            alt="Image placeholder"
                                                            :src="'http://localhost:8000/storage/user_profile_images/'+member.profile.image"
                                                        />
                                                    </a>
                                                </div>
                                           
                                                <div class="col-auto ms--2">
                                                    <h4 class="h6 mb-0">
                                                        <a href="#"
                                                            >{{ member.profile.name }}</a
                                                        >
                                                    </h4>
                                                    <div
                                                        class="d-flex align-items-center"
                                                    >
                                                        <div
                                                            class="bg-success dot rounded-circle me-1"
                                                        ></div>
                                                        <small>{{ member.status }}</small>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms--2 ms-5  w-25" >
                                                    <h4 class="h6 mb-0">
                                                        <a href="#"
                                                            >{{ member.profile.job }}</a
                                                        >
                                                    </h4>
                                                </div>
                                                <div class="col-auto ms--2 ms-5">
                                                    <h4 class="h6 mb-0">
                                                        <a href="#"
                                                            >{{ member.profile.city }}</a
                                                        >
                                                    </h4>
                                                </div>
                                                <div class="col text-end">
                                                    <Link
                                                        :href="'/admin/userlists/'+member.id"
                                                        class="btn btn-sm btn-secondary d-inline-flex align-items-center"
                                                    >
                                                        <svg
                                                            class="icon icon-xxs me-2"
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
                                                        View
                                                    </Link>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="col-12 px-0 mb-4">
                        <div class="card border-0 shadow">
                            <div
                                class="card-header d-flex flex-row align-items-center flex-0 border-bottom"
                            >
                                <div class="d-block">
                                    <div class="h6 fw-normal text-gray mb-2">
                                        Current Available Jobs
                                    </div>
                                    <h2 class="h3 fw-extrabold">{{ count[0]['jobs'] }} jobs</h2>
                                    <div class="small mt-2">
                                        <span
                                            class="fas fa-angle-up text-success"
                                        ></span>
                                        <span class="text-success fw-bold"
                                            >18.2%</span
                                        >
                                    </div>
                                </div>
                                <div class="d-block ms-auto">
                                    <div
                                        class="d-flex align-items-center text-end mb-2"
                                    >
                                        <span
                                            class="dot rounded-circle bg-gray-800 me-2"
                                        ></span>
                                        <span class="fw-normal small"
                                            >July</span
                                        >
                                    </div>
                                    <div
                                        class="d-flex align-items-center text-end"
                                    >
                                        <span
                                            class="dot rounded-circle bg-secondary me-2"
                                        ></span>
                                        <span class="fw-normal small"
                                            >August</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <ul>
                                        <li class=" my-4" v-for="(job,index) in jobs" :key="index">{{ job.name }}</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <div class="card border-0 shadow">
                            <div
                                class="card-header d-flex flex-row align-items-center flex-0 border-bottom"
                            >
                                <div class="d-block">
                                    <div class="h6 fw-normal text-gray mb-2">
                                        Popular Categories
                                    </div>
                                    <h2 class="h3 fw-extrabold">{{ count[0]['categories'] }}</h2>
                                    <div class="small mt-2">
                                        <span
                                            class="fas fa-angle-up text-success"
                                        ></span>
                                        <span class="text-success fw-bold"
                                            >18.2%</span
                                        >
                                    </div>
                                </div>
                                <div class="d-block ms-auto">
                                    <div
                                        class="d-flex align-items-center text-end mb-2"
                                    >
                                        <span
                                            class="dot rounded-circle bg-gray-800 me-2"
                                        ></span>
                                        <span class="fw-normal small"
                                            >July</span
                                        >
                                    </div>
                                    <div
                                        class="d-flex align-items-center text-end"
                                    >
                                        <span
                                            class="dot rounded-circle bg-secondary me-2"
                                        ></span>
                                        <span class="fw-normal small"
                                            >August</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <ul>
                                        <li class=" my-4" v-for="(cat,index) in categories" :key="index">{{ cat.name }}</li>
                                    </ul>
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
                                src="../../assets/img/technologies/bootstrap-5-logo.svg"
                                class="image image-xs"
                            />
                        </a>
                        <a
                            href="https://demo.themesberg.com/volt-react-dashboard/#/"
                            target="_blank"
                        >
                            <img
                                src="../../assets/img/technologies/react-logo.svg"
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
            <footer></footer>
        </main>
    </div>
</template>

<script>
import Nav from "../layouts/Nav/Nav.vue";
import SideBar from "../layouts/Nav/SideNav.vue";
import TopNav from "../layouts/Nav/TopNav.vue";
import footer from "../layouts/Footer/footer.vue";
export default {
    props: { admin: Array ,count:Array,members:Array,campanies:Array,jobs:Array,categories:Array},
    components: { Nav, SideBar, TopNav, footer },
};
</script>

<style></style>
