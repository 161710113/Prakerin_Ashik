<?php

use Illuminate\Database\Seeder;
use App\Merk;
use App\Tipe;
use App\Lokasi;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sample Merk
        $merk = Merk::create(['nama_merk'=>'Honda']);
        $merk2 = Merk::create(['nama_merk'=>'Daihatsu']);
        $merk3 = Merk::create(['nama_merk'=>'Toyota']);
        $merk4 = Merk::create(['nama_merk'=>'Ferrari']);
        $merk5 = Merk::create(['nama_merk'=>'Lamborghini']);
        $merk6 = Merk::create(['nama_merk'=>'Nisan']);
        $merk7 = Merk::create(['nama_merk'=>'BMW']);
        $merk8 = Merk::create(['nama_merk'=>'Mercedes']);
        $merk9 = Merk::create(['nama_merk'=>'Jeep']);
        $merk10 = Merk::create(['nama_merk'=>'Porche']);
        $merk11 = Merk::create(['nama_merk'=>'Mitsubitshi']);
        $merk12 = Merk::create(['nama_merk'=>'Subaru']);
        $merk13 = Merk::create(['nama_merk'=>'Hino']);
        $merk14 = Merk::create(['nama_merk'=>'Hummer']);
        $merk15 = Merk::create(['nama_merk'=>'Wuling']);
        $merk16 = Merk::create(['nama_merk'=>'Audi']);

        //Sample Tipe
        $tipe = Tipe::create(['nama_tipe'=>'Minivan']);
        $tipe2 = Tipe::create(['nama_tipe'=>'Sport']);
        $tipe3 = Tipe::create(['nama_tipe'=>'Coupe']);
        $tipe4 = Tipe::create(['nama_tipe'=>'Hatchback']);
        $tipe5 = Tipe::create(['nama_tipe'=>'Convertible']);
        $tipe6 = Tipe::create(['nama_tipe'=>'SUV']);
        $tipe7 = Tipe::create(['nama_tipe'=>'Sedan']);
        $tipe8 = Tipe::create(['nama_tipe'=>'Wagon']);
        $tipe9 = Tipe::create(['nama_tipe'=>'Super Car']);

        //Sample Merk
        $lokasi = Lokasi::create(['nama_kota'=>'Banda Aceh']);
        $lokasi2 = Lokasi::create(['nama_kota'=>'Langsa']);
        $lokasi3 = Lokasi::create(['nama_kota'=>'Lhokseumawe']);
        $lokasi4 = Lokasi::create(['nama_kota'=>'Meulaboh']);
        $lokasi5 = Lokasi::create(['nama_kota'=>'Sabang']);
        $lokasi6 = Lokasi::create(['nama_kota'=>'Subulussalam']);
        $lokasi7 = Lokasi::create(['nama_kota'=>'Denpasar']);
        $lokasi8 = Lokasi::create(['nama_kota'=>'Pangkalpinang']);
        $lokasi9 = Lokasi::create(['nama_kota'=>'Cilegon']);
        $lokasi10 = Lokasi::create(['nama_kota'=>'Serang']);
        $lokasi11 = Lokasi::create(['nama_kota'=>'Tangerang Selatan']);
        $lokasi12 = Lokasi::create(['nama_kota'=>'Tangerang']);
        $lokasi13 = Lokasi::create(['nama_kota'=>'Bengkulu']);
        $lokasi14 = Lokasi::create(['nama_kota'=>'Gorontalo']);
        $lokasi15 = Lokasi::create(['nama_kota'=>'Jakarta Barat']);
        $lokasi16 = Lokasi::create(['nama_kota'=>'Jakarta Pusat']);
        $lokasi17 = Lokasi::create(['nama_kota'=>'Jakarta Selatan']);
        $lokasi18 = Lokasi::create(['nama_kota'=>'Jakarta Timur']);
        $lokasi19 = Lokasi::create(['nama_kota'=>'Jakarta Utara']);
        $lokasi20 = Lokasi::create(['nama_kota'=>'Sungai Penuh']);
        $lokasi21 = Lokasi::create(['nama_kota'=>'Jambi']);
        $lokasi22 = Lokasi::create(['nama_kota'=>'Bandung']);
        $lokasi23 = Lokasi::create(['nama_kota'=>'Bekasi']);
        $lokasi24 = Lokasi::create(['nama_kota'=>'Bogor']);
        $lokasi25 = Lokasi::create(['nama_kota'=>'Cimahi']);
        $lokasi26 = Lokasi::create(['nama_kota'=>'Cirebon']);
        $lokasi27 = Lokasi::create(['nama_kota'=>'Depok']);
        $lokasi28 = Lokasi::create(['nama_kota'=>'Sukabumi']);
        $lokasi29= Lokasi::create(['nama_kota'=>'Tasikmalaya']);
        $lokasi30 = Lokasi::create(['nama_kota'=>'Banjar']);
        $lokasi31 = Lokasi::create(['nama_kota'=>'Magelang']);
        $lokasi32 = Lokasi::create(['nama_kota'=>'Pekalongan']);
        $lokasi33 = Lokasi::create(['nama_kota'=>'Purwokerto']);
        $lokasi34 = Lokasi::create(['nama_kota'=>'Salatiga']);
        $lokasi35 = Lokasi::create(['nama_kota'=>'Semarang']);
        $lokasi36 = Lokasi::create(['nama_kota'=>'Surakarta']);
        $lokasi37 = Lokasi::create(['nama_kota'=>'Tegal']);
        $lokasi38 = Lokasi::create(['nama_kota'=>'Batu']);
        $lokasi39 = Lokasi::create(['nama_kota'=>'Blitar']);
        $lokasi40 = Lokasi::create(['nama_kota'=>'Kediri']);
        $lokasi41 = Lokasi::create(['nama_kota'=>'Madiun']);
        $lokasi42 = Lokasi::create(['nama_kota'=>'Malang']);
        $lokasi43 = Lokasi::create(['nama_kota'=>'Mojokerto']);
        $lokasi44 = Lokasi::create(['nama_kota'=>'Pasuruan']);
        $lokasi45 = Lokasi::create(['nama_kota'=>'Probolinggo']);
        $lokasi46 = Lokasi::create(['nama_kota'=>'Surabaya']);
        $lokasi47 = Lokasi::create(['nama_kota'=>'Pontianak']);
        $lokasi48 = Lokasi::create(['nama_kota'=>'Singkawang']);
        $lokasi49 = Lokasi::create(['nama_kota'=>'Banjarbaru']);
        $lokasi50 = Lokasi::create(['nama_kota'=>'Banjarmasin']);
        $lokasi51 = Lokasi::create(['nama_kota'=>'Palangkaraya']);
        $lokasi52 = Lokasi::create(['nama_kota'=>'Balikpapan']);
        $lokasi53 = Lokasi::create(['nama_kota'=>'Bontang']);
        $lokasi54 = Lokasi::create(['nama_kota'=>'Samarinda']);
        $lokasi55 = Lokasi::create(['nama_kota'=>'Tarakan']);
        $lokasi56 = Lokasi::create(['nama_kota'=>'Batam']);
        $lokasi57 = Lokasi::create(['nama_kota'=>'Tanjungpinang']);
        $lokasi58 = Lokasi::create(['nama_kota'=>'Bandar Lampung']);
        $lokasi59 = Lokasi::create(['nama_kota'=>'Metro']);
        $lokasi60 = Lokasi::create(['nama_kota'=>'Ternate']);
        $lokasi61 = Lokasi::create(['nama_kota'=>'Tidore Kepulauan']);
        $lokasi62 = Lokasi::create(['nama_kota'=>'Ambon']);
        $lokasi63 = Lokasi::create(['nama_kota'=>'Tual']);
        $lokasi64 = Lokasi::create(['nama_kota'=>'Bima']);
        $lokasi65 = Lokasi::create(['nama_kota'=>'Mataram']);
        $lokasi66 = Lokasi::create(['nama_kota'=>'Kupang']);
        $lokasi67 = Lokasi::create(['nama_kota'=>'Sorong']);
        $lokasi68 = Lokasi::create(['nama_kota'=>'Jayapura']);
        $lokasi69 = Lokasi::create(['nama_kota'=>'Dumai']);
        $lokasi70 = Lokasi::create(['nama_kota'=>'Pekanbaru']);
        $lokasi71 = Lokasi::create(['nama_kota'=>'Makassar']);
        $lokasi72 = Lokasi::create(['nama_kota'=>'Palopo']);
        $lokasi73 = Lokasi::create(['nama_kota'=>'Parepare']);
        $lokasi74 = Lokasi::create(['nama_kota'=>'Palu']);
        $lokasi75 = Lokasi::create(['nama_kota'=>'Bau-Bau']);
        $lokasi76 = Lokasi::create(['nama_kota'=>'Kendari']);
        $lokasi77 = Lokasi::create(['nama_kota'=>'Bitung']);
        $lokasi78 = Lokasi::create(['nama_kota'=>'Kotamobagu']);
        $lokasi79 = Lokasi::create(['nama_kota'=>'Manado']);
        $lokasi80 = Lokasi::create(['nama_kota'=>'Tomohon']);
        $lokasi81 = Lokasi::create(['nama_kota'=>'Bukittinggi']);
        $lokasi82 = Lokasi::create(['nama_kota'=>'Padang']);
        $lokasi83 = Lokasi::create(['nama_kota'=>'Padangpanjang']);
        $lokasi84 = Lokasi::create(['nama_kota'=>'Pariaman']);
        $lokasi85 = Lokasi::create(['nama_kota'=>'Payakumbuh']);
        $lokasi86 = Lokasi::create(['nama_kota'=>'Sawahlunto']);
        $lokasi87 = Lokasi::create(['nama_kota'=>'Solok']);
        $lokasi88 = Lokasi::create(['nama_kota'=>'Lubuklinggau']);
        $lokasi89 = Lokasi::create(['nama_kota'=>'Pagaralam']);
        $lokasi90 = Lokasi::create(['nama_kota'=>'Palembang']);
        $lokasi91 = Lokasi::create(['nama_kota'=>'Prabumulih']);
        $lokasi92 = Lokasi::create(['nama_kota'=>'Binjai']);
        $lokasi93 = Lokasi::create(['nama_kota'=>'Medan']);
        $lokasi94 = Lokasi::create(['nama_kota'=>'Padang Sidempuan']);
        $lokasi95 = Lokasi::create(['nama_kota'=>'Pematangsiantar']);
        $lokasi96 = Lokasi::create(['nama_kota'=>'Sibolga']);
        $lokasi97 = Lokasi::create(['nama_kota'=>'Tanjungbalai']);
        $lokasi98 = Lokasi::create(['nama_kota'=>'Tebingtinggi']);
        $lokasi99 = Lokasi::create(['nama_kota'=>'Yogyakarta']);        
        
    }
}
