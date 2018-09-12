<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="PageAdmin/category/category_list">Page Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right g">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="glyphicon glyphicon-user" ></i> <i class="caret"></i >
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if(Auth::check())

                <li>
                    <a href="#"><i class="glyphicon glyphicon-user"></i>{{base64_decode(Auth::user()->USER)}} </a>
                </li>
                <li>
                    <a href="PageAdmin/user/user_edit/{{Auth::user()->id}}"><i class="glyphicon  glyphicon-cog" ></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="PageAdmin/Logout"><i class="glyphicon glyphicon-log-out" ></i> Logout</a>
                </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

   @include('PageAdmin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>