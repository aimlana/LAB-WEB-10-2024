const readline = require('readline');

// Fungsi untuk memulai permainan
function startGame() {
    const targetNumber = Math.floor(Math.random() * 100) + 1;
    let guess = null;
    let attempts = 0;

    const rl = readline.createInterface({
        input: process.stdin,
        output: process.stdout
    });

    // Fungsi untuk meminta input dari pengguna
    function askGuess() {
        rl.question("Masukkan salah satu dari angka 1 sampai 100: ", (input) => {
            guess = parseInt(input);

            if (isNaN(guess)) {
                console.log("Harap masukkan angka yang valid.");
                askGuess(); // Ulangi jika input tidak valid
                return;
            }

            attempts++;

            if (guess > targetNumber) {
                console.log("Terlalu tinggi! Coba lagi.");
                askGuess(); // Minta tebak lagi
            } else if (guess < targetNumber) {
                console.log("Terlalu rendah! Coba lagi.");
                askGuess(); // Minta tebak lagi
            } else {
                console.log(`Selamat! Kamu berhasil menebak angka ${guess} dengan benar.`);
                console.log(`Kamu berhasil dalam ${attempts}x percobaan.`);
                rl.close(); // Mengakhiri input setelah tebakannya benar
            }
        });
    }

    // Memulai game dengan meminta tebakan pertama
    askGuess();
}

startGame();
