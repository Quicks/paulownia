$(document).ready(function () {
    $('.validForm').on('submit', function (event) {
        if(!document.validForm()) {
            event.preventDefault();
            alert('All fields must be filled in at least one language!');
        }
    });

    document.validForm = function validForm() {
        var isOneLanguagefilled = false;
        $.each(allLangArr, function (index, value) {
            var empty = $('[name^='+ value +']').filter(function () {
                return $(this).val().trim() === "";
            });
            if (!empty.length) {
                isOneLanguagefilled = true;
                return false;
            }
        });
        return isOneLanguagefilled;
    };
});