<ul class="sidebar-menu">
    <li class="header">Навигация</li>
    @foreach($menu_modules as $menu_module)
    <li class="treeview">
        <a href="{{$menu_module->url}}">
            <i class="{{$menu_module->icon}}"></i> <span>{{$menu_module->title}}</span>
        </a>
    </li>
    @endforeach
</ul>
