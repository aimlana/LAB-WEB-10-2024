// Deklarasi variabel
let playerHand = [];
let dealerHand = [];
let deck = [];
let balance = 0;
let currentBet = 0;
var audio = document.getElementById("background-audio");
audio.volume = 0.4;


// balance = 5000;
// document.getElementById('balance').textContent = balance;
// Input awal untuk balance
while (balance === 0) {
    let input1 = prompt("Masukkan nominal Balance: ");
    if (!isNaN(input1) && Number.isInteger(parseFloat(input1)) && parseFloat(input1) > 0) {
        balance = parseFloat(input1);
        document.getElementById('balance').textContent = balance;
        break;
    } else {
        alert("Inputan bukan angka atau tidak valid");
    }
}


// Nilai kartu
const cardValues = {
    "2": 2, "3": 3, "4": 4, "5": 5, "6": 6, "7": 7, "8": 8, "9": 9, "10": 10,
    "J": 10, "Q": 10, "K": 10, "A": [1, 11]
};

// Deklarasi audio
const winSound = new Audio("sounds/cash.mp3");
const loseSound = new Audio("sounds/aww.mp3");


// Membuat deck kartu
function createDeck() {
    const suits = ['H', 'D', 'C', 'S'];
    const ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    deck = [];
    for (let suit of suits) {
        for (let rank of ranks) {
            deck.push({ suit, rank });
        }
    }
    deck = shuffle(deck);
}

// Fungsi untuk mengacak kartu
function shuffle(array) {
    return array.sort(() => Math.random() - 0.5);
}

// Fungsi mengambil kartu
function drawCard() {
    return deck.pop();
}

// Menghitung total nilai kartu
function calculateTotal(hand) {
    let total = 0;
    let hasAce = false;
    for (let card of hand) {
        let value = cardValues[card.rank];
        if (card.rank === "A") {
            hasAce = true;
            total += 11;
        } else {
            total += value;
        }
    }

    // Jika total lebih dari 21 dan ada kartu As, ubah nilainya jadi 1
    if (hasAce && total > 21) {
        total -= 10;
    }

    return total;
}

// Menampilkan kartu di DOM
function displayCards(hand, elementId, revealAll = false) {
    const container = document.getElementById(elementId);
    container.innerHTML = '';  // Kosongkan kontainer terlebih dahulu

    // Mengatur gaya tampilan
    container.style.display = 'flex'; // Pastikan kontainer menggunakan flexbox
    container.style.justifyContent = hand.length === 1 ? 'center' : 'flex-start';

    hand.forEach((card, index) => {
        const cardDiv = document.createElement('div');
        cardDiv.classList.add('card');

        // Menampilkan kartu dealer hanya jika revealAll = true
        if (hand === dealerHand && !revealAll) {
            if (index === 0) {
                const cardBackImage = document.createElement('img');
                cardBackImage.src = 'Images/cards/back.png'; // Path untuk gambar belakang kartu
                cardBackImage.alt = 'Card Back';
                cardBackImage.classList.add('card-img');
                cardDiv.appendChild(cardBackImage);
            }
        } else {
            const cardImage = document.createElement('img');
            const cardFileName = `${card.rank}-${card.suit}.png`; // Contoh: "A-S .png"
            cardImage.src = `Images/cards/${cardFileName}`; // Path sesuai
            cardImage.alt = `${card.rank} of ${card.suit}`;
            cardImage.classList.add('card-img');
            cardDiv.appendChild(cardImage);
        }

        // Tambahkan kartu ke kontainer
        container.appendChild(cardDiv);

        // Animasi fade-in
        setTimeout(() => {
            cardDiv.classList.add('show');
        }, 100 * index);  // Delay untuk efek bertahap
    });
}

// Event listener untuk tombol "Take a Card"
document.getElementById('take-btn').addEventListener('click', () => {
    playerHand.push(drawCard()); // Tambahkan kartu ke tangan player
    displayCards(playerHand, 'player-hand'); // Tampilkan ulang kartu player
    document.getElementById('player-total').textContent = `${calculateTotal(playerHand)}`;

    // Cek apakah total kartu player melebihi 21 (bust)
    if (calculateTotal(playerHand) > 21) {
        loseSound.play().catch(error => console.error('Error playing lose sound:', error));
        balance -= currentBet;
        endGame('Bust! You lose.');
    } else {
    }
});

// Fungsi untuk menampilkan kartu dealer secara bertahap
function revealDealerCards() {
    let dealerTotal = calculateTotal(dealerHand);
    let index = 1; // Mulai dari kartu kedua

    function revealNextCard() {
        if (index < dealerHand.length) {
            displayCards(dealerHand.slice(0, index + 1), 'dealer-hand', true); // Tampilkan hingga kartu ke-index
            dealerTotal = calculateTotal(dealerHand.slice(0, index + 1));
            document.getElementById('dealer-total').textContent = dealerTotal;
            index++;
            setTimeout(revealNextCard, 1000); // Tunggu 1 detik sebelum menampilkan kartu berikutnya
        } else {
            document.getElementById('dealer-total').textContent = dealerTotal;
            checkWinner(); // Cek pemenang setelah semua kartu ditampilkan
        }
    }

    revealNextCard(); // Mulai mengungkap kartu dealer
}

// Event listener untuk tombol "Hold a Card"
document.getElementById('hold-btn').addEventListener('click', () => {
    revealDealerCards(); // Ungkap kartu dealer
});

// Fungsi untuk memeriksa pemenang
function checkWinner() {
    const playerTotal = calculateTotal(playerHand);
    const dealerTotal = calculateTotal(dealerHand);
    if (dealerTotal > 21 || playerTotal > dealerTotal) {
        balance += currentBet * 2; // Player menang
        winSound.play().catch(error => console.error('Error playing win sound:', error));
        endGame('You win!');
    } else if (playerTotal === dealerTotal) {
        endGame('It\'s a tie!');
    } else {
        balance -= currentBet; // Dealer menang
        loseSound.play().catch(error => console.error('Error playing lose sound:', error));
        endGame('You lose.');
    }
}

// Fungsi untuk mengakhiri permainan
function endGame(message) {
    alert(message);
    document.getElementById('balance').textContent = balance;
    if(balance === 0) {
        alert("Game Over"); 
        document.getElementById('hold-btn').disabled = true;
        document.getElementById('take-btn').disabled = true;
        document.getElementById('start-btn').disabled = true;
    }
    else {
        resetGame();
        document.getElementById('hold-btn').disabled = true;
        document.getElementById('take-btn').disabled = true;
        document.getElementById('start-btn').disabled = false;
    }
}

// Fungsi untuk mereset permainan
function resetGame() {
    playerHand = [];
    dealerHand = [];
    document.getElementById('player-hand').innerHTML = '';
    document.getElementById('dealer-hand').innerHTML = '';
    document.getElementById('player-total').textContent = '0';
    document.getElementById('dealer-total').textContent = '0';
    document.getElementById('hold-btn').disabled = true;
    document.getElementById('take-btn').disabled = true;
    document.getElementById('start-btn').disabled = false;
}

// Memulai game baru
function startGame() {
    getBet();
    document.getElementById('current-bet').textContent = `${currentBet}`;
    createDeck();  // Buat deck baru
    playerHand = [drawCard(), drawCard()];  // Player mendapat dua kartu
    dealerHand = [drawCard(), drawCard()];  // Dealer mendapat dua kartu

    displayCards(playerHand, 'player-hand');  // Tampilkan kartu player
    displayCards(dealerHand, 'dealer-hand');  // Hanya tampilkan satu kartu tertutup dealer (gambar belakang)
    
    document.getElementById('player-total').textContent = `${calculateTotal(playerHand)}`;
    document.getElementById('dealer-total').textContent = `???`;

    // Aktifkan tombol Hit dan Stay
    document.getElementById('hold-btn').disabled = false;
    document.getElementById('take-btn').disabled = false;
    document.getElementById('start-btn').disabled = true;
}

// Event listener untuk tombol "Start Game"
document.getElementById('start-btn').addEventListener('click', startGame);

// Fungsi untuk mengambil taruhan
function getBet() {
    let betAmount = parseFloat(prompt("Masukkan nominal taruhan: "));
    if (!isNaN(betAmount) && betAmount > 0 && betAmount <= balance) {
        currentBet = betAmount;
    } else {
        alert("Taruhan tidak valid");
        getBet(); // Coba lagi
    }
}

// Event listener untuk tombol "Confirm Bet"
document.getElementById('confirm-bet-btn').addEventListener('click', () => {
    let betAmount = parseFloat(document.getElementById('bet-amount-modal').value);
    if (!isNaN(betAmount) && betAmount >= 100 && betAmount <= balance) {
        currentBet = betAmount;
        document.getElementById('current-bet').textContent = `${currentBet}`;
        document.getElementById('betModal').style.display = 'none'; // Tutup modal
        startGame(); // Mulai game
    } else {
        alert("Taruhan tidak valid");
    }
});