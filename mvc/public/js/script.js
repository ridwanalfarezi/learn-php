const tombolUbah = document.querySelectorAll(".edit");
const judulModal = document.querySelector(".modal-title");
const tombolKirim = document.querySelector(".modal-footer button[type=submit]");
const form = document.querySelector(".modal-body form");

tombolUbah.forEach(function (button) {
  button.addEventListener("click", function () {
    judulModal.textContent = "Ubah Data Mahasiswa";
    tombolKirim.textContent = "Ubah Data";

    const id = this.getAttribute("data-id");

    fetch("http://localhost/mvc/public/mahasiswa/getubah", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: id }),
    })
      .then((response) => response.json())
      .then((data) => {
        document.getElementById("id").value = data.id;
        document.getElementById("nama").value = data.nama;
        document.getElementById("nim").value = data.nim;
        document.getElementById("email").value = data.email;
        form.setAttribute(
          "action",
          "http://localhost/mvc/public/mahasiswa/ubah"
        );
      })
      .catch((error) => console.error("Error:", error));
  });
});
