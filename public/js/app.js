var app = {
  init: function() {
    // On récupére le basePath
    app.basePath = $('body').data('path');
    // On cible le champs de recherche
    $('#search').on('keyup', app.searchEvent);
  },
  
  // Recherche la liste des évènements qui correspondent au texte saisi
  searchEvent: function() {
    // On récupére la valeur à rechercher
    var value = $(this).val();
    // On regarde si on a suffisament de caractères pour faire la recherche
    if (value.length < 2) {
      $('.search-results').hide();
    } else {
      console.log(value.length, value);
      // On fait la requete au serveur
      $.ajax(app.basePath + '/events/search', {
        method: 'post',
        data: { search: value },
        // On indique que la réponse sera en JSON
        dataType: 'json'
      })
        .done(app.showResults)
        .fail();   
    }
  },
  
  // Affiche la liste des évènements correspondants à la recherche
  showResults: function( events ) {
    // On cible la liste de résultats
    var div = $('.search-results');
    var list = div.find('ul');
    // On vérifie qu'il y a bien des résultats
    if (events.length === 0) {
      // Aucun résultat, on masque la div
      div.hide();
      return;
    }
    // On vide la liste
    list.empty();
    // On parcours chaque évènement pour l'insérer dans la liste
    events.forEach(function( ev ) {
      // On crée le <li>
      $('<li>').text( ev.name ).addClass('list-group-item').on('click', function() {
        // On redirige l'utilisateur vers la page de l'évènement
        document.location = app.basePath + '/events/' + ev.id;
      }).appendTo( list );
    });
    // On affiche la liste
    div.show();
  }
};

$(app.init);