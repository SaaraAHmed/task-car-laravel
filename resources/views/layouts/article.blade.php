<!DOCTYPE html>
<html lang="en">

@include('includes.head')


<body>
        @include('includes.header')
        @include('includes.topArea')
        
        @yield('content')

        @include('includes.footer')
        @include('includes.footerJs')
</body>
</html>