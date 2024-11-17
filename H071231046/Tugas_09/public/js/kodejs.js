function formatRupiah(angka) {
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

document.addEventListener("DOMContentLoaded", function() {
    let hargaElements = document.querySelectorAll(".product-price");
    hargaElements.forEach(function(element) {
        let harga = parseInt(element.textContent); // Konversi ke integer
        if (!isNaN(harga)) {
            element.textContent = formatRupiah(harga); // Format dan tampilkan harga
        }
    });
});
