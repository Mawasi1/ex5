function getCategory(data) {
    const ulFrag = document.createDocumentFragment();
    const defOpt = document.createElement('option');
    defOpt.value = 'default';
    defOpt.innerHTML = 'All';
    ulFrag.appendChild(defOpt);

    for (const key in data.categories) {
        const sel = document.createElement('option');
        sel.value = `${data.categories[key].name}`;
        sel.innerHTML = `${data.categories[key].name}`;

        ulFrag.appendChild(sel);
    }
    const cat = document.getElementById('cat');
    if (cat !== null) {
        cat.appendChild(ulFrag);
        cat.addEventListener('change', (e) => {
            const newValue = e.target.value;
            const allBooks = document.getElementsByTagName("li");
            for (let i = 0, len = allBooks.length; i < len; i++) {
                if (allBooks[i].classList.contains(newValue) || newValue == 'default') {
                    allBooks[i].style.display = 'block';
                } else {
                    allBooks[i].style.display = 'none';
                }
            }
        });
    }

}

fetch("./data/category.json")
    .then(response => response.json())
    .then(data => getCategory(data));