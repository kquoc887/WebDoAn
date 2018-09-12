<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="#"> <b>Dashboard</b></a>
            </li>
            <li>
                <a href="#"><b>Category</b><span class="caret"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="PageAdmin/category/category_list">List Category</a>
                    </li>
                    <li>
                        <a href="PageAdmin/category/category_add">Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"> <b>Movie</b><span class="caret"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('movie_list')}}/">List Movie</a>
                    </li>
                    <li>
                        <a href="PageAdmin/movie/movie_add">Add Movie</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"> <b>Schedule</b><span class="caret"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="PageAdmin/schedule/schedule_list">Schedule List</a>
                    </li>
                    <li>
                        <a href="PageAdmin/schedule/schedule_add">Add Schedule</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><b>User</b><span class="caret"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="PageAdmin/user/user_list">List User</a>
                    </li>
                    <li>
                        <a href="PageAdmin/user/user_add">Add User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>