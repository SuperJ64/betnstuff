<!DOCTYPE html>
<html>
    <head>
        <title>Bet 'N Stuff - @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100bold" rel="stylesheet" type="text/css">
        <link href="static/css/master.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

        <!-- JSON "FEED" - http://www.nfl.com/liveupdate/scores/scores.json -->
        <script>
            $(document).ready(function() {
                $.get("http://www.nfl.com/liveupdate/scores/scores.json",dataType='json', function(data) {
                    $.each(data, function(key, value) {
                        $("#scores ul").append('<li>'+ value['home']['abbr'] 
                                              +' <span>'+ value['home']['score']['T'] +'</span>'
                                              +' vs. '+ value['away']['abbr']
                                              +' <span>'+ value['away']['score']['T'] +'</span>'
                                              +'</li>');
                    });
                });
            });
        </script>
    </head>
    <body>
        <header>
            <h1>Welcome to Bet 'N Stuff</h1>
            <nav>
                <ul>
                    <li><a href="#Home">Home</a> |</li>
                    <li><a href="#Bet">Bet</a> |</li>
                    <li><a href="#Stuff">Stuff</a> |</li>
                    <li><a href="#Options">Options</a> |</li>
                    <li><a href="#Help">Help</a></li>
                </ul>
            </nav>
        </header>

        <aside id="sidebar">
            @section('sidebar')
                <h3 class="title">Sidebar</h3>
            @show
        </aside>

        <div class="container">
            <div class="content">
                <div>@yield('content')</div>
            </div>
        </div>

        <footer>Mike &amp; J's Inc. &copy; 2015</footer>
    </body>
</html>
