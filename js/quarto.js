const tbody = document.querySelector(".listarQuarto");
const pesquisar = document.getElementById("pesquisarQuartos");
//Formulário de Login
const logForm = document.getElementById("logQuartoForm");
const msgErroLog = document.getElementById("msgAlertErro");

//Formulário de Cadastro
const cadForm = document.getElementById("cadQuartoForm");
const msgErroCad = document.getElementById("msgAlertErroCad");
const msgAlert = document.getElementById("msgAlert");

//Formulário de edição
const edtForm = document.getElementById("edtQuartoForm");
const msgAlertErroEdt = document.getElementById("msgAlertErroEdt");
const msgAlertEdt = document.getElementById("msgAlert");

//apagar
const msgAlertErroDel = document.getElementById("msgAlertErroDel");
const msgAlertDel = document.getElementById("msgAlert");

const listarQuarto = async (pagina) => {
    const dados = await fetch("../methods/quartoList.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
};

listarQuarto(1);

if (pesquisar) {
    pesquisar.addEventListener("submit", async (e) => {
        e.preventDefault();

        let pagina = 1;

        pesquisarQuarto(pagina);
    });
}

async function pesquisarQuarto(pagina) {
    const dadosForm = new FormData(pesquisar);

    const dados = await fetch("../methods/quartoPes.php?pagina=" + pagina, {
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
        listarQuarto(1);
    } else {
        tbody.innerHTML = resposta["dados"];
    }
}

//Formulário de Cadastro
cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    //Envia os dados para o PHP
    const dadosForm = new FormData(cadForm);

    const dados = await fetch("../methods/quartoCad.php", {
        method: "POST",
        body: dadosForm,
    });

    //Recebe os dados do PHP
    const resposta = await dados.json();

    //console.log(resposta);

    const cadModal = document.getElementById("cadQuartoModal");

    //Realiza a limpeza do form
    if (resposta["erro"]) {
        msgErroCad.innerHTML = resposta["msg"];
    } else {
        msgAlert.innerHTML = resposta["msg"];
        cadForm.reset();
        const modal = bootstrap.Modal.getInstance(cadModal);
        modal.hide();

        listarQuarto(1);
    }
});

async function visQuarto(cod) {
    // console.log(cod);

    const dados = await fetch("../methods/quartoVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlert.innerHTML = resposta["msg"];
    } else {
        const visModal = new bootstrap.Modal(
            document.getElementById("visQuartoModal")
        );
        visModal.show();

        document.getElementById("codQuarto").innerHTML = resposta["dados"].cod;
        document.getElementById("nomeQuarto").innerHTML =
            resposta["dados"].nome;
        document.getElementById("precoQuarto").innerHTML =
            resposta["dados"].preco;
        document.getElementById("descricaoQuarto").innerHTML =
            resposta["dados"].descricao;
        document.getElementById("fotoQuarto").innerHTML = resposta["img"];
    }
}

async function edtQuartoDados(cod) {
    const dados = await fetch("../methods/quartoVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        const edtModal = new bootstrap.Modal(
            document.getElementById("edtQuartoModal")
        );
        edtModal.show();

        document.getElementById("edtcod").value = resposta["dados"].cod;
        document.getElementById("edtnome").value = resposta["dados"].nome;
        document.getElementById("edtpreco").value = resposta["dados"].preco;
        document.getElementById("edtdescricao").value =
            resposta["dados"].descricao;
        document.getElementById("displayFotoE").innerHTML = resposta["img"];
    }
}

edtForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(edtForm);
    console.log(dadosForm);

    for (let dados of dadosForm.entries()) {
        console.log(dados[0] + "," + dados[1]);
    }

    const dados = await fetch("../methods/quartoEdt.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    console.log(resposta);
    const edtModal = document.getElementById("edtQuartoModal");

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        msgAlert.innerHTML = resposta["msg"];
        const modal = bootstrap.Modal.getInstance(edtModal);
        modal.hide();

        listarQuarto(1);
    }
});

async function excQuarto(cod) {
    const dados = await fetch("../methods/quartoVis.php?cod=" + cod);
    const resposta = await dados.json();

    const excModal = new bootstrap.Modal(
        document.getElementById("excQuartoModalC")
    );
    excModal.show();

    document.getElementById("delcod").value = resposta["dados"].cod;
}

async function excQuartoC() {
    const cod = document.getElementById("delcod").value;

    const dados = await fetch("../methods/quartoDel.php?cod=" + cod);
    const resposta = await dados.json();

    if (resposta["erro"]) {
        msgAlertErroDel.innerHTML = resposta["msg"];
    } else {
        msgAlert.innerHTML = resposta["msg"];

        const excModal = document.getElementById("excQuartoModalC");
        const modal = bootstrap.Modal.getInstance(excModal);
        modal.hide();

        listarQuarto(1);
    }
}
