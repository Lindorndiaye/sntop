@include('templates.partials.header')

<!-- container -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            @yield('content')
            @yield('editable')

        </div>
    </div>
</div><!-- container -->

@include('templates.partials.footer')