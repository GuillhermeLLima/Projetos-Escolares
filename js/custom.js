const tbody = document.querySelector(".listarCliente");
const pesquisar = document.getElementById("pesquisarClientes");

//Formulário de Login
const logForm = document.getElementById("logClienteForm");

//Formulário de Cadastro
const cadForm = document.getElementById("cadClienteForm");
const msgAlertErroCad = document.getElementById("msgAlertErroCad");

//Formulário de edição
const edtForm = document.getElementById("edtClienteForm");

//apagar
const msgAlertErro = document.getElementById("msgAlertErro");
const msgAlert = document.getElementById("msgAlert");

const listarCliente = async (pagina) => {
    const dados = await fetch("../methods/clienteList.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
};

listarCliente(1);

if (pesquisar) {
    pesquisar.addEventListener("submit", async (e) => {
        e.preventDefault();

        let pagina = 1;

        pesquisarClientes(pagina);
    });
}

async function pesquisarClientes(pagina) {
    const dadosForm = new FormData(pesquisar);

    const dados = await fetch("../methods/clientePes.php?pagina=" + pagina, {
        method: "POST",
        body: dadosForm,
    });
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        document.getElementById("msg").innerHTML = resposta["msg"];
        setTimeout(() => {
            document.getElementById("msg").innerHTML = "";
        }, 1000);
        listarCliente(1);
    } else {
        tbody.innerHTML = resposta["dados"];
    }
}

//Formulário de Cadastro
cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    //Envia os dados para o PHP
    const dadosForm = new FormData(cadForm);

    const dados = await fetch("../methods/clienteCad.php", {
        method: "POST",
        body: dadosForm,
    });

    //Recebe os dados do PHP
    const resposta = await dados.json();

    //console.log(resposta);

    //Realiza a limpeza do form
    if (resposta["erro"]) {
        msgAlertErroCad.innerHTML = resposta["msg"];

        setTimeout(() => {
            msgAlertErroCad.innerHTML = "";
        }, 1000);
    } else {
        const cadModal = document.getElementById("cadClienteModal");
        const modal = bootstrap.Modal.getInstance(cadModal);
        modal.hide();

        cadForm.reset();

        msgAlert.innerHTML = resposta["msg"];
        setTimeout(() => {
            msgAlert.innerHTML = "";
        }, 1000);

        listarCliente(1);
    }
});

async function visCliente(cod) {
    // console.log(cod);

    const dados = await fetch("../methods/clienteVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErro.innerHTML = resposta["msg"];
    } else {
        const visModal = new bootstrap.Modal(
            document.getElementById("visClienteModal")
        );
        visModal.show();

        document.getElementById("codCliente").innerHTML = resposta["dados"].cod;
        document.getElementById("nomeCliente").innerHTML =
            resposta["dados"].nome;
        document.getElementById("emailCliente").innerHTML =
            resposta["dados"].email;
        document.getElementById("senhaCliente").innerHTML =
            resposta["dados"].senha;
        document.getElementById("enderecoCliente").innerHTML =
            resposta["dados"].endereco;
        document.getElementById("telefoneCliente").innerHTML =
            resposta["dados"].telefone;
        document.getElementById("fotoCliente").src =
            "../methods/imgClientes/" + resposta["dados"].foto;
    }
}

async function edtClienteDados(cod) {
    const dados = await fetch("../methods/clienteVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        const edtModal = new bootstrap.Modal(
            document.getElementById("edtClienteModal")
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
            "../methods/imgClientes/" + resposta["dados"].foto;
    }
}

edtForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(edtForm);
    console.log(dadosForm);

    // for (let dados of dadosForm.entries()) {
    //     console.log(dados[0] + "," + dados[1]);
    // }

    const dados = await fetch("../methods/clienteEdt.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErro.innerHTML = resposta["msg"];
    } else {
        edtForm.reset();
        const edtModal = document.getElementById("edtClienteModal");
        const modal = bootstrap.Modal.getInstance(edtModal);
        modal.hide();

        msgAlert.innerHTML = resposta["msg"];
        setTimeout(() => {
            msgAlert.innerHTML = "";
        }, 1000);

        listarCliente(1);
    }
});

async function excCliente(cod) {
    const dados = await fetch("../methods/clienteVis.php?cod=" + cod);
    const resposta = await dados.json();

    const excModal = new bootstrap.Modal(
        document.getElementById("excClienteModalC")
    );
    excModal.show();

    document.getElementById("delcod").value = resposta["dados"].cod;
}

async function excClienteC() {
    const cod = document.getElementById("delcod").value;

    const dados = await fetch("../methods/clienteDel.php?cod=" + cod);
    const resposta = await dados.json();

    if (resposta["erro"]) {
        msgAlertErro.innerHTML = resposta["msg"];
    } else {
        msgAlert.innerHTML = resposta["msg"];
        const excModal = document.getElementById("excClienteModalC");
        const modal = bootstrap.Modal.getInstance(excModal);
        modal.hide();

        listarCliente(1);
    }
}
