$(document).ready(function () {
    function carregarFuncionarios() {
        $.get('backend.php', function (data) {
            const funcionarios = JSON.parse(data);
            $('#funcionarios-table').empty();
            funcionarios.forEach(func => {
                $('#funcionarios-table').append(`
                    <tr>
                        <td>${func.nome}</td>
                        <td>${func.cargo}</td>
                        <td>R$ ${func.salario_atual.toFixed(2)}</td>
                        <td>R$ ${func.salario_anterior.toFixed(2)}</td>
                    </tr>
                `);
            });
        });
    }

    $('#cadastro-form').submit(function (e) {
        e.preventDefault();
        $.post('backend.php', $(this).serialize(), function (response) {
            alert(response);
            carregarFuncionarios();
        });
    });

    $('#correcao-form').submit(function (e) {
        e.preventDefault();
        const data = {
            percentual: $('#percentual').val(),
            bonus: $('#bonus').val()
        };
        $.ajax({
            url: 'backend.php',
            type: 'PUT',
            data: data,
            success: function (response) {
                alert(response);
                carregarFuncionarios();
            }
        });
    });

    carregarFuncionarios();
});