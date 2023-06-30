function showCard(category) {
  let cards = document.getElementsByClassName("resto");
  for (let i = 0; i < cards.length; i++) {
    cards[i].style.display = "none";
  }

  let selectedCard = document.getElementById(category);
  if (selectedCard) {
    selectedCard.style.display = "block";
  }
}

document.addEventListener("DOMContentLoaded", function() {
  showCard("menu-matin");
});
