$(function () {
    print("report_template", "#print", "");

    // print("ver_htmlDetalhesDiarioDistrict", ".printDetailD");
    // print("ver_htmlDetalhesDiarioBrigade", ".printDetailB");
});

function print(fileName, buttonId, getString){
    if(!buttonId)
        buttonId = "#print";

    $(document).on("click", buttonId, function () {
        var id = $(this).val();
        // alert(id);
        imprimir_conteudoHtml(fileName, getString);
    });
}
function imprimir_conteudoHtml(fileName, getString) {
    // var  protocol = window.location.protocol;
    // var hostname = window.location.hostname;
    // var base_url = protocol+'//'+hostname+'/restaurante/class';
    var base_url = base_url_function();
    console.log(base_url)
    // var base_url = document.getElementById("base_url").value;
    VentanaCentrada(base_url+'FRONT-END/reports/pdf/documentos/'+fileName+'.php?'+getString, 'Conteudo', '', '1024', '768', 'true');
}
// alert(base_url_function())
function base_url_function() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/';
    }else{
        var url = location.origin+"/";
    }
    return url;
}
