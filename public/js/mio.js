var regioni = document.getElementById("regione");
var province = document.getElementById("provincia");
var comuni = document.getElementById("comune");



regioni.addEventListener("change", function () {
    comuni.disabled = true;
    comuni.innerHTML = "";
    province.disabled = true;
    province.innerHTML = "";
    makejsonRequest("regioni", "province", province, this.value);
    
    //makejsonRequest("province", "comuni", comuni,this.value);
}, false);

province.addEventListener("change", function () {
    makejsonRequest("province", "comuni", comuni,this.value);
}, false);

function aggiornaDati(arr,el) {
    var out = "<option selected value>Scegli "+el.id+"</selected>";
    var i;
    for(i = 0; i < arr.length; i++) {
        out += '<option value="'+arr[i].id+'">' + 
        arr[i].nome + '</option>';
    }
    el.disabled = false;
    el.innerHTML = out;
}
function makejsonRequest(param1,param2,el,id) {
    var xmlhttp = new XMLHttpRequest();
    var url = "/" + param1 + "/" + id + "/" + param2;

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myArr = JSON.parse(this.responseText);
            aggiornaDati(myArr,el);
        }
    };
    xmlhttp.open("GET", url,true);
    xmlhttp.send();
}

