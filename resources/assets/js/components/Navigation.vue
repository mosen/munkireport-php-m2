<template>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <router-link :to="{ name: 'home' }" class="navbar-brand">{{ title }}</router-link>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">
                            <span class="glyphicon glyphicon-th-large"></span>
                            <span class="visible-lg-inline">{{ $t('nav.main.dashboard') }}</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-stats"></span>
                            <span>{{ $t('nav.main.reports') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="report dropdown-menu">
                            <li v-for="report in reports">
                                <a :href="report.url">{{ report.name }}</a>
                            </li>
                        </ul>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-list"></span>
                            <span>{{ $t('nav.main.listings') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="listing dropdown-menu">
                            <li v-for="listing in listings">
                                <a :href="listing.url">{{ listing.name }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- if admin and url admin/show/ -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-list"></span>
                            <span>{{ $t('nav.main.admin') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="admin dropdown-menu">
                            <li v-for="adm in admin">
                                <a :href="adm.url">{{ adm.name }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="filter-popup">
                            <i class="fa fa-filter"></i>
                        </a>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default" @click="search">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-wrench"></span>
                        </a>
                        <ul class="dropdown-menu theme">
                            <li v-for="theme in themes">
                                <a href="#" @click="setTheme">{{ theme }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-globe"></span>
                        </a>
                        <ul class="dropdown-menu locale">
                            <li v-for="code in localecodes">
                                <a href="#" @click="setLocale(code)">{{ $t('nav.lang.' + code) }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> {{username}}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li v-if="user && user.id">
                                <router-link :to="{ name: 'logout' }">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    <span>{{ $t('nav.user.logout') }}</span>
                                </router-link>
                            </li>
                            <li v-else>
                                <router-link :to="{ name: 'login' }">
                                    <span class="glyphicon glyphicon-log-in"></span>
                                    <span>{{ $t('nav.user.login') }}</span>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script>
    import 'bootstrap-sass/assets/javascripts/bootstrap/dropdown';
    import locales from './Navigation.i18n.json';
    import {mapGetters, mapActions} from 'vuex';

    export default {
        locales: locales,
        computed: mapGetters({
            user: 'auth/user'
        }),
        methods: mapActions({
            logout: 'auth/logout'
        })
    }
</script>