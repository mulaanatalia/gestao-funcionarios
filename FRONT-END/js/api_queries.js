const btnRegistarFuncionario = document.getElementById("registar_funcionario");
const btnActualizarFuncionario = document.getElementById("actualizar_funcionario");

btnRegistarFuncionario?.addEventListener("click", (e) =>
  submitForm(e, "form_funcionario", "funcionario/create.php")
);

btnActualizarFuncionario?.addEventListener("click", (e) => 
  submitForm(e, "form_update_funcionario", "funcionario/update.php")
);

function validarFormulario(formularioID) {
  let errors_validation = 0;
  console.log(formularioID);
  $(`#${formularioID}`)
    .find("input, select, textarea")
    .each(async function () {
      if (!$(this).prop("required")) {
      } else {
        if ($(this).val() === null || $(this).val().length === 0 || !$(this).val().trim()) {
          // alert($(this).attr("id"))
          $(this)
            .removeClass("is-valid")
            .addClass("is-invalid")
            .addClass("has-error");
          errors_validation++;
        } else {
          $(this)
            .removeClass("is-invalid")
            .removeClass("has-error")
            .addClass("is-valid")
            .addClass("has-success");
        }
      }
    });
  return errors_validation;
}


async function submitForm(e, formularioID, endPoint) {
  showLoader();
  let errors_validation = 0;
  e.preventDefault();
  errors_validation = validarFormulario(formularioID);
  if (errors_validation == 0) {
    const data = await gravarDados(formularioID, endPoint);
    console.log(data)
    //Redirect on sucess save
    if (!data || data.error || data.code == 409 || data.status == 'Conflict') {
      Swal.fire({
        icon: "error",
        title: `${data.status}`,
        text: `${data.message}`,
        showConfirmButton: true,
      });
    } else {
      if (formularioID == "form_funcionario") {
        Swal.fire({
          icon: "success",
          title: `Funcionario cadastrado com sucesso!`,
          showConfirmButton: false,
          timer: 1500,
        }).then((result) => {
          if (result.dismiss) {
            location.assign('listagem_funcionarios.php')
          }
        });
      } else if (formularioID == "form_update_funcionario") {
        Swal.fire({
          icon: "success",
          title: `Funcionario Actualizado com sucesso!`,
          showConfirmButton: true,
          timer: 1500,
        }).then((result) => {
          if (result.dismiss) {
            location.assign('listagem_funcionarios.php')
          }
        });
      
      } else {
        Swal.fire({
          icon: "success",
          title: `${data.message}`,
          showConfirmButton: false,
          timer: 1500,
        })
      }
    }
  } else {
    // console.log(errors_validation);
    Swal.fire({
      icon: "error",
      title: "Por favor preencha os campos obrigatórios!",
      showConfirmButton: true,
    });
  }
  hideLoader();
}
async function gravarDados(formularioID, endPoint) {

  const formulario = document.querySelector(`#${formularioID}`);
  const formularioPreparado = new FormData(formulario);
  let response = await fetch(`./app/ajax/${endPoint}`, {
    method: "POST",
    body: formularioPreparado,
  })
    .then((data) => {
      return data.json()
    })
    .catch((err) => {
      console.log(err)
      return {
        message: "Ocorreu um erro na execução da operação",
        error: true,
      };
    });
  return response;
}