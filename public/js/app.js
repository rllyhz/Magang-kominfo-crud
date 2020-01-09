const tombolClose_card = document.querySelectorAll(".close .fas");
const tombolEdit_card = document.querySelectorAll("#tombolEdit_card");
const tombolHapusPegawai = document.querySelectorAll("#tombolHapusPegawai");
const card = document.querySelector(".card");
const cardHapus = document.querySelector("#cardHapus");
const tombolBatal_card = document.querySelector("#tombolBatal_card");
const tombolBatal_cardHapus = document.querySelector("#tombolBatal_cardHapus");
const tombolTambah_card = document.querySelector("#tombolTambah_card");
const tombolSimpan_card = document.querySelector("#tombolSimpan_card");
const form = document.querySelector("#form");
const tombolAlert = document.querySelector("[data-tombol-alert]");

tombolClose_card.forEach(function(el) {
    el.addEventListener("click", event => {
        if (event.target.getAttribute("id") === "tombol-close-card") {
            card.style.pointerEvents = "none";
            card.style.opacity = "0";
        } else {
            cardHapus.style.pointerEvents = "none";
            cardHapus.style.opacity = "0";
        }
    });
});

tombolBatal_card.addEventListener("click", function(event) {
    event.preventDefault();
    card.style.pointerEvents = "none";
    card.style.opacity = "0";
});

tombolBatal_cardHapus.addEventListener("click", () => {
    cardHapus.style.pointerEvents = "none";
    cardHapus.style.opacity = "0";
});

tombolEdit_card.forEach(element => {
    element.addEventListener("click", event => {
        event.preventDefault();
        const nip = element.dataset.index;
        card.querySelector("[data-judul-card]").innerHTML = "Form Edit Pegawai";
        form.action = `/pegawai/edit/${nip}`;
        form.method = "POST";
        const inputMethod = form.querySelector("[data-method]");
        inputMethod.setAttribute("name", "_method");
        inputMethod.setAttribute("value", "put");
        const inputNama = card.querySelector("[data-nama-lengkap]");
        const inputNip = card.querySelector("[data-nip]");
        const inputEmail = card.querySelector("[data-email]");
        const inputAlamat = card.querySelector("[data-alamat]");

        const ajax = new XMLHttpRequest();
        const url = `pegawai/detail/${nip}`;
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const pegawai = JSON.parse(ajax.responseText);
                // console.log(pegawai);
                inputNama.value = pegawai.nama_lengkap;
                inputEmail.value = pegawai.email;
                inputAlamat.value = pegawai.alamat;
                inputNip.value = nip;

                window.scrollTo(0, 0);
                card.style.pointerEvents = "auto";
                card.style.opacity = "1";
            }
        };
        ajax.open("GET", url);
        ajax.send();
    });
});

tombolHapusPegawai.forEach(element => {
    element.addEventListener("click", event => {
        event.preventDefault();
        const nip = event.target.dataset.index;
        const formHapus = document.querySelector("[data-form-hapus]");
        formHapus.action = `/pegawai/hapus/${nip}`;

        window.scrollTo(0, 0);
        cardHapus.style.pointerEvents = "auto";
        cardHapus.style.opacity = "1";
    });
});

tombolTambah_card.addEventListener("click", function(event) {
    event.preventDefault();
    card.querySelector("[data-judul-card]").innerHTML = "Form Tambah Pegawai";
    form.action = `/pegawai/tambah`;
    form.method = "POST";
    const inputMethod = form.querySelector("[data-method]");
    inputMethod.setAttribute("name", "_method");
    inputMethod.setAttribute("value", "post");
    const inputNama = card.querySelector("[data-nama-lengkap]");
    const inputNip = card.querySelector("[data-nip]");
    const inputEmail = card.querySelector("[data-email]");
    const inputAlamat = card.querySelector("[data-alamat]");
    inputNama.value = "";
    inputNip.value = "";
    inputEmail.value = "";
    inputAlamat.value = "";

    window.scrollTo(0, 0);
    card.style.pointerEvents = "auto";
    card.style.opacity = "1";
});

function hapusAlert(el) {
    el.parentElement.classList.toggle("fadOut");
    setTimeout(() => {
        el.parentElement.remove();
    }, 500);
}
