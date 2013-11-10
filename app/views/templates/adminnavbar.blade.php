    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{ link_to_route('home', Config::get('cms.sitename'), [], ['class' => 'navbar-brand']) }}
        </div>
        @if(Auth::check())
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>{{ link_to_route('dashboard', 'Dashboard') }}</li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nuevo <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li>{{ link_to_route('admin.posts.create', 'Nuevo post') }}</li>
              <li>{{ link_to_route('admin.tags.create', 'Nuevo tag') }}</li>
              <li>{{ link_to_route('admin.media.create', 'Nuevo media') }}</li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>{{ link_to_route('admin.users.edit' , 'Editar perfil', [Auth::user()->id]) }}</li>
          </ul>
        </div><!--/.nav-collapse -->
        @endif
      </div>
    </div>
