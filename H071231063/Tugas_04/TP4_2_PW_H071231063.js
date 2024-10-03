const readline = require('readline');
// Membuat interface untuk input/output
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});
function hitungHargaAkhir(harga, jenisBarang) {
    let diskon = 0;
    // Menentukan diskon berdasarkan jenis barang
    while (true) {  // Loop terus sampai input jenis barang valid
      if (jenisBarang.toLowerCase() === "elektronik") {
        diskon = 10; // 10% untuk Elektronik
        break; // Keluar dari loop jika input valid
      } else if (jenisBarang.toLowerCase() === "pakaian") {
        diskon = 20; // 20% untuk Pakaian
        break; // Keluar dari loop jika input valid
      } else if (jenisBarang.toLowerCase() === "makanan") {
        diskon = 5;  // 5% untuk Makanan
        break; // Keluar dari loop jika input valid
      } else {
        // Jika jenis barang tidak sesuai, minta input ulang
        console.log("Jenis barang tidak valid. Pilihan yang tersedia: Elektronik, Pakaian, Makanan.");
        jenisBarang = promptUser("Masukkan jenis barang (Elektronik/Pakaian/Makanan):"); 
      }
    }
      // Menghitung harga setelah diskon
      let potongan = (diskon / 100) * harga;
      let hargaAkhir = harga - potongan;
      console.log(`Diskon: ${diskon}%`);
      return hargaAkhir;
}
function promptUser(promptMessage) {
    return new Promise((resolve) => {
        rl.question(promptMessage, (input) => { 
        resolve(input);
        });
    });
}
async function main() {
    try {
        let harga = parseFloat(await promptUser("Masukkan harga barang: "));
        let jenisBarang = await promptUser("Masukkan jenis barang (Elektronik/Pakaian/Makanan): ");
        
        let hargaAkhir = hitungHargaAkhir(harga, jenisBarang);
        
        console.log(`Harga akhir setelah diskon: Rp${hargaAkhir}`);
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
    } finally {
        rl.close(); // Menutup interface readline
    }
}
main();