let products = document.querySelectorAll('.products-elem');
let url = '/public/api/catalog';
let filter = document.getElementById('filter');
let category = document.getElementById('category');
let btn = document.getElementById('pay-btn');

function ajax(data, url, objectClass, btn){
    let cur_f = "empty";

    if(filter.value != null){
        cur_f = filter.value;
    }

    if(btn !== null)
        {btn = 1;}
    else
        {btn = 0;}

    let request = new XMLHttpRequest();
    
    request.open('POST', url, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('category=' + data + '&' + 'sort=' + cur_f + '&' + 'auth=' + btn);
    request.addEventListener('readystatechange', () => {
        console.log(request);
        if(request.readyState === 4 && request.status === 200){
            document.querySelector(objectClass).innerHTML = request.responseText;
        }
    });
}

    category.addEventListener('change', () => {
        console.log(category.value);
        console.log(btn)
        ajax(category.value, url, '.row-products', btn);
    });

    filter.addEventListener('change', () => {
        console.log(filter.value);
        ajax(category.value, url, '.row-products', btn);
    });

