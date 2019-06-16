<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="{{ URL::asset('lib/bootstrap/bootstrap-4.3.1/dist/css/bootstrap.min.css') }}">
		<script type="text/javascript" src="{{ URL::asset('lib/bootstrap/bootstrap-4.3.1/dist/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('lib/jquery/jquery-3.4.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
		
		<title>文章一覽</title>
	</head>
	<body>
		<div class="container mt-5 d-flex">
			<div class="col-4 d-dlex">
				<ul class="list-group">
					<li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
						<a>{{ $categories["daily"]["title"] }}</a>
					</li>
@foreach ($categories["daily"]["dates"] as $date)
					<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
						<a href="/article/daily/{{ $date }}/">{{ $date }}</a>
					</li>
@endforeach
					<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
						<a>所有文章</a>
					</li>
				</ul>
				<ul class="list-group mt-2">
					<li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
						<a>{{ $categories["reference"]["title"] }}</a>
					</li>
@foreach ($categories["reference"]["sites"] as $code => $site)
					<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
						<a href="/article/{{ $code }}/">{{ $site["title"] }}</a>
						<span class="badge badge-primary badge-pill">0</span>
					</li>
@endforeach
				</ul>
			</div>
		   <div class="col-8 d-flex card">
		   </div>
		</div>
	</body>
</html>
