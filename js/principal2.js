function deletarCliente(cod){

    if(confirm('Você tem certeza que deseja deletar este cliente?')){
        $.post("../include/deletarRegistros.php", 
        {
            idClienteDeletar:cod
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }
}

function deletarAnimal(cod){

    if(confirm('Você tem certeza que deseja deletar este animal?')){
        $.post("../include/deletarRegistros.php", 
        {
            idAnimalDeletar:cod
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }
}

function deletarConsulta(cod){

    if(confirm('Você tem certeza que deseja deletar esta consulta?')){
        $.post("../include/deletarRegistros.php", 
        {
            idConsultaDeletar:cod
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }
}