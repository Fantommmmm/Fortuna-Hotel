function showCard(title) {
    var cards = document.getElementsByClassName("chambre-card");
    for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var cardTitle = card.getAttribute("data-title");
        if (cardTitle === title) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    }
}



  
  
  