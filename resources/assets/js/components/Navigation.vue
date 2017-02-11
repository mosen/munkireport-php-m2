<template>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{ title }}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">
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
                                <a href="#">{{ report }}</a>
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
                <div class="nav navbar-nav navbar-right">
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
                            <li v-for="locale in locales">
                                <a href="#" @click="setLocale(locale.code)">{{ locale.name }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> {{username}}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li v-if="username">
                                <a href="/logout">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    <span>{{ $t('nav.user.logout') }}</span>
                                </a>
                            </li>
                            <li v-else>
                                <a href="/login">
                                    <span class="glyphicon glyphicon-log-in"></span>
                                    <span>{{ $t('nav.user.login') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script>
    import Vue from 'vue';
    // import dropdown from 'bootstrap-vue/components/dropdown.vue';
    import 'bootstrap-sass/assets/javascripts/bootstrap/dropdown';

    export default {
        data: function() {
            return {
                title: 'MunkiReport',
                themes: ['Standard'],
                username: null,
                locales: [
                    { code: 'en', name: 'English' },
                    { code: 'de', name: 'Deutsch' },
                    { code: 'es', name: 'Espanol' },
                    { code: 'fr', name: 'Francais' },
                    { code: 'nl', name: 'Dutch' }
                ],
                admin: [],
                listings: [],
                reports: [],
            }
        },

        methods: {
            search: function (event) {

            },
            setTheme: function (event) {

            },
            setLocale: function(code) {

                console.dir(Vue.config);
                Vue.locale(code, () => {
                    return this.axios.get(`/locale/${code}.json`).then((response) => {
                        if (Object.keys(response.data).length === 0) {
                            return Promise.reject(new Error(`Could not load locale ${code}`));
                        }
                        return response.data;
                    }).then((data) => {
                        return Promise.resolve(data);
                    })
                }, () => {
                    Vue.config.lang = code;
                });
            }
        },
        components: {

        }
    }
</script>