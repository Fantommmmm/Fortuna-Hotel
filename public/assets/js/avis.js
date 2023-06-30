const btnAjouterCommentaire = document.getElementById('btnAjouterCommentaire');

  // Sélectionnez le formulaire par son identifiant
  const formulaireCommentaire = document.getElementById('formulaireCommentaire');
 
  // Ajoutez un écouteur d'événement de clic sur le bouton
  btnAjouterCommentaire.addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le comportement de lien par défaut

    // Vérifiez si le formulaire est actuellement affiché
    const estAffiche = formulaireCommentaire.style.display === 'block';

    // Affiche ou masque le formulaire en fonction de son état actuel
    formulaireCommentaire.style.display = estAffiche ? 'none' : 'block';
    
  });

