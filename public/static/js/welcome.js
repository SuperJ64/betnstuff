// Ajax method for displaying game data

$(document).ready(function() {
	// Fetch records via ajax
    $.get("/index.php/ajax",dataType='json', function(data) {
        // Iterate over each element and insert them into the scores section
        $.each(data, function(key, value) {
            $("#scores").append('<div>'
                +'<img style="float:left; width:85px; height:85px; clear:both; border:1px solid #999999;" src="static/img/teams/'
                + value['home']['team']['abbr'] +'.png" /><span>'+ value['home']['team']['name'] +'</span>'
                +' <span style="color:red; font-size:35pt;">'+ value['home']['score'] +'</span>'

                +' <img style="width:85px; height:85px; border:1px solid #999999;" src="static/img/teams/'
                + value['away']['team']['abbr']+'.png" /><span>'+ value['away']['team']['name'] +'</span>'
                +' <span style="color:red; font-size:35pt;">'+ value['away']['score'] +'</span>'
            +'</div>');
        });
    });
});