@if(Session::has('flash_message'))
    <div class="container flash_message">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert {{ Session::has('flash_type') ? 'alert-' . Session::get('flash_type') : '' }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        </div>
    </div>
@endif
