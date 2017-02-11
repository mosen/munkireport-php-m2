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
                            <i class="fa fa-th-large"></i>
                            <span class="visible-lg-inline">{{ $t('nav.main.dashboard') }}</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bar-chart-o"></i>
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
                            <i class="fa fa-list-alt"></i>
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
                            <i class="fa fa-list-alt"></i>
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
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu theme">
                            <li v-for="theme in themes">
                                <a href="#" @click="setTheme">{{ theme }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                        </a>
                        <ul class="dropdown-menu locale">
                            <li v-for="locale in locales">
                                <a href="#">{{ locale }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> {{username}}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li v-if="username">
                                <a href="#">
                                    <i class="fa fa-power-off"></i>
                                    <span>{{ $t('nav.user.logout') }}</span>
                                </a>
                            </li>
                            <li v-else>
                                <a href="#">
                                    <i class="fa fa-power-on"></i>
                                    <span>{{ $('nav.user.login') }}</span>
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
    export default {
        data () {
            return {
                title: 'MunkiReport',
                themes: ['Standard'],
                username: null,
                locales: [],
                admin: [],
                listings: [],
                reports: [],
            }
        }
    }
</script>