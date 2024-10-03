const readline = require('readline');
// Membuat interface untuk input/output
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});
function hariYangAkanDatang(hariIni, jumlahHari) {
    const hari = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
    const hariBersih = hariIni.toLowerCase().replace(/[^a-z]/g, '');

    const indexHariIni = hari.indexOf(hariBersih);

    if (indexHariIni === -1) {
      return null; 
    }
    const indexHariMasaDepan = (indexHariIni + jumlahHari) % 7;
    return hari[indexHariMasaDepan];
}
function promptUser(promptMessage) {
    return new Promise((resolve) => {
        rl.question(promptMessage, (input) => { 
        resolve(input);
        });
    });
}
async function main() {
    try{
        let hariIni;
        let jumlahHari;

        // Validasi input hari
        while (true) {
            hariIni = await promptUser("Masukkan nama hari: ");
            if (hariYangAkanDatang(hariIni, 0) !== null) {
                break;  // Keluar dari loop jika input hari valid
            }
            console.log("Nama hari tidak valid. Coba lagi.");
        }

        // Validasi input jumlah hari
        while (true) {
            jumlahHari = parseInt(await promptUser("Masukkan jumlah hari yang akan datang: "));
            if (!isNaN(jumlahHari) && jumlahHari >= 0) {
                break;  // Keluar dari loop jika input jumlah hari valid
            }
            console.log("Input jumlah hari tidak valid. Coba lagi.");
        }

        // Menampilkan hasil
        const hasil = hariYangAkanDatang(hariIni, jumlahHari);
        console.log(`Hari ini adalah ${hariIni}, dan ${jumlahHari} hari kemudian adalah ${hasil}.`);

    } catch (error) {
        console.error("Terjadi kesalahan:", error);
    } finally {
        rl.close();  // Menutup interface readline
    }
}main()