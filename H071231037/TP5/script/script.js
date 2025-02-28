function permainan() {
    let kartuDipilihBandar = [];
    let kartuDiperlihatkanBandar = [];
    let kartuDiperlihatkanPemain = [];
    let deckKartu = ["1","2","3","4","5","6","7","8","9","10","Jack","Queen","King","Ace"];
    
    let uangPemain = 5000;
    let nilaiPemain = 0;
    let nilaiBandar = 0;

    let playerMoney = document.getElementById("uang-pemain");
    playerMoney.textContent = "Uang Pemain : $" + uangPemain;

    
    function setTaruhan() {
        let taruhan = parseInt(prompt("Masukkan Taruhan (Minimal $100) : "));
        if(taruhan > uangPemain) {
            alert("TARUHAN MELEBIHI UANG ANDA");
            return setTaruhan(); 
        } else if(taruhan < 100) {
            alert("MINIMAL TARUHAN $100");
            return setTaruhan(); 
        } else {
            return taruhan;
        }
    }


    let taruhan = setTaruhan();
    uangPemain -= taruhan;
    let kalah = document.getElementById('kalah')
    let hit = document.getElementById("hit");
   
    hit.addEventListener("click", function() {
        let pilihKartu = Math.floor(Math.random() * deckKartu.length);
        let kartu = deckKartu[pilihKartu];
        kartuDiperlihatkanPemain.push(kartu);
        
        if(!isNaN(kartu)) {
            nilaiPemain += parseInt(kartu);
        } else if (kartu === "Jack" || kartu === "Queen" || kartu === "King") {
            nilaiPemain += 10;
        } else if (kartu === "Ace") {
            nilaiPemain += (nilaiPemain + 11 > 21) ? 1 : 11;
        }
        
        if (nilaiPemain > 21) {
            alert("BUST!!!");
            checkGameOver();
            kalah.style.display= 'block';
            return;
        } 

        let playerScore = document.getElementById("player-score");
        playerScore.textContent = "Score: " + nilaiPemain;
        playerMoney.textContent = "Uang Pemain : $" + uangPemain;
    });

    let stay = document.getElementById("stay");
    stay.addEventListener("click", function() {
        while (nilaiBandar < 17) {
            let pilihKartuBandar = Math.floor(Math.random() * deckKartu.length);
            
            if (!kartuDipilihBandar.includes(pilihKartuBandar)) {
                kartuDipilihBandar.push(pilihKartuBandar);
                kartuDiperlihatkanBandar.push(deckKartu[pilihKartuBandar]);

                let kartu = deckKartu[pilihKartuBandar];
                if (!isNaN(kartu)) {
                    nilaiBandar += parseInt(kartu);
                } else if (kartu === "Jack" || kartu === "Queen" || kartu === "King") {
                    nilaiBandar += 10;
                } else if (kartu === "Ace") {
                    nilaiBandar += (nilaiBandar + 11 > 21) ? 1 : 11;
                }
            }
        }
        
        let bandarScore = document.getElementById("dealer-score");
        bandarScore.textContent = "Score : " + nilaiBandar;
        
        let kalah = document.getElementById('kalah')
        let menang = document.getElementById('menang')
        
        if (nilaiBandar > 21) {
            menang.style.display = 'block'
            uangPemain += taruhan * 2;
        } else if (nilaiBandar > nilaiPemain) {
            kalah.style.display= 'block';
            uangPemain -= taruhan;
        } else if (nilaiPemain > nilaiBandar) {
            menang.style.display = 'block'
            uangPemain += taruhan * 2;
        } else {
            alert("SERI!");
            uangPemain += taruhan; 
        }

        playerMoney.textContent = "Uang Pemain : $" + uangPemain;
        checkGameOver();
        
    
        nilaiPemain = 0; 
        nilaiBandar = 0; 
    });

    let restart = document.getElementById("restart");
    restart.addEventListener("click", function() {
        nilaiPemain = 0;
        nilaiBandar = 0;
        uangPemain = 5000;

        let kalah = document.getElementById('kalah')
        let menang = document.getElementById('menang')

        kalah.style.display = 'none'
        menang.style.display = 'none'
       
        playerMoney.textContent = "Uang Pemain : $" + uangPemain;

        document.getElementById("player-score").textContent = "Score: 0";
        document.getElementById("dealer-score").textContent = "Score: 0";

        
        document.getElementById("hit").disabled = false;
        document.getElementById("stay").disabled = false;

      
        taruhan = setTaruhan();
        uangPemain -= taruhan;
    });

    function checkGameOver() {
        if (uangPemain <= 0) {
            alert("Game Over! Anda tidak memiliki uang lagi.");
            document.getElementById("hit").disabled = true;
            document.getElementById("stay").disabled = true;
        }
    }
}

permainan();
