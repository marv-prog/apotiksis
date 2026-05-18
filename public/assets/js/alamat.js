/* public/assets/js/alamat.js */

document.addEventListener("DOMContentLoaded", function () {
  const metodeSelect = document.getElementById("metodePengiriman");
  const blokAlamat = document.getElementById("blokAlamatRumah");
  const blokToko = document.getElementById("blokAmbilToko");
  const formTitle = document.getElementById("formTitle");
  const labelNama = document.getElementById("labelNama");

  // Pastikan elemen-elemen di atas ada di halaman sebelum menjalankan fungsi
  if (metodeSelect && blokAlamat && blokToko) {
    metodeSelect.addEventListener("change", function () {
      if (this.value === "ambil") {
        // Sembunyikan input alamat rumah, munculkan info toko
        blokAlamat.style.display = "none";
        blokToko.style.display = "block";
        formTitle.innerHTML = "Data Pengambil Obat";
        labelNama.innerHTML = "Nama Pengambil / Pasien";

        // Matikan fungsi required pada input alamat yang disembunyikan agar tidak error saat submit
        blokAlamat
          .querySelectorAll("input, textarea")
          .forEach((el) => el.removeAttribute("required"));
      } else {
        // Tampilkan kembali input alamat rumah
        blokAlamat.style.display = "block";
        blokToko.style.display = "none";
        formTitle.innerHTML = "Data Lengkap Penerima";
        labelNama.innerHTML = "Nama Penerima";

        // Aktifkan kembali fungsi required
        blokAlamat
          .querySelectorAll("input, textarea")
          .forEach((el) => el.setAttribute("required", true));
      }
    });
  }
});
