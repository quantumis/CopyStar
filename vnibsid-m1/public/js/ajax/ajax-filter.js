let products = document.querySelectorAll('.products-elem');
let url = '/public/api/catalog';
let filter = document.getElementById('filter');
let category = document.getElementById('category');

function ajax(data, url, objectClass){
    let cur_f = "empty";

    if(filter.value != null){
        cur_f = filter.value; 
    }

    let request = new XMLHttpRequest();
    
    request.open('POST', url, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('category=' + data + '&' + 'sort=' + cur_f);
    request.addEventListener('readystatechange', () => {
        console.log(request);
        if(request.readyState === 4 && request.status === 200){
            document.querySelector(objectClass).innerHTML = request.responseText;
        }
    });
}

    category.addEventListener('change', () => {
        console.log(category.value);
        ajax(category.value, url, '.row-products');
    });

    filter.addEventListener('change', () => {
        console.log(filter.value);
        ajax(category.value, url, '.row-products');
    });

