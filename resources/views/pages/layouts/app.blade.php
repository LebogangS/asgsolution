<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>{{ isset($title) ? $title . ' | ' . config('app.name', 'ASG SOLUTION') : config('app.name', 'ASG SOLUTION') }}</title>
        <link  type="text/css" href="{{ asset('custom.css') }}" rel="stylesheet">
    </head>
    <body>
	    @yield('content')
    </body>
</html>