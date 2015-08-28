<!DOCTYPE html>
<html>
    <head>
        <title>Bet 'N Stuff - @yield('title')</title>
        <link href="static/css/master.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

        <!-- JSON "FEED" - http://www.nfl.com/liveupdate/scores/scores.json -->
        <script>
            $(document).ready(function() {
                $.get("http://www.nfl.com/liveupdate/scores/scores.json",dataType='json', function(data) {
                    $.each(data, function(key, value) {
                        $("#scores").append('<div><span>'+ value['home']['abbr']  +'</span>' 
                                              +' <span style="color:red">'+      value['home']['score']['T'] +'</span>'
                                              +' vs. <span>'+      value['away']['abbr']       +'</span>'
                                              +' <span style="color:red">'+      value['away']['score']['T'] +'</span>'
                                              +'</div>');
                    });
                });
            });
        </script>
    </head>
    <body>
        <header>
            <h1><span>BET N STUFF</span></h1>
            <nav>
                <ul>
                    <li><a href="#play" style="background-color: #C8C8C8">PLAY</a></li>
                    <li><a href="#info">PLAYER INFO</a></li>
                    <li><a href="#win">WINNERS</a></li>
                    <li><a href="#pay">PAYMENT</a></li>
                </ul>
            </nav>
        </header>
        
        <div id="content">
	        <aside id="sidebar">
	            @section('sidebar')
	                <h3 class="title">Sidebar</h3>
	            @show
	        </aside>
	
	        <div id="center">
	            @yield('content')
	        </div>
        </div>
        
        <footer>Mike &amp; J's Inc. &copy; 2015</footer>
    </body>
</html>
