// //nomor 1
function countEvenNumbers(x,y){
    let jumlahBilanganBulat = 0;
    let bilanganBulat = [];
    
    for(let i = x; i <= y;i++){
        if(i % 2 == 0 ){
            jumlahBilanganBulat ++;
            bilanganBulat.push(i);
        }
    }
    console.log("Output: " + jumlahBilanganBulat + " (" + bilanganBulat + " )")
    return jumlahBilanganBulat;
};

countEvenNumbers(1,10);

// nomor 2
function hitungDiskon(){
    let hargaBarang = parseInt(prompt("Masukkan Harga Barang : "))
    let jenisBarang = prompt("Masukkan Jenis Barang : ")
    jenisBarang.toLowerCase()
    let hargaTotal = hargaBarang
    if(jenisBarang== "elektronik"){
        hargaTotal = hargaTotal * 0.90
        console.log("Harga Awal : " + hargaBarang)
        console.log("Diskon 10%")
        console.log("Harga Setelah Diskon : " + hargaTotal);
    }else if(jenisBarang== "pakaian"){
        hargaTotal = hargaTotal * 0.80
        console.log("Harga Awal : " + hargaBarang)
        console.log("Diskon 20%")
        console.log("Harga Setelah Diskon : " + hargaTotal);
    }else if(jenisBarang== "makanan" ){
        hargaTotal = hargaTotal * 0.95
        console.log("Harga Awal : " + hargaBarang)
        console.log("Diskon 5%")
        console.log("Harga Setelah Diskon : " + hargaTotal);
    }else{
        console.log("Harga Awal : " + hargaBarang)
        console.log("Diskon 0%")
        console.log("Harga Setelah Diskon : " + hargaTotal);
    }

}

hitungDiskon()

//nomor 3
function cariHari(hariIni,jumlahHari){
    let namaHari = ["senin","selasa","rabu","kamis","jumat","sabtu","minggu"];
 
    let indexHariIni = namaHari.indexOf(hariIni);
    if(indexHariIni === -1){
        console.log("Hari ini tidak valid");
    }

    let indexMasaDepan = (indexHariIni+jumlahHari) % 7;
    return namaHari[indexMasaDepan];
   
    
    
    
}


let hariIni = prompt("Hari : ")
hariIni.toLowerCase
let jumlahhari = parseInt(prompt("Jumlah Hari : "))
let hariMasaDepan = cariHari(hariIni,jumlahhari)
console.log((`${jumlahhari} hari dari hari ${hariIni} adalah ${hariMasaDepan}`) )
















//nomor 4 
function randomNumber(){
    let angkaTebakan = parseInt(prompt("Masukkan Angka (1-100) : "));
    let angka = Math.floor((Math.random()*100)+1);
    let jumlahPercobaan = 1;

while(angkaTebakan != angka){
    if(angkaTebakan > angka){
        console.log("Terlalu Tinggi! Coba Lagi.")
        jumlahPercobaan++;
    }else if(angkaTebakan < angka){
        console.log("Terlalu Rendah! Coba Lagi.")
        jumlahPercobaan++;
    }
    angkaTebakan = parseInt(prompt("Masukkan Angka (1-100): "));
    }

    console.log("Selamat! Kamu Berhasil menebak " + angka + " Dengan Benar. ")
    console.log("Sebanyak " + jumlahPercobaan + " Percobaan.")
}
randomNumber()