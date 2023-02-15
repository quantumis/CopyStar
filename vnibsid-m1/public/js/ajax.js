let products = document.querySelectorAll('.products-elem');
let url = '/public/api/test';

function ajax(data, url, objectClass){
    let param = 'data=' + data;
    let request = new XMLHttpRequest();

    request.open('POST', url, true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(param);
    request.addEventListener('readystatechange', () => {
        if(request.readyState === 4 && request.status === 200){
            document.querySelector(objectClass).innerHTML = request.responseText;
        }
    });
}

for(let i = 0; i < products.length; i++){
    let data = products[i].getAttribute('ajax');
    products[i].onclick = () => {
        ajax(data, url, '.result');
    }
}
