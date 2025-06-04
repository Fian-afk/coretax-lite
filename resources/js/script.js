const filter = document.getElementById('search');
const items = document.querySelectorAll('tbody tr');

filter.addEventListener('input', (e) => filterData(e.target.value));

function filterData(search) {
    items.forEach((item) => {
        if (item.innerText.toLowerCase().includes(search.toLowerCase())) {
            item.classList.remove('hidden');
        } else {
            item.classList.add('hidden');
        }
    });
}