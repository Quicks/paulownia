$(document).ready(function () {

    $('#translate').click(function (event) {
        $(this).attr("disabled", true);
        var texts = [];
        $('.translate[id^="es"]').each(function() {
            texts.push($(this).val());
        });

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax("/admin/translate", {
            method: "POST",
            data: {"texts":texts},
            success(answer) {
                alert("Translate successful, don't forget to save result.");
                $.each(allLangArr, function (idx, locale) {
                    if(locale != 'es') {
                       $('.translate[id^="'+locale+'"]').each(function(index ) {
                            $(this).val(htmlDecode(answer[locale][index]));
                            if ( $(this).is( "textarea" ) ) {
                                tinymce.get($(this).attr('id')).setContent(answer[locale][index]);
                            };
                        });
                    };
                });
            },
            error(answer) {
                alert("Translate error, see console for details");
                console.log(answer);
            }
        });
    });

    function htmlDecode(input){
      var e = document.createElement('textarea');
      e.innerHTML = input;
      return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
    }

});
