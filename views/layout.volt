{% include 'marco/form_element.volt' %}

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>

	</title>
	<link href="{{ url.get() }}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"
	/>
	<link href="{{ url.get() }}/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{ url.get() }}/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{ url.get() }}/assets/css/main.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ url.get() }}/assets/demo/default/media/img/logo/favicon.ico" />


	<!--begin::Base Scripts -->
	<script src="{{ url.get() }}assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="{{ url.get() }}assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Base Scripts -->
	<!--begin::Page Vendors -->
	<script src="{{ url.get() }}assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
	<!--end::Page Vendors -->
	<!--begin::Page Snippets -->
	<script src="{{ url.get() }}assets/app/js/dashboard.js" type="text/javascript"></script>
	<!--end::Page Snippets -->
	<script src="{{ url.get() }}assets/demo/default/custom/components/forms/widgets/select2.js" type="text/javascript"></script>
	<script src="{{ url.get() }}assets/js/app.js"></script>
	<script src="{{ url.get() }}assets/js/nano.js"></script>
	<script src="{{ url.get() }}assets/js/jquery.number.min.js"></script>
	<script src="{{ url.get() }}assets/js/wnumb-1.1.03/wNumb.js"></script>
	<script>
        var numberFormat = wNumb({
            mark: '.',
            thousand: ','
        });
	</script>
</head>