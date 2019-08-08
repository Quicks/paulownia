<script>
    $(document).ready(function () {
        $('.validForm').on('submit', function (event) {
            validForm();
        });

        function validForm() {
            var isOneLanguagefilled = false;
            var allLangArr = {!!json_encode(config('translatable.locales'))!!};
            $.each(allLangArr, function (index, value) {
                var currentLang = value;
                $("div#" + currentLang).each(function () {
                    var empty = $(this).find('@foreach(config('translatable.locales') as $locale)[name^={{$locale}}]@if(!$loop->last),@endif @endforeach').filter(function () {
                        return $(this).val().trim() === "";
                    });
                    if (!empty.length) {
                        isOneLanguagefilled = true;
                        return false;
                    }
                });
            });
            if (!isOneLanguagefilled) {
                event.preventDefault();
                alert('All fields must be filled in at least one language!');
            }
        }
    });
</script>