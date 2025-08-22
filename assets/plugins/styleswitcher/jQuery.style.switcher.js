// Theme color settings
$(document).ready(function(){

function store(name, val) {
    if (typeof (Storage) !== "undefined") {
      localStorage.setItem(name, val);
    } else {
      window.alert('Please use a modern browser to properly view this template!');
    }
  }
  var currentTheme =  localStorage.getItem('theme');

 $("*[data-theme]").click(function(e){
      e.preventDefault();
        var currentStyle = $(this).attr('data-theme');
        store('theme', currentStyle);
        $('#theme').attr({href: 'assets/css/colors/'+currentStyle+'.css'})
    });

  
    // color selector
    $('#themecolors').on('click', 'a', function(){

        $('#themecolors li a').removeClass('working');
        $(this).addClass('working');

        /*atualiza o tema no banco*/
        var url_change = baseUri + '/configuracao/altera_cor/';
        var tema  = $(this).attr('data-theme');
        $.post(url_change, {config_tema_color:tema}).then(function (rs) {
            if (rs != 1) {
              alert_error('Ação não pode ser realizada!');
            }
        });
      });

});
