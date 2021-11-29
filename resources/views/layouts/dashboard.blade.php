<!DOCTYPE html>
<html lang="en-us">
	@include('includes.head')
	
	 
	<body class="desktop-detected menu-on-top">

	@include('includes.header')
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
	@include('includes.topnavbar')

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon" style="background-color: #333;" >
				@yield('breadcrumb')
			</div>
			<!-- END RIBBON -->
			<div id="container">
			<!-- CONTENT -->
			@yield('content')
			</div>
		</div>
		<!-- END MAIN PANEL -->
		
	</body>
	
	@include('includes.footer')
</html>