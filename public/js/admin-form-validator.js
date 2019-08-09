$(document).ready(function () {
    $('.validForm').on('submit', function (event) {
        validForm();
    });

    function validForm() {
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
        if (!isOneLanguagefilled) {
            event.preventDefault();
            alert('All fields must be filled in at least one language!');
        }
    };
});