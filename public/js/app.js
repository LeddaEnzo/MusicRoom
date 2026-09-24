//
const searchInput = document.getElementById('music-search');
const musicCards = document.querySelectorAll('.music-card');
if (searchInput) {
    searchInput.addEventListener('input', function () {
        const search = this.value.toLowerCase();

        musicCards.forEach(function (card) {
            const musicName = card
                .querySelector('h3')
                .textContent
                .toLowerCase();

            if (musicName.includes(search)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
}