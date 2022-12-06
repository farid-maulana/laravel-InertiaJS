<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <Link class="navbar-brand" href="/posts">Laravel + Inertia.JS</Link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <template v-if="auth.user" class="d-inline">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <Link class="nav-link" href="/posts">POST</Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" href="/logout" method="POST">LOGOUT</Link>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </template>
                    <template v-else>
                        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <Link class="nav-link" href="/">LOGIN</Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" href="/register">REGISTER</Link>
                            </li>
                        </ul>
                    </template>
                </div>
            </div>
        </nav>
        <main class="container mt-5">
            <slot />
        </main>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            Link
        },

        props: {
            auth: Object
        },
    }
</script>

<style scoped>
    .mt-5 {
        margin-top: 100px !important;
    }
</style>