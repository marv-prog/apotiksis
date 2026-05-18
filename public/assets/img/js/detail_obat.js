document.addEventListener("DOMContentLoaded", function () {
  console.log("JavaScript detail-obat.js berhasil dimuat!");

  const btnMinus = document.getElementById("btn-minus");
  const btnPlus = document.getElementById("btn-plus");
  const inputQty = document.getElementById("input-qty");
  const totalHargaDisplay = document.getElementById("total-harga-display");

  if (!btnMinus || !btnPlus || !inputQty || !totalHargaDisplay) {
    console.error("Eror: Ada elemen HTML yang tidak ditemukan!");
    return;
  }

  const hargaSatuan =
    parseInt(totalHargaDisplay.getAttribute("data-harga-asli")) || 0;
  const maxStok = parseInt(btnPlus.getAttribute("data-max")) || 0;

  console.log("Harga Satuan:", hargaSatuan, "| Maksimal Stok:", maxStok);

  function formatRupiah(angka) {
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function updateTotalHarga(qty) {
    const total = hargaSatuan * qty;
    totalHargaDisplay.textContent = formatRupiah(total);
  }

  btnPlus.addEventListener("click", function () {
    console.log("Tombol + diklik");
    let currentVal = parseInt(inputQty.value) || 1;
    if (currentVal < maxStok) {
      currentVal += 1;
      inputQty.value = currentVal;
      updateTotalHarga(currentVal);
    } else {
      alert(
        "Maaf, pembelian tidak boleh melebihi stok yang tersedia (" +
          maxStok +
          " barang).",
      );
    }
  });

  btnMinus.addEventListener("click", function () {
    console.log("Tombol - diklik");
    let currentVal = parseInt(inputQty.value) || 1;
    if (currentVal > 1) {
      currentVal -= 1;
      inputQty.value = currentVal;
      updateTotalHarga(currentVal);
    }
  });
});
