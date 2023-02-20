let products = document.querySelectorAll('.products-elem');
let url = '/public/api/catalog';
let filter = document.getElementById('filter');
let category = document.getElementById('category');
let btn = document.getElementById('pay-btn');
if(btn !== null)
        {btn = 1;}
    else
        {btn = 0;}

let cur_catalog = document.getElementsByClassName("products-elem");

function ajax(cur_c, url, btn){
    let cur_f = "empty";

    if(filter.value != null){
        cur_f = filter.value;
    }

    getResource(url, cur_c, cur_f, btn)
        .then(data => recreateCatalog(data))
        .catch(err => console.error(err));
}
    async function getResource(url, cur_c, cur_f, btn){
        const res = await fetch(`${url}/${cur_c}/${cur_f}/${btn}`);
        console.log(document.getElementById("csrf-key").getAttribute("content"));

        if(!res.ok){
            throw new Error(`Could not fetch ${url}, status: ${res.status}`);
        }

        return await res.json();
    }

    function recreateCatalog(response){
        for(i = cur_catalog.length-1; i >= 0; i--){
            cur_catalog[cur_catalog.length-1].remove();
        }

        response.forEach(p => {
            let card = document.createElement('div');
            let str;
            card.classList.add("col-lg-4");
            card.classList.add("products-elem");
            console.log(card);

            str = `
            <div class="card my-card">
                <a href="/public/product/${p.id}">
                    <div class="block-img"><img src="/public/img/${p.photo}" alt="${p.photo}" class="img-fluid img-plus"></div>
                </a>
                <div><p class="pr-desc"><strong>${p.name}</strong></p></div>
                <div class="d-flex align-items-center justify-content-between">
                    `;
            if(btn === 1)
                str += `<a href="/public/cart/add/${p.id}" class="btn btn-danger" id="pay-btn">Купить</a>`;

            str +=
                    `<p class="m-0 price">${p.price} p.</p>
                </div>
            </div>
            `;
            card.innerHTML = str;
            document.querySelector('.row-products').appendChild(card);
        });
    }

    category.addEventListener('change', () => {
        ajax(category.value, url, btn);
    });

    filter.addEventListener('change', () => {
        ajax(category.value, url, btn);
    });


