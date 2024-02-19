const tbody = document.querySelector(".listarFuncionario");
const pesquisar = document.getElementById("pesquisarFuncionarios");
//Formulário de Login
const logForm = document.getElementById("logFuncionarioForm");
const msgErroLog = document.getElementById("msgAlertErro");

//Formulário de Cadastro
const cadForm = document.getElementById("cadFuncionarioForm");
const msgErroCad = document.getElementById("msgAlertErroCad");
const msgAlert = document.getElementById("msgAlert");

//Formulário de edição
const edtForm = document.getElementById("edtFuncionarioForm");
const msgAlertErroEdt = document.getElementById("msgAlertErroEdt");
const msgAlertEdt = document.getElementById("msgAlert");

//apagar
const msgAlertErroDel = document.getElementById("msgAlertErroDel");
const msgAlertDel = document.getElementById("msgAlert");

const listarFuncionario = async (pagina) => {
    const dados = await fetch(
        "../methods/funcionarioList.php?pagina=" + pagina
    );
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
};

listarFuncionario(1);

if (pesquisar) {
    pesquisar.addEventListener("submit", async (e) => {
        e.preventDefault();

        let pagina = 1;

        pesquisarFuncionario(pagina);
    });
}

async function pesquisarFuncionario(pagina) {
    const dadosForm = new FormData(pesquisar);

    const dados = await fetch(
        "../methods/funcionarioPes.php?pagina=" + pagina,
        {
            method: "POST",
            body: dadosForm,
        }
    );
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        document.getElementById("msg").innerHTML = resposta["msg"];
        setTimeout(() => {
            document.getElementById("msg").innerHTML = "";
        }, 1000);
        listarFuncionario(1);
    } else {
        tbody.innerHTML = resposta["dados"];
    }
}

//Formulário de Cadastro
cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    //Envia os dados para o PHP
    const dadosForm = new FormData(cadForm);

    const dados = await fetch("../methods/funcionarioCad.php", {
        method: "POST",
        body: dadosForm,
    });

    //Recebe os dados do PHP
    const resposta = await dados.json();

    //console.log(resposta);

    //Realiza a limpeza do form
    if (resposta["erro"]) {
        msgErroCad.innerHTML = resposta["msg"];
    } else {
        msgAlert.innerHTML = resposta["msg"];
        cadForm.reset();
        const cadModal = document.getElementById("cadFuncionarioModal");
        const modal = bootstrap.Modal.getInstance(cadModal);
        modal.hide();

        listarFuncionario(1);
    }
});

async function visFuncionario(cod) {
    // console.log(cod);

    const dados = await fetch("../methods/funcionarioVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlert.innerHTML = resposta["msg"];
    } else {
        const visModal = new bootstrap.Modal(
            document.getElementById("visFuncionarioModal")
        );
        visModal.show();

        document.getElementById("codFuncionario").innerHTML =
            resposta["dados"].cod;
        document.getElementById("nomeFuncionario").innerHTML =
            resposta["dados"].nome;
        document.getElementById("emailFuncionario").innerHTML =
            resposta["dados"].email;
        document.getElementById("senhaFuncionario").innerHTML =
            resposta["dados"].senha;
        document.getElementById("enderecoFuncionario").innerHTML =
            resposta["dados"].endereco;
        document.getElementById("telefoneFuncionario").innerHTML =
            resposta["dados"].telefone;
        document.getElementById("fotoFuncionario").src =
            "../methods/imgFuncionarios/" + resposta["dados"].foto;
    }
}

async function edtFuncionarioDados(cod) {
    const dados = await fetch("../methods/funcionarioVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        const edtModal = new bootstrap.Modal(
            document.getElementById("edtFuncionarioModal")
        );
        edtModal.show();

        document.getElementById("edtcod").value = resposta["dados"].cod;
        document.getElementById("edtnome").value = resposta["dados"].nome;
        document.getElementById("edtemail").value = resposta["dados"].email;
        document.getElementById("edtsenha").value = resposta["dados"].senha;
        document.getElementById("edtendereco").value =
            resposta["dados"].endereco;
        document.getElementById("edttelefone").value =
            resposta["dados"].telefone;
        document.getElementById("displayFotoE").src =
            "../methods/imgFuncionarios/" + resposta["dados"].foto;
    }
}

edtForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(edtForm);
    console.log(dadosForm);

    // for (let dados of dadosForm.entries()) {
    //     console.log(dados[0] + "," + dados[1]);
    // }

    const dados = await fetch("../methods/funcionarioEdt.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    console.log(resposta);
    const edtModal = new bootstrap.Modal(
        document.getElementById("edtFuncionarioModal")
    );

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        msgAlertEdt.innerHTML = resposta["msg"];
        edtForm.reset();
        const edtModal = document.getElementById("edtFuncionarioModal");
        const modal = bootstrap.Modal.getInstance(edtModal);
        modal.hide();

        listarFuncionario(1);
    }
});

async function excFuncionario(cod) {
    const dados = await fetch("../methods/funcionarioVis.php?cod=" + cod);
    const resposta = await dados.json();

    const excModal = new bootstrap.Modal(
        document.getElementById("excFuncionarioModalC")
    );
    excModal.show();

    document.getElementById("delcod").value = resposta["dados"].cod;
}

async function excFuncionarioC() {
    const cod = document.getElementById("delcod").value;

    const dados = await fetch("../methods/funcionarioDel.php?cod=" + cod);
    const resposta = await dados.json();

    if (resposta["erro"]) {
        msgAlertErroDel.innerHTML = resposta["msg"];
    } else {
        msgAlertDel.innerHTML = resposta["msg"];

        const excModal = document.getElementById("excFuncionarioModalC");
        const modal = bootstrap.Modal.getInstance(excModal);
        modal.hide();

        listarFuncionario(1);
    }
}
