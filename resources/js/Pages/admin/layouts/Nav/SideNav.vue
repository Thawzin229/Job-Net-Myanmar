<template>
    <div>
        <nav
            id="sidebarMenu"
            class="sidebar d-lg-block bg-gray-800 text-white collapse"
            data-simplebar
        >
            <div class="sidebar-inner px-4 pt-3">
                <div
                    class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4"
                >
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg me-4">
                            <img
                                src="../../assets/img/team/profile-picture-3.jpg"
                                class="card-img-top rounded-circle border-white"
                                alt="Bonnie Green"
                            />
                        </div>
                        <div class="d-block">
                            <h2 class="h5 mb-3">Hi, Jane</h2>
                            <a
                                href="../../pages/examples/sign-in.html"
                                class="btn btn-secondary btn-sm d-inline-flex align-items-center"
                            >
                                <svg
                                    class="icon icon-xxs me-1"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    ></path>
                                </svg>
                                Sign Out
                            </a>
                        </div>
                    </div>
                    <div class="collapse-close d-md-none">
                        <a
                            href="#sidebarMenu"
                            data-bs-toggle="collapse"
                            data-bs-target="#sidebarMenu"
                            aria-controls="sidebarMenu"
                            aria-expanded="true"
                            aria-label="Toggle navigation"
                        >
                            <svg
                                class="icon icon-xs"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <ul class="nav flex-column pt-3 pt-md-0">
                    <li class="nav-item">
                        <a
                            href="../../index.html"
                            class="nav-link d-flex align-items-center"
                        >
                            <span class="sidebar-icon">
                                <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl6xCbM5p7aGJ1U4axY5UbJD-iSPFUYPQUOA&s"
                                    style="width: 20px;height: 20px"
                                    alt="Volt Logo"
                                />
                            </span>
                            
                            <span class="mt-1 ms-1 sidebar-text"
                                >JOBNET</span
                            >
                        </a>
                    </li>
                    <li class="nav-item active">
                        <Link
                            href="/admin/dashboard"
                            class="nav-link"
                        >
                            <span class="sidebar-icon">
                                <svg
                                    class="icon icon-xs me-2"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                    ></path>
                                    <path
                                        d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                    ></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Dashboard</span>
                        </Link>
                    </li>
                    <li class="nav-item active">
                        <Link
                            href="/admin/categories"
                            class="nav-link"
                        >
                            <span class="sidebar-icon">
                                <svg
                                        class="icon icon-xs me-2"
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
                            </span>
                            <span class="sidebar-text">Categories</span>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            href="/admin/job-functions"
                            target="_blank"
                            class="nav-link d-flex justify-content-between"
                        >
                            <span>
                                <span class="sidebar-icon">
                                    <svg
                                        class="icon icon-xs me-2"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                        ></path>
                                    </svg>
                                </span>
                                <span class="sidebar-text">Job Types</span>
                            </span>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            href="/admin/locations"
                            target="_blank"
                            class="nav-link d-flex justify-content-between"
                        >
                            <span>
                                <span class="sidebar-icon">
                                    <svg
                                        class="icon icon-xs me-2"
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
                                <span class="sidebar-text">Locations</span>
                            </span>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            href="/admin/faqs"
                            target="_blank"
                            class="nav-link d-flex justify-content-between"
                        >
                            <span>
                                <span class="sidebar-icon">
                                    <svg
                                        class="icon icon-xs me-2"
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
                                <span class="sidebar-text">FAQs</span>
                            </span>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            href="/admin/campanies"
                            class="nav-link"
                        >
                            <span class="sidebar-icon">
                                <svg
                                    class="icon icon-xs me-2"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"
                                    ></path>
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Campany</span>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/admin/employers" class="nav-link">
                            <span class="sidebar-icon">
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
                            </span>
                            <span class="sidebar-text">Employers</span>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/admin/userlists" class="nav-link">
                            <span class="sidebar-icon">
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
                            </span>
                            <span class="sidebar-text">Userlists</span>
                        </Link>
                    </li>
                    <li
                        role="separator"
                        class="dropdown-divider mt-4 mb-3 border-gray-700"
                    ></li>
            
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
