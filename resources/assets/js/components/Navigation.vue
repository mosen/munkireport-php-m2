<template>
    <div>
    <navbar placement="top" type="default">
        <router-link slot="brand" :to="{ name: 'dashboard' }" class="navbar-brand">{{ title }}</router-link>

        <li>
            <router-link :to="{ name: 'dashboard' }">
                <span class="glyphicon glyphicon-th-large"></span>
                <span class="visible-lg-inline">{{ $t('nav.main.dashboard') }}</span>
            </router-link>
        </li>

        <dropdown :text="$t('nav.main.reports')">
            <li v-for="report in reports">
                <router-link :to="{ path: report.url }">{{ $t(report.name) }}</router-link>
            </li>
        </dropdown>

        <dropdown :text="$t('nav.main.listings')">
            <li v-for="listing in listings">
                <router-link :to="{ path: listing.url }">{{ $t(listing.name) }}</router-link>
            </li>
        </dropdown>

        <dropdown :text="$t('nav.main.admin')">
            <li v-for="admin in admins">
                <router-link :to="{ path: admin.url }">{{ $t(admin.name) }}</router-link>
            </li>
        </dropdown>

        <li>
            <a href="#" class="filter-popup">
                <i class="fa fa-filter"></i>
            </a>
        </li>

        <dropdown slot="right" text="theme">
            <li v-for="theme in themes">
                <a href="#">{{ theme }}</a>
            </li>
        </dropdown>

        <dropdown slot="right" text="globe">
            <li v-for="code in locales">
                <a href="#">{{ $t('nav.lang.' + code) }}</a>
            </li>
        </dropdown>

        <template slot="right" v-if="!user.authenticated">
            <li><router-link :to="{ name: 'login' }">
                <span class="glyphicon glyphicon-log-in"></span>
                {{ $t('nav.user.login') }}
            </router-link></li>
            <li><router-link :to="{ name: 'register' }">
                {{ $t('nav.user.register') }}
            </router-link></li>
        </template>
        <template v-else>
            <dropdown :text="user.data.name">
                <li>
                    <a href="#" @click.prevent="signout">Logout</a>
                </li>
            </dropdown>
        </template>
    </navbar>
    </div>
</template>


<script>
    import locales from './Navigation.i18n.json';
    import {mapGetters, mapActions, mapState} from 'vuex';
    import navbar from 'vue-strap/src/navbar';
    import dropdown from 'vue-strap/src/dropdown';

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
          dropdown,
          navbar
        }
    }
</script>