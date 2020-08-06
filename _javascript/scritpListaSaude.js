$(document).ready(function () {
    $('#cBuscaSaude').keyup(function () {
        $('#form').submit(function () {
            var dados = $(this).serialize();

            $.ajax({
                url: 'processaSaude.php',
                type: 'POST',
                datatype: 'html',
                data: dados,
                sucess: function (data) {
                    $('#areaSaude').empty().html(data);
                }

            });

            return false;
        });
        $('#form').trigger('submit');
    });
});