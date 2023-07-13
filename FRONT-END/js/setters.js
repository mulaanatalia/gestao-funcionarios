function setUsersInFields(dados){
    const dadosMotorista = document.querySelectorAll("fieldset .dados_motorista");
    if(!dadosMotorista){
        console.log("Nao encontrado nenhum campo de dados")
        return;
    }
    for (let dadosMotoristaElement of dadosMotorista) {
        //Atribuir para o campo de formulario os valores correspondentes que vem dos dados
        dadosMotoristaElement.value = dados[dadosMotoristaElement.id];
        console.log(dadosMotoristaElement.id)
    }return;
}