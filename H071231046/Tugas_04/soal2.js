const readline = require('readline');

// Fungsi untuk menghitung diskon berdasarkan jenis barang
function hitungDiskon(harga, jenisBarang) {
    let diskon = 0;

    // Tentukan diskon berdasarkan jenis barang
    if (jenisBarang.toLowerCase() === 'elektronik') {
        diskon = 10;
    } else if (jenisBarang.toLowerCase() === 'pakaian') {
        diskon = 20;
    } else if (jenisBarang.toLowerCase() === 'makanan') {
        diskon = 5;
    } 

    // Hitung harga setelah diskon
    let jumlahDiskon = (diskon / 100) * harga;
    let hargaAkhir = harga - jumlahDiskon;

    return { hargaAkhir, diskon };
}

// Fungsi untuk mendapatkan input dari user
function getInput(message) {
    return new Promise((resolve) => {
        const rl = readline.createInterface({
            input: process.stdin,
            output: process.stdout
        });

        rl.question(message, (input) => {
            rl.close();
            resolve(input);
        });
    });
}

// Fungsi utama untuk menjalankan program
async function main() {
    let harga = parseFloat(await getInput("Masukkan harga barang: "));
    let jenisBarang = await getInput("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ");

    if (isNaN(harga) || harga <= 0) {
        console.log("Masukkan harga yang valid!");
    } else {
        let hasil = hitungDiskon(harga, jenisBarang);
        console.log(`Harga awal: Rp${harga}`);
        console.log(`Diskon: ${hasil.diskon}%`);
        console.log(`Harga setelah diskon: Rp${hasil.hargaAkhir}`);
    }
}

// Menjalankan fungsi utama
main();
