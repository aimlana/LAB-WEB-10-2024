const readline = require('readline');

// Fungsi untuk menghitung jumlah angka genap dalam rentang
function countEvenNumbers(start, end) {
    let count = 0;
    let evenNumbers = [];

    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            count++;
            evenNumbers.push(i);
        }
    }

    return { count, evenNumbers };
}

// Fungsi untuk mendapatkan input dari user
function getInput(message) {
    return new Promise((resolve) => {
        const rl = readline.createInterface({
            input: process.stdin,
            output: process.stdout
        });

        rl.question(message, (input) => {
            const num = parseInt(input);
            if (isNaN(num)) {
                console.log("Masukkan angka yang valid!");
                rl.close();
                resolve(getInput(message)); // Jika input tidak valid, minta ulang
            } else {
                rl.close();
                resolve(num);
            }
        });
    });
}

// Fungsi utama untuk menjalankan program
async function main() {
    const start = await getInput("Masukkan angka awal: ");
    const end = await getInput("Masukkan angka akhir: ");

    // Memeriksa apakah angka awal lebih besar dari angka akhir
    if (start > end) {
        console.log("Angka awal tidak boleh lebih besar dari angka akhir.");
    } else {
        // Hitung jumlah angka genap
        const result = countEvenNumbers(start, end);
        console.log(`Output: ${result.count} (${result.evenNumbers.join(', ')})`);
    }
}

// Menjalankan fungsi utama
main();
