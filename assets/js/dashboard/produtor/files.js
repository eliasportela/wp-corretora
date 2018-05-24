$("#foto_file").on('change', function () {

    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#image-foto");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        console.log("Este navegador nao suporta FileReader.");
    }

});

$("#comprovante_file").on('change', function () {

    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#image-comprovante");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        console.log("Este navegador nao suporta FileReader.");
    }

});


function modalFoto() {
    $('#modalFoto').css('display','block');
    $('html').css('overflow','hidden');
}

function closeModalFoto(par) {
    
    $('html').css('overflow','auto');
    $('#modalFoto').css('display','none');
    
    if (par == 1) {
        $('#foto_file').val(null);
        $("#image-foto").empty();
    }
}

function modalComprovante() {
    $('#modalComprovante').css('display','block');
    $('html').css('overflow','hidden');
}

function closeModalComprovante(par) {
    
    $('html').css('overflow','auto');
    $('#modalComprovante').css('display','none');
    
    if (par == 1) {
        $('#comprovante_file').val(null);
        $("#image-comprovante").empty();
    }
}
