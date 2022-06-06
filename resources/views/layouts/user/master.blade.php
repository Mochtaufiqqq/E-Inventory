<!DOCTYPE html>
<html lang="id">

@include('includes.user.head')

<body onload="startTime()">
    <!-- tap on top start-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap end-->
    <!-- page-wrapper start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- page header start-->
        @include('includes.user.navbar')
        <!-- page header ends                              -->
        <!-- page body start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- page sidebar start-->
            @include('includes.user.sidebar')
            <!-- page sidebar end-->
            <div class="page-body">
                <!-- container-fluid start-->
                @yield('content')
                <!-- container-fluid end-->
            </div>
        </div>
    </div>
    @include('includes.user.script')

    @livewireScripts
    
    @yield('script')
    @yield('javascript')
</body>

</html>