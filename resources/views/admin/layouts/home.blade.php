<!doctype html>
<html @if(app()->getLocale() == 'ar') dir="rtl" @endif
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('admin.layouts.partials.header')
    <body data-topbar="dark">
        <div id="layout-wrapper">
            @include('admin.layouts.components.header')
          @include('admin.layouts.components.leftside')
           @yield('content')
        </div>
        @include('admin.layouts.components.rightbar')

        <div class="rightbar-overlay"></div>
        @include('admin.layouts.partials.scripts')
      </body>

</html>