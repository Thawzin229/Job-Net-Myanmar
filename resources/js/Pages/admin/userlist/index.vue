<template>
    <div>
        <Nav></Nav>
        <SideBar></SideBar>
        <main class="content">
            <TopNav :admin="admin"></TopNav>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4"
            >
                <div class="d-block mb-4 mb-md-0">
                    <nav
                        aria-label="breadcrumb"
                        class="d-none d-md-inline-block"
                    >
                        <ol
                            class="breadcrumb breadcrumb-dark breadcrumb-transparent"
                        >
                            <li class="breadcrumb-item">
                                <a href="#">
                                    <svg
                                        class="icon icon-xxs"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                        ></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <Link href="/admin/dashboard">Home</Link>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                userlists
                            </li>
                        </ol>
                    </nav>
                    <h2 class="h4">Users</h2>
                    <p class="mb-0">You can manage any one of user.</p>
                </div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group ms-2 ms-lg-3">
                        <Link href="/admin/userlists?status=active">
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-gray-600"
                            >
                                Active
                            </button>
                        </Link>
                        <Link href="/admin/userlists?status=offline">
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-gray-600"
                            >
                                Offline
                            </button>
                        </Link>
                    </div>
                </div>
            </div>
            <div class="table-settings mb-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col col-md-6 col-lg-3 col-xl-4">
                        <div class="input-group me-2 me-lg-3 fmxw-400">
                            <span class="input-group-text">
                                <svg
                                    class="icon icon-xs"
                                    x-description="Heroicon name: solid/search"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </span>
                            <input
                                v-model="search"
                                type="text"
                                class="form-control"
                                placeholder="Search orders"
                            />
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                        <div class="dropdown">
                            <button
                                class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <svg
                                    class="icon icon-sm"
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
                                <span class="visually-hidden"
                                    >Toggle Dropdown</span
                                >
                            </button>
                            <div
                                class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0"
                            >
                                <span class="small ps-3 fw-bold text-dark"
                                    >Show</span
                                >
                                <Link
                                    class="dropdown-item d-flex align-items-center fw-bold"
                                    href="/admin/userlists?limit=5"
                                    >5
                                    <svg
                                        class="icon icon-xxs ms-auto"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        ></path></svg
                                ></Link>
                                <Link class="dropdown-item fw-bold"                                     href="/admin/userlists?limit=10">10</Link>
                                <Link
                                    class="dropdown-item fw-bold rounded-bottom"
                                    href="/admin/userlists?limit=12"
                                    >12</Link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="card card-body border-0 shadow table-wrapper table-responsive"
            >
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-gray-200">ID</th>
                            <th class="border-gray-200">Image</th>
                            <th class="border-gray-200">Name</th>
                            <th class="border-gray-200">Role</th>
                            <th class="border-gray-200">Status</th>
                            <th class="border-gray-200">Date</th>
                            <th class="border-gray-200">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr v-for="(user, index) in users.data" :key="index">
                            <td>
                                <a href="#" class="fw-bold"> {{ user.id }} </a>
                            </td>
                            <td>
                                <img v-if="user.image" style="width: 30px;height: 30px;border-radius: 100%;" :src="'http://localhost:8000/storage/user_profile_images/'+user.image" alt="" />
                            </td>
                            <td>
                                <span class="fw-normal">{{ user.email }}</span>
                            </td>
                            <td>
                                <span class="fw-normal">{{ user.role }}</span>
                            </td>
                            <td>
                                <span
                                    class="fw-bold px-2 py-1 text-white"
                                    style="border-radius: 20px"
                                    :class="
                                        user.status === 'active'
                                            ? 'bg-success'
                                            : 'bg-primary'
                                    "
                                    >{{ user.status }}</span
                                >
                            </td>
                            <td>
                                {{ user.date }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button
                                        class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <span class="icon icon-sm">
                                            <span
                                                class="fas fa-ellipsis-h icon-dark"
                                            ></span>
                                        </span>
                                        <span class="visually-hidden"
                                            >Toggle Dropdown</span
                                        >
                                        <span class="material-symbols-outlined">
                                            format_list_bulleted
                                        </span>
                                    </button>
                                    <div class="dropdown-menu py-0">
                                        <Link class="dropdown-item"
                                        :href="'/admin/userlists/'+user.id"
                                            ><span
                                                class="fas fa-edit me-2"
                                            ></span
                                            >Edit</Link
                                        >
                                        <Link
                                        :href="'/admin/userlists/'+user.id"
                                            class="dropdown-item text-danger rounded-bottom"
                                            method="DELETE"
                                            ><span
                                                class="fas fa-trash-alt me-2"
                                            ></span
                                            >Remove</Link
                                        >
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div
                    class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between"
                >
                    <nav aria-label="Page navigation example">
                        <ul class="pagination mb-0">
                            <li
                                class="page-item d-flex"
                                v-if="users.data.length !== 0"
                            >
                                <Component
                                    preserve-scroll
                                    :is="link.url ? 'Link' : 'span'"
                                    class="page-link"
                                    :href="link.url"
                                    v-for="(link, index) in users.links"
                                    :key="index"
                                    v-html="link.label"
                                ></Component>
                            </li>
                        </ul>
                    </nav>
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
import debounce from "lodash/debounce";
export default {
    components: { Nav, SideBar, TopNav, footer },
    props: { users: Object,states:Array ,admin:Array},
    data: () => ({
        search: "",
    }),
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/admin/userlists",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
};
</script>

<style></style>
