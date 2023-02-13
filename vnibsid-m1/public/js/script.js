var prevarrow = document.getElementById("prevarrow"),
    nextarrow = document.getElementById("nextarrow"),
    idx = 0,
    total = document.getElementsByClassName("sl-item");

prevarrow.addEventListener("click", moveright);

function moveright(){
    prevarrow.style.display = 'block';
    if(idx === total.length - 1){
        total[idx].classList.remove('active');
        idx = 0;
        total[idx].classList.add('active');
    }else{
        total[idx].classList.remove('active');
        total[++idx].classList.add('active');
    }
    console.log("Сюда")
}

nextarrow.addEventListener("click", moveleft);

function moveleft(){
    nextarrow.style.display = 'block';
    if(idx === 0){
        total[idx].classList.remove('active');
        idx = total.length - 1;
        total[idx].classList.add('active');
    }else{
        total[idx].classList.remove('active');
        total[--idx].classList.add('active');
    }
    console.log("Туда")
}
