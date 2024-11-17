const suits = ["H", "D", "C", "S"];
const values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
let deck = [], playerHand = [], dealerHand = [], gameOver = false;
let playerMoney = 5000;
let betAmount = 0;

const playerHandElement = document.getElementById("player-hand");
const dealerHandElement = document.getElementById("dealer-hand");
const playerHandValueElement = document.getElementById("player-hand-value");
const dealerHandValueElement = document.getElementById("dealer-hand-value");
const resultMessageElement = document.getElementById("result-message");

document.getElementById("new-game-button").addEventListener("click", startNewGame);
document.getElementById("hit-button").addEventListener("click", hit);
document.getElementById("stand-button").addEventListener("click", stand);
document.getElementById("restart-button").addEventListener("click", restartGame);

function createCardElement(card, hidden = false) {
    const cardDiv = document.createElement('div');
    cardDiv.classList.add('card');

    if (hidden) {
        cardDiv.innerHTML = `<img src="images/Back.png" alt="Hidden Card" />`; 
    } else {
        const cardName = `${card.value}-${card.suit}.png`;
        const cardPath = `images/${cardName}`; 
        cardDiv.innerHTML = `<img src="${cardPath}" alt="${card.value} of ${card.suit}" />`;
    }
    return cardDiv;
}

function createDeck() {
    deck = [];
    for (let suit of suits) {
        for (let value of values) {
            deck.push({ value, suit });
        }
    }
}

function shuffleDeck() {
    for (let i = deck.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [deck[i], deck[j]] = [deck[j], deck[i]];
    }
}

function newGame() {
    createDeck();
    shuffleDeck();
    playerHand = [drawCard(), drawCard()];
    dealerHand = [drawCard(), drawCard()];
    gameOver = false;
    resultMessageElement.textContent = "";
    resultMessageElement.classList.remove('win', 'lose', 'draw');
    updateUI();
}

function drawCard() {
    return deck.pop();
}

function calculateHandValue(hand) {
    let total = 0;
    let aceCount = 0;

    for (let card of hand) {
        if (card.value === "A") {
            total += 11;
            aceCount++;
        } else if (["J", "Q", "K"].includes(card.value)) {
            total += 10;
        } else {
            total += parseInt(card.value);
        }
    }

    while (total > 21 && aceCount > 0) {
        total -= 10;
        aceCount--;
    }

    return total;
}

function updateUI() {
    playerHandElement.innerHTML = '';
    dealerHandElement.innerHTML = '';

    playerHand.forEach(card => playerHandElement.appendChild(createCardElement(card)));
    dealerHand.forEach((card, index) => dealerHandElement.appendChild(createCardElement(card, index > 0 && !gameOver)));

    playerHandValueElement.textContent = `[${calculateHandValue(playerHand)}]`;
    dealerHandValueElement.textContent = `[${gameOver ? calculateHandValue(dealerHand) : '6+?'}]`;

    document.getElementById("player-money").textContent = playerMoney;
}

function hit() {
    if (!gameOver) {
        playerHand.push(drawCard());
        if (calculateHandValue(playerHand) > 21) {
            endGame(false);
        }
        updateUI();
    }
}

function stand() {
    if (!gameOver) {
        while (calculateHandValue(dealerHand) < 17) {
            dealerHand.push(drawCard());
        }
        const playerTotal = calculateHandValue(playerHand);
        const dealerTotal = calculateHandValue(dealerHand);
        const playerWins = (playerTotal > dealerTotal && playerTotal <= 21) || dealerTotal > 21;
        const draw = playerTotal === dealerTotal;

        endGame(playerWins, draw);
    }
}

function endGame(playerWins, draw) {
    gameOver = true;
    updateUI();

    if (draw) {
        resultMessageElement.textContent = "~ It's a draw!";
        resultMessageElement.classList.add('draw');
    } else if (playerWins) {
        resultMessageElement.textContent = "~ You won!";
        resultMessageElement.classList.add('win');
        playerMoney += betAmount * 2;
    } else {
        resultMessageElement.textContent = "~ You lost!";
        resultMessageElement.classList.add('lose');
        playerMoney -= betAmount;
    }

    document.getElementById("player-money").textContent = playerMoney;

    if (playerMoney <= 0) {
        gameOverScreen();
    }
}

function startNewGame() {
    betAmount = parseInt(document.getElementById("bet-amount").value);
    if (betAmount < 100 || betAmount > playerMoney) {
        alert("Invalid bet amount. Please bet between $100 and your current money.");
        return;
    }

    resetGame();
    newGame();
}

function gameOverScreen() {
    document.querySelector(".game-container").style.display = "none";
    document.getElementById("game-over-screen").style.display = "block";
}


function restartGame() {
    playerMoney = 5000;
    document.getElementById("player-money").textContent = playerMoney;
    document.querySelector(".game-container").style.display = "block";
    document.getElementById("game-over-screen").style.display = "none";
    resetGame();
    playerHandElement.innerHTML = `
        <img src="images/back.png" alt="Card Back" class="card">
        <img src="images/back.png" alt="Card Back" class="card">
    `;
    dealerHandElement.innerHTML = `
        <img src="images/back.png" alt="Card Back" class="card">
        <img src="images/back.png" alt="Card Back" class="card">
    `;
    playerHandValueElement.textContent = "[?]";
    dealerHandValueElement.textContent = "[?]";
    resultMessageElement.textContent = '';
}
function resetGame() {
    playerHand = [];
    dealerHand = [];
    gameOver = false;

    playerHandElement.innerHTML = '';
    dealerHandElement.innerHTML = '';
    resultMessageElement.textContent = '';
    resultMessageElement.classList.remove('win', 'lose', 'draw');
}