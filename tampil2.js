$(document).ready(function() {
    selesai();
});
 

function selesai() {
    setTimeout(function() {
        jumlah();
        selesai();
        pesan();
    }, 200);
}


function jumlah() {
    $.getJSON("data.php", function(datas) {
        $("#notif").html(datas.jumlah);
    });
}
