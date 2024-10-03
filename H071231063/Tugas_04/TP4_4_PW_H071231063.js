const readline = require('readline');

// Membuat interface untuk input/output
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

// Fungsi untuk meminta input dari pemain
function promptUser(promptMessage) {
    return new Promise((resolve) => {
        rl.question(promptMessage, (input) => { 
            resolve(input);
        });
    });
}

async function tebakAngka() {
    // Komputer memilih angka acak antara 1 dan 100
    const angkaTersembunyi = Math.floor(Math.random() * 100) + 1;
    let tebakan = null;
    let jumlahTebakan = 0;

    console.log("Selamat datang di permainan Tebak Angka!");

    // Mulai permainan
    while (tebakan !== angkaTersembunyi) {
        let input = await promptUser("Tebak angka antara 1 dan 100: ");
        tebakan = parseInt(input, 10);  // Mengubah input menjadi integer
        jumlahTebakan++;

        // Jika tebakan bukan angka, beri pesan kesalahan dan ulangi
        if (isNaN(tebakan)) {
            console.log("Mohon masukkan angka yang valid.");
            continue;
        }

        // Berikan petunjuk kepada pemain
        if (tebakan < angkaTersembunyi) {
            console.log("Tebakanmu terlalu rendah!");
        } else if (tebakan > angkaTersembunyi) {
            console.log("Tebakanmu terlalu tinggi!");
        } else {
            console.log(`Selamat! Kamu menebak angka yang benar yaitu ${angkaTersembunyi} dalam ${jumlahTebakan} tebakan.`);
        }
    }

    // Menutup readline
    rl.close();
}
// Memulai permainan
tebakAngka();