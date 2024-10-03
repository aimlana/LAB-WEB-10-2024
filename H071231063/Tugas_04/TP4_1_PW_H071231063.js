const readline = require('readline');

// Membuat interface untuk input/output
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

// Fungsi untuk menghitung bilangan genap
function countEvenNumbers(start, end) {
    let count = 0;
    let evenNumbers = [];
    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            count++;
            evenNumbers.push(i);  // Menyimpan bilangan genap
        }
    }
    return `${count} bilangan genap (${evenNumbers.join(', ')})`;
}

// Fungsi untuk meminta input dari pengguna
function getInput(promptMessage) {
    return new Promise((resolve) => {
        rl.question(promptMessage, (input) => {
            resolve(input);
        });
    });
}

// Fungsi utama untuk menjalankan program
async function main() {
    try {
        let start = await getInput("Masukkan angka mulai: ");
        let end = await getInput("Masukkan angka akhir: ");

        start = parseInt(start);
        end = parseInt(end);

        if (!isNaN(start) && !isNaN(end) && start <= end) {
            let result = countEvenNumbers(start, end);
            console.log(result);
        } else {
            console.log("Input tidak valid. Pastikan Anda memasukkan angka dan angka mulai harus lebih kecil atau sama dengan angka akhir.");
        }
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
    } finally {
        rl.close(); // Menutup interface readline
    }
}

// Menjalankan fungsi utama
main();
