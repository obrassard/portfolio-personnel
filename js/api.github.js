
var apiUrl = "https://api.github.com/users/obrassard/repos";
$("#githubProjects").append("<div class='col-md-12'><h3 class='text-center'><i class='fa fa-github'></i></h3></div>");
$.getJSON(apiUrl, function(data) {
    if (data.length === 0){
        $("#githubProjects").append("<div class='col-md-12'><p class='text-center'>Cet utilisateur n'as aucun projet publics sur Github</p></div>");
    } else {
        $("#githubProjects").append('<div class="col-md-12"><h4 class="text-center">Projets Github</h4><hr></div>');
        $.each(data, function(key, value) {
            if (value.language == null) { value.language = 'Markdown' }
            $("#AllProjects").append(
                '<div class="well git">' +
                '<a href="'+ value.html_url+'"><div class="title">'+value.full_name+'</div></a>' +
                '<p>'+value.description+'</p>'+
                '<table><tr>'+
                    '<td><i class="fa fa-circle" style="color:'+GetColor(value.language)+'"></i>&nbsp;'+value.language+'</td>'+
                    '<td><i class="fa fa-star"></i>&nbsp;'+value.stargazers_count+'</td>'+
                    '<td>Updated on '+DisplayDate(value.updated_at)+'</td>'+
                 '</tr></table></div>'
            );
        });
    }
});


function GetColor(lang){
    var colorCode;
    $.ajax({
      url: './js/colors.json',
      async: false,
      dataType: 'json',
      success: function (languages) {
          colorCode = languages[lang].color;
        }
    });
    return colorCode;
}


function DisplayDate(date){
    var monthsArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct', 'Nov', 'Dec']
    var monthIndex = parseInt(date.substring(5,7)) -1 ;
    var month = monthsArray[monthIndex];
    var day = date.substring(8,10);
    var year = date.substring(0,4);
    return month+" "+day+" "+year;
}
