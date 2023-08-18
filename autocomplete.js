$(document).ready(function() {
    $('#country').on('input', function() {
        let searchTerm = $(this).val();

        if (searchTerm.length >=3) {

            $.ajax({
                url: '/var/www/homeworks/phplesson/autocomplete.php',
                method: 'GET',
                dataType: 'json',
                data: {term: searchTerm},
                success: function (response) {
                    $('#country').autocomplete({
                        source: response
                    });
                }
            });
        }
    });
});
