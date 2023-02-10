var i = 1;
var slider = document.getElementsByClassName('sl-item');
$('#next').click(function(){
    $('.sl-item').addClass('d-none');
    $(slider[i]).addClass('active');
    i++;
    alert(1111)
    if(i == 4){
        i = 0
    }
});
