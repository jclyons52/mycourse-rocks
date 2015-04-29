<ul class="nav nav-pills nav-stacked">
    <li><a href="{{ url('logs') }}">logs</a></li>
    <li><a href="{{url('posts')}}">Blog posts</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Asset Management<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('fileentry') }}">Files</a></li>
            <li><a href="{{ url('admin/links') }}">links</a></li>
            <li><a href="{{ url('admin/lessons') }}">Lessons</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User Management<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('admin/users') }}">Users</a></li>
            <li><a href="{{ url('admin/roles') }}">Roles</a></li>
            <li><a href="{{ url('admin/permissions') }}">Permissions</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Product Management<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('admin/products') }}">products</a></li>
            <li><a href="{{ url('admin/categories') }}">Categories</a></li>
            <li><a href="{{ url('admin/tags') }}">Tags</a></li>
        </ul>
    </li>
</ul>

