<!DOCTYPE html>
<html>

@include('backend.common.header')
@yield('pagecss')
@include('backend.common.side_nav')

<section class="content">
   <div class="container-fluid">
   	@yield('content')
	</div>
</section>

	
@include('backend.common.footer')

@yield('pageJs')
@yield('pagescripts')

</body>

</html>