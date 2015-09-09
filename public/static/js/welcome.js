// Ajax method for displaying game data

$(document).ready(function() {
    $.get("/index.php/ajax",dataType='json', function(data) {
        $.each(data, function(key, value) {
        	alert($key);
        	/*
            $("#scores").append('<div>'
                +'<img style="float:left; width:85px; height:85px; clear:both; border:1px solid #999999;" src="static/img/teams/'
                + value['hteam']['abbr'] +'.png" /><span>'+ value['hteam']['name'] +'</span>'
                +' <span style="color:red; font-size:35pt;">'+ value['score']['home_q1'] +'</span>'

                +' <img style="width:85px; height:85px; border:1px solid #999999;" src="static/img/teams/'
                + value['vteam']['abbr']+'.png" /><span>'+ value['vteam']['name'] +'</span>'
                +' <span style="color:red; font-size:35pt;">'+ value['vteam']['score']['away_q1'] +'</span>'
            +'</div>');
            */
        });
    });
});