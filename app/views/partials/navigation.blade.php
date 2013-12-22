<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <button class="navbar-toggle" data-toggle='collapse' data-target='#menubar' type='button'>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </button>
        <a class="navbar-brand" href="/">Real Estate App</a>
    </div>
    <div class="collapse navbar-collapse" id="menubar">
        <ul class="nav navbar-nav">
            <li>{{ HTML::clever_link('/', 'Home') }}</li>
            <li>{{ HTML::clever_link('admin/properties', 'Admin') }}</li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check())
            <li>{{ HTML::link('user/login', 'Login') }}</li>
            @else
            <li>{{ HTML::link('user/logout', 'Logout') }}</li>
            @endif
        </ul>
    </div>
</div>
