$(document).ready(function()
{
    $("#owl-home-banner1").owlCarousel({
        autoPlay : 12000,
        items : 1,
        itemsDesktop : [1200,1],
        itemsDesktopSmall : [979,1],
        itemsTablet: [720,1], //2 items between 600 and 0
        itemsMobile : [360,1] // itemsMobile disabled - inherit from itemsTablet option
    });

    $("#owl-home-banner2").owlCarousel({
        autoPlay : 12000,
        items : 1,
        itemsDesktop : [1200,1],
        itemsDesktopSmall : [979,1],
        itemsTablet: [720,1], //2 items between 600 and 0
        itemsMobile : [360,1] // itemsMobile disabled - inherit from itemsTablet option
    });


    /*
    var instance = M.Carousel.init({
        fullWidth: true,
        indicators: true
    });
    */
    // Or with jQuery


    /* Chama a função filtros que está no font init.js */
    owlFiltros();


    $("#owl-home-convenios").owlCarousel({
      autoPlay : 12000,
      items : 6,
      // navigationText: ['<div style="background:url(/imgs/arrows.png);"></div>', '<div style="background:url(/imgs/arrows.png);"></div>'],
      // navigation: true,
      itemsDesktop : [1200,5],
      itemsDesktopSmall : [979,4],
      itemsTablet: [600,3], //2 items between 600 and 0
      itemsMobile : [400,2] // itemsMobile disabled - inherit from itemsTablet option
    });

    $("#owl-home-informativos").owlCarousel({
      autoPlay : 12000,
      items : 3,
      // navigationText: ['<div style="background:url(/imgs/arrows.png);"></div>', '<div style="background:url(/imgs/arrows.png);"></div>'],
      // navigation: true,
      itemsDesktop : [1400,2],
      itemsDesktopSmall : [979,1],
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
    });

    $('.bt-ver-todas').click(function()
    {
        var ajax = $.ajax({
            url: '/ajax_selectMaterias',
            method: "GET"
        });

        ajax.done(function (data)
        {
            var register = JSON.parse(data);
            var string;
            var link;

            // console.log(register);
            $( ".docente .row .box-cards-docentes" ).html('');
            $( ".docente .row .box-cards-docentes" ).html('<div class="title-docente">CANAL DO DOCENTE</div>');
            for (var key in register)
            {
                var item = register[key];

                link = '/'+'noticia/' + item.id + '/' + item.title;
                if (item.site != null) {
                    link = item.site;
                }

                var img = '/'+'images/default.png';
                var imgAutor = img;
                var autorName = '';
                var subtitle = '';
                if ( item.imagem_principal_namefilefull != null ) { img = '/' + item.imagem_principal_namefilefull; }
                if ( item.autorImagem_namefilefull != null ) { imgAutor = '/' + item.autorImagem_namefilefull }
                if ( item.autor_name != null ) { autorName = 'por '+item.autor_name; }
                if ( item.subtitle != null ) { subtitle = item.subtitle }

                var card = '';
                card += '<div class="col s12 m12 l6 outro">';
                card += '   <div class="box-colunista">';
                card += '       <a href="'+link+'"><div class="colunista-img" style="background-image: url('+img+');"></div></a>';
                card += '   </div>';
                card += '   <div class="colunista-text">';
                card += '       <div class="sub-title">';
                card += '           <table border="1">';
                card += '               <tr>';
                card += '                   <td width="1">';
                card += '                       <div class="borda-avatar">';
                card += '                           <div class="avatar" style="background-image: url('+imgAutor+');"></div>';
                card += '                       </div>';
                card += '                   </td>';
                card += '                   <td class="td-avatar-info">';
                card += '                       <div class="avatar-name assuntos">'+autorName+'</div>';
                card += '                   </td>';
                card += '               </tr>';
                card += '           </table>';
                card += '       </div>';
                card += '       <div class="title titles"><a href="'+link+'">'+item.title+'</a></div>';
                card += '       <div class="subtitles"><a href="'+link+'">'+subtitle+'</a></div>';
                card += '   </div>';
                card += '</div>';
                $( ".docente .row .box-cards-docentes" ).append( card );
            }

            // Oculta botão "carregar mais"
            // console.log(data[0].nextRegister);
            $("#conteudo .conteiner-carregar-mais").hide('slow');
        });
        ajax.fail(function (jqXHR, textStatus) { console.log( "jqXHR: " + jqXHR );
                                                 console.log( "Request failed: " + textStatus ); });

        /*
        var hiddenJson = $('#inputJson').val();
        console.log(JSON.parse(hiddenJson));
          $(this).hide('fast');
          $( ".docente .row .box-cards-docentes" ).html('');
          // console.log(JSON.parse(json));
          for (var i = 0; i < 4; i++ )
          {
              var card = '';
              card += '<div class="col s12 m12 l6 outro">';
              card += '   <div class="box-colunista">';
              card += '       <a href="/noticia/'+(i+1)+'"><div class="colunista-img" style="background-image: url(/images/Home/DELETAR-docente.jpg);"></div></a>';
              card += '   </div>';
              card += '   <div class="colunista-text">';
              card += '       <div class="sub-title">';
              card += '           <table border="1">';
              card += '               <tr>';
              card += '                   <td width="1">';
              card += '                       <div class="avatar" style="background-image: url(/images/avatar.jpg);"></div>';
              card += '                   </td>';
              card += '                   <td class="td-avatar-info">';
              card += '                       <div class="avatar-name assuntos">por Roberto Carlos</div>';
              card += '                   </td>';
              card += '               </tr>';
              card += '           </table>';
              card += '       </div>';
              card += '       <div class="title titles"><a href=""/noticia/'+(i+1)+'"">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id magna nunc. Etiam elementum sapien lacus.</a></div>';
              card += '       <div class="subtitles"><a href=""/noticia/'+(i+1)+'"">Fusce id magna nunc. Etiam elementum sapien lacus. Praesent nec placerat purus, eget sollicitudin eros. Etiam commodo placerat fermentum.</a></div>';
              card += '   </div>';
              card += '</div>';
              $( ".docente .row .box-cards-docentes" ).append( card );
          }
          */
    });

});
