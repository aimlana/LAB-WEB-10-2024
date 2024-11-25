const readline = require('readline');

// Array untuk hari dalam seminggu
const daysOfWeek = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];

// Fungsi untuk mencari hari di masa depan
function findFutureDay(currentDay, daysToAdd) {
    const currentIndex = daysOfWeek.indexOf(currentDay);

    if (currentIndex === -1) {
        return "Hari tidak valid!";
    }

    // Menambahkan jumlah hari yang akan datang dan menggunakan modulus 7 agar siklus tetap dalam rentang 0-6
    const futureIndex = (currentIndex + daysToAdd) % 7;

    // Mengembalikan nama hari di indeks baru
    return daysOfWeek[futureIndex];
}

// Fungsi untuk mendapatkan input dari pengguna
function getInput(message) {
    return new Promise((resolve) => {
        const rl = readline.createInterface({
            input: process.stdin,
            output: process.stdout
        });

        rl.question(message, (input) => {
            resolve(input);
            rl.close();
        });
    });
}

// Fungsi utama untuk menjalankan program
async function main() {
    let currentDay = await getInput("Masukkan hari sekarang (Minggu, Senin, Selasa, Rabu, Kamis, Jumat, Sabtu): ");
    currentDay = currentDay.toLowerCase();
    
    const daysToAdd = parseInt(await getInput("Masukkan jumlah hari yang ingin ditambahkan: "));
    
    if (isNaN(daysToAdd)) {
        console.log("Jumlah hari tidak valid!");
    } else {
        const futureDay = findFutureDay(currentDay, daysToAdd);
        console.log(`${daysToAdd} hari setelah ${currentDay} adalah ${futureDay}`);
    }
}

// Menjalankan fungsi utama
main();
