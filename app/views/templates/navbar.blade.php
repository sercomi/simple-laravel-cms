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
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="{{ ($page == 'home') ? 'active ' : '' }}">{{ link_to_route('home', trans('navbar.home')) }}</li>
            <li class="{{ ($page == 'contact') ? 'active ' : '' }}"><a href="/contact">{{trans('navbar.contact')}}</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
