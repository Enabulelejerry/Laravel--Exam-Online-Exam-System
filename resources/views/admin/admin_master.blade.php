<!doctype html>
<html lang="en">

<head>
	<script type="text/javascript">
		BASE_URL ="<?php echo url('');  ?>"
	</script>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon--> 
	
	<link rel="icon" href="{{ asset('backend/images/standard-log.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

	
	<link href="{{ asset('backend/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('backend/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('backend/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/css/header-colors.css') }}" />
	   <!--toaster-->
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<title>Standard Life EOS</title>
</head>

<body>


	<!--wrapper-->
	<div class="wrapper">
	
		@include('admin.body.header')
        @include('admin.body.sidebar')

         @yield('admin');
         @include('admin.body.footer')
		<!--start page wrapper -->
	
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2022. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>

			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
	
	<script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('backend/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('backend/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{ asset('backend/js/index.js') }}"></script>
	  <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
	  <script>
		  $('.single-select').select2({
			  theme: 'bootstrap4',
			  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			  placeholder: $(this).data('placeholder'),
			  allowClear: Boolean($(this).data('allow-clear')),
		  });
		  $('.multiple-select').select2({
			  theme: 'bootstrap4',
			  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			  placeholder: $(this).data('placeholder'),
			  allowClear: Boolean($(this).data('allow-clear')),
		  });
	  </script>
	  
	  <script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	  <script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	  <script>
		  $(document).ready(function() {
			  $('#example').DataTable();
			} );
	  </script>
	  <script>
		  $(document).ready(function() {
			  var table = $('#example2').DataTable( {
				  lengthChange: false,
				  buttons: [ 'copy', 'excel', 'pdf', 'print']
			  } );
		   
			  table.buttons().container()
				  .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		  } );
	  </script>

	<!--app JS-->
	<script src="{{ asset('backend/js/app.js') }}"></script>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
	 $(function(){
	   $(document).on('click','#delete',function(e){
		  e.preventDefault();
		  var link = $(this).attr("href");
		  
   Swal.fire({
	 title: 'Are you sure?',
	 text: "Delete This Data?",
	 icon: 'warning',
	 showCancelButton: true,
	 confirmButtonColor: '#3085d6',
	 cancelButtonColor: '#d33',
	 confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
	 if (result.isConfirmed) {
	   window.location.href = link
	   Swal.fire(
		 'Deleted!',
		 'Your file has been deleted.',
		 'success'
	   )
	 }
   })
   
	   })
	 })
   
	</script>

	  <!-- toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>

	@if(Session::has('message'))
	
	var type = "{{ Session::get('alert-type', 'info') }}"
	
	switch(type){
	  case 'info':
	  toastr.info("{{ Session::get('message') }}");
	  break;
	
	  case 'success':
	  toastr.success("{{ Session::get('message') }}");
	  break;
	
	  case 'warning':
	  toastr.warning("{{ Session::get('message') }}");
	  break;
	
	  case 'error':
	  toastr.error("{{ Session::get('message') }}");
	  break;
	
	}
	@endif
	
	</script>

<script src="{{ asset('assets_js/js/custom.js') }}"></script>
     
	 
	 
</body>

</html>