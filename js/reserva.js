const tbody = document.querySelector(".listarReserva");
const pesquisar = document.getElementById("pesquisarReservas");
//Formulário de Cadastro
const cadForm = document.getElementById("cadReservaForm");
const msgErroCad = document.getElementById("msgErroCheck");

//Formulário de edição
const edtForm = document.getElementById("edtReservaForm");
const msgAlertErroEdt = document.getElementById("msgAlertErroEdt");
const msgAlertEdt = document.getElementById("msgAlertEdt");

//apagar
const msgAlertErroDel = document.getElementById("msgAlertErroDel");
const msgAlertDel = document.getElementById("msgAlertDel");

const listarReserva = async (pagina) => {
    const dados = await fetch("../methods/reservaList.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
};

listarReserva(1);

if (pesquisar) {
    pesquisar.addEventListener("submit", async (e) => {
        e.preventDefault();

        let pagina = 1;

        pesquisarReservas(pagina);
    });
}

async function pesquisarReservas(pagina) {
    const dadosForm = new FormData(pesquisar);

    const dados = await fetch("../methods/reservaPes.php?pagina=" + pagina, {
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
        listarReserva(1);
    } else {
        tbody.innerHTML = resposta["dados"];
    }
}

cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    //Envia os dados para o PHP
    const dadosForm = new FormData(cadForm);

    const dados = await fetch("../methods/reservaCadCrud.php", {
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
        msgErroCad.innerHTML = resposta["msg"];
        cadForm.reset();

        const cadModal = document.getElementById("cadReservaModal");
        const modal = bootstrap.Modal.getInstance(cadModal);
        modal.hide();

        listarReserva(1);
    }
});

async function visReserva(cod) {
    // console.log(cod);

    const dados = await fetch("../methods/reservaVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlert.innerHTML = resposta["msg"];
    } else {
        const visModal = new bootstrap.Modal(
            document.getElementById("visReservaModal")
        );
        visModal.show();

        console.log(resposta);

        document.getElementById("codReserva").innerHTML = resposta["dados"].cod;
        document.getElementById("codCliente").innerHTML =
            resposta["dados"].cliente_cod;
        document.getElementById("codFuncionario").innerHTML =
            resposta["dados"].funcionario_cod;
        document.getElementById("codQuarto").innerHTML =
            resposta["dados"].quarto_cod;
        document.getElementById("dataEntrada").innerHTML =
            resposta["dados"].dataEntrada;
        document.getElementById("dataSaida").innerHTML =
            resposta["dados"].dataSaida;
        document.getElementById("adulto").innerHTML = resposta["dados"].adulto;
        document.getElementById("crianca").innerHTML =
            resposta["dados"].crianca;
    }
}

async function edtReservaDados(cod) {
    const dados = await fetch("../methods/reservaVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        const edtModal = new bootstrap.Modal(
            document.getElementById("edtReservaModal")
        );
        edtModal.show();

        document.getElementById("edtcodReserva").value = resposta["dados"].cod;
        document.getElementById("edtcodCliente").value =
            resposta["dados"].cliente_cod;
        document.getElementById("edtcodFuncionario").value =
            resposta["dados"].funcionario_cod;
        document.getElementById("edtcodQuarto").innerHTML =
            resposta["dados"].quarto_cod;
        document.getElementById("edtdataEntrada").value =
            resposta["dados"].dataEntrada;
        document.getElementById("edtdataSaida").value =
            resposta["dados"].dataSaida;
        document.getElementById("edtcodQuarto").value =
            resposta["dados"].quarto_cod;
        document.getElementById("edtadulto").value = resposta["dados"].adulto;
        document.getElementById("edtcrianca").value = resposta["dados"].crianca;
    }
}

edtForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(edtForm);
    console.log(dadosForm);

    // for (let dados of dadosForm.entries()) {
    //     console.log(dados[0] + "," + dados[1]);
    // }

    const dados = await fetch("../methods/reservaEdt.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        msgAlertEdt.innerHTML = resposta["msg"];
        edtForm.reset();

        const edtModal = document.getElementById("edtReservaModal");
        const modal = bootstrap.Modal.getInstance(edtModal);
        modal.hide();

        listarReserva(1);
    }
});

async function excReserva(cod) {
    const dados = await fetch("../methods/reservaVis.php?cod=" + cod);
    const resposta = await dados.json();

    const excModal = new bootstrap.Modal(
        document.getElementById("excReservaModalC")
    );
    excModal.show();

    document.getElementById("delcod").value = resposta["dados"].cod;
}

async function excReservaC() {
    const cod = document.getElementById("delcod").value;

    const dados = await fetch("../methods/reservaDel.php?cod=" + cod);
    const resposta = await dados.json();

    if (resposta["erro"]) {
        msgAlertErroDel.innerHTML = resposta["msg"];
    } else {
        msgAlertDel.innerHTML = resposta["msg"];
        const excModal = document.getElementById("excReservaModalC");
        const modal = bootstrap.Modal.getInstance(excModal);
        modal.hide();

        listarReserva(1);
    }
}
