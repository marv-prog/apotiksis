/* public/assets/js/pencarian_katalog.js */

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector(
    'input[placeholder*="Cari produk di sini"]',
  );

  if (searchInput) {
    // Fungsi animasi scroll menuju katalog obat
    function scrollToKatalog() {
      const targetKatalog = document.getElementById("katalog-obat-container");
      if (targetKatalog) {
        targetKatalog.scrollIntoView({
          behavior: "smooth",
          block: "center",
        });
      }
    }

    // Mencegah submit form bawaan saat enter di form
    const parentForm = searchInput.closest("form");
    if (parentForm) {
      parentForm.addEventListener("submit", function (e) {
        e.preventDefault();
        scrollToKatalog();
      });
    }

    // Mencegah refresh halaman saat enter tepat di input
    searchInput.addEventListener("keydown", function (e) {
      if (e.key === "Enter") {
        e.preventDefault();
        scrollToKatalog();
      }
    });

    // Filter katalog obat real-time saat mengetik
    searchInput.addEventListener("input", function () {
      const keyword = this.value.toLowerCase().trim();
      const listKartu = document.querySelectorAll(".item-kartu-obat");
      const emptyMessage = document.getElementById("search-empty-message");
      let adaObatYangCocok = false;

      listKartu.forEach(function (kolomKartu) {
        const namaObatElement = kolomKartu.querySelector(".nama-produk-target");

        if (namaObatElement) {
          const namaObat = namaObatElement.textContent.toLowerCase();

          if (namaObat.includes(keyword)) {
            kolomKartu.style.setProperty("display", "", "important");
            adaObatYangCocok = true;
          } else {
            kolomKartu.style.setProperty("display", "none", "important");
          }
        }
      });

      if (emptyMessage) {
        if (!adaObatYangCocok && keyword !== "") {
          emptyMessage.classList.remove("d-none");
        } else {
          emptyMessage.classList.add("d-none");
        }
      }
    });
  }
});
