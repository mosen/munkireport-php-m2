<header class="navbar navbar-default navbar-static-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">@yield('title')</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">

                <!-- active url = '' -->
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fa fa-th-large"></i>
                        <span class="visible-lg-inline" data-i18n="nav.main.dashboard"></span>
                    </a>
                </li>

                <!-- active url = 'show/reports/' -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bar-chart-o"></i>
                        <span data-i18n="nav.main.reports"></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="report dropdown-menu">

                        <!-- foreach report in view_path show list item -->

                    </ul>

                </li>

                <!-- active url ='show/listing/' -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-list-alt"></i>
                        <span data-i18n="nav.main.listings"></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="listing dropdown-menu">

                        <!-- foreach listing in view_path show list item -->

                    </ul>

                </li>

                <!-- if admin and url admin/show/ -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-list-alt"></i>
                        <span data-i18n="nav.main.admin"></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="admin dropdown-menu">

                        <!-- foreach admin in view_path show list item -->
                    </ul>

                </li>


                <li>
                    <a href="#" class="filter-popup">
                        <i class="fa fa-filter"></i>
                    </a>
                </li>

            </ul><!-- nav navbar-nav -->

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu theme">

                        <!-- foreach item in assets/themes show list item -->
                        

                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu locale">

                        <!-- foreach item in assets/locales show list item -->

                    </ul>
                </li>

                {{--Hide logout button if auth_noauth--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> <?php echo $_SESSION['user']; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/auth/logout') }}">
                                <i class="fa fa-power-off"></i>
                                <span data-i18n="nav.user.logout"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
    </div>
</header>
