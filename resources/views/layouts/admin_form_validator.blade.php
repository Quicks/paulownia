<script>
    $(document).ready(function () {
        $('#validForm').on('submit', function (event) {
            validForm();
        });

        function validForm() {
            var isOneLanguagefilled = false;
            $('.part-form').each(function () {
                var empty = $(this).find(@foreach(config('translatable.locales') as $locale)[name^="{{$locale}}"],
                    @endforeach).filter(function () {
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
        }
    });
</script>