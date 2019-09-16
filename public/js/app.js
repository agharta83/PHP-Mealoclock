var app = {
  init: function() {
    // On récupére le basePath
    app.basePath = $('body').data('path');
    // On cible le champs de recherche
    $('#search').on('keyup', app.searchEvent);
    // On cible le formulaire de création de compte, et on surveille l'envoi
    $('#signup').on('submit', app.signup);
    // On surveille la validation du formulaire de connexion
    $('#login').on('submit', app.login);
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
  },

  // Envoie les données d'inscription au serveur et affiche les erreurs éventuelles
  signup: function( evt ) {
    // On empêche le rechargement de la page
    evt.preventDefault();
    // On récupère les informations du formulaire
    var data = {};
    var temp = $(this).serializeArray();
    // On transforme le tableau en objet
    temp.forEach(function(item) {
      data[ item.name ] = item.value;
    });

    // On crée une requête AJAX qui envoie les informations au serveur
    $.ajax({
      url: app.basePath + '/signup',
      method: 'post',
      data: data,
      dataType: 'json'
    })
      .done(app.showSignupErrors);
  },

  // Affiche la liste des messages d'erreurs
  showSignupErrors: function( errors ) {
    // On vide la liste
    $('.errors').empty();
    
    if (errors.length === 0) {
      console.log('redirect');
      // L'utilisateur est bien inscrit, on redirige vers la page de connexion
      document.location = app.basePath + '/login';
      return;
    } 
    
    errors.forEach(function( msg ) {
      $('<div>')
        .text(msg)
        .addClass('alert alert-danger')
        .appendTo( '.errors' );
    });

    // On remonte le scroll
    $('.errors').scrollTop(0);
  },

  /*
  // Envoie les informations de connexion au serveur et affiche les erreurs éventuelles
  login: function(evt) {
    // Bloque le rechargement de la page
    evt.preventDefault();
    // On récupére les données
    var email = $('#email').val();
    var password = $('#password').val();
    // On crée la requete AJAX
    $.ajax({
      url: app.basePath + '/login',
      method: 'post',
      data: {
        email: email,
        password: password
      },
      dataType: 'json'
    })
      .done(app.showLoginErrors);
  },

  // Affiche la liste des messages d'erreurs lors de la connexion
  showLoginErrors: function(errors) {
    if (errors.length === 0) {
      // Il n'y a pas d'erreurs, l'utilisateur a été identifié, on redirige
      document.location = app.basePath + '/';
    } else {
      // On vide la liste des erreurs
      $('.errors').empty();
      // Il y a une erreur, on l'affiche
      $('<div>').text(errors[0]).addClass('alert alert-danger').appendTo('.errors');
    }
  }
  */
};

$(app.init);