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
                <router-link :to="{ name: 'dashboard' }" class="navbar-brand">{{ title }}</router-link>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                    <router-link :to="{ name: 'dashboard' }">
                        <span class="glyphicon glyphicon-th-large"></span>
                        <span class="visible-lg-inline">{{ $t('nav.main.dashboard') }}</span>
                    </router-link>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-stats"></span>
                            <span>{{ $t('nav.main.reports') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li v-for="report in reports">
                                <router-link :to="{ path: 'reports' }">{{ report.name }}</router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-list"></span>
                            <span>{{ $t('nav.main.listings') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li v-for="listing in listings">
                                <router-link :to="{ path: 'lists' }">{{ listing.name }}</router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-list"></span>
                            <span>{{ $t('nav.main.admin') }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li v-for="admin in admins">
                                <router-link :to="{ path: 'admin' }">{{ admin.name }}</router-link>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="filter-popup">
                            <i class="fa fa-filter"></i>
                        </a>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-wrench"></span>
                        </a>
                        <ul class="dropdown-menu theme" role="menu">
                            <li v-for="theme in themes">
                                <a href="#">{{ theme }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-globe"></span>
                        </a>
                        <ul class="dropdown-menu locale" role="menu">
                            <li v-for="code in locales">
                                <a href="#">{{ $t('nav.lang.' + code) }}</a>
                            </li>
                        </ul>
                    </li>
                    
                    <template v-if="!user.authenticated">
                        <li><router-link :to="{ name: 'login' }">
                            <span class="glyphicon glyphicon-log-in"></span>
                            {{ $t('nav.user.login') }}
                        </router-link></li>
                        <li><router-link :to="{ name: 'register' }">
                            {{ $t('nav.user.register') }}
                        </router-link></li>
                    </template>
                    <template v-else>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ user.data.name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click.prevent="signout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script>
    import 'bootstrap-sass/assets/javascripts/bootstrap/dropdown';
    import locales from './Navigation.i18n.json';
    import {mapGetters, mapActions, mapState} from 'vuex';

    export default {
        locales: locales,
        computed: mapGetters({
            user: 'auth/user',
            reports: 'reports',
            listings: 'listings',
            title: 'title',
            admins: 'admins',
            locales: 'locales',
            themes: 'themes'
        }),
        methods: {
            ...mapActions({
                logout: 'auth/logout'
            }),
            signout () {
                this.logout().then(() => {
                    this.$router.replace({ name: 'home' })
                })
            }
        },
        components: {
        }
    }
</script>