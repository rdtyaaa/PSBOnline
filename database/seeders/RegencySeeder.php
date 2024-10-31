<?php

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regencies = [
            // Aceh
            ['id' => 1, 'province_id' => 1, 'name' => 'Kab. Simeulue'],
            ['id' => 2, 'province_id' => 1, 'name' => 'Kab. Aceh Singkil'],
            ['id' => 3, 'province_id' => 1, 'name' => 'Kab. Aceh Selatan'],
            ['id' => 4, 'province_id' => 1, 'name' => 'Kab. Aceh Tenggara'],
            ['id' => 5, 'province_id' => 1, 'name' => 'Kab. Aceh Timur'],
            ['id' => 6, 'province_id' => 1, 'name' => 'Kab. Aceh Tengah'],
            ['id' => 7, 'province_id' => 1, 'name' => 'Kab. Aceh Barat'],
            ['id' => 8, 'province_id' => 1, 'name' => 'Kab. Aceh Besar'],
            ['id' => 9, 'province_id' => 1, 'name' => 'Kab. Pidie'],
            ['id' => 10, 'province_id' => 1, 'name' => 'Kab. Bireuen'],
            ['id' => 11, 'province_id' => 1, 'name' => 'Kab. Aceh Utara'],
            ['id' => 12, 'province_id' => 1, 'name' => 'Kab. Aceh Barat Daya'],
            ['id' => 13, 'province_id' => 1, 'name' => 'Kab. Gayo Lues'],
            ['id' => 14, 'province_id' => 1, 'name' => 'Kab. Aceh Tamiang'],
            ['id' => 15, 'province_id' => 1, 'name' => 'Kab. Nagan Raya'],
            ['id' => 16, 'province_id' => 1, 'name' => 'Kab. Aceh Jaya'],
            ['id' => 17, 'province_id' => 1, 'name' => 'Kab. Bener Meriah'],
            ['id' => 18, 'province_id' => 1, 'name' => 'Kab. Pidie Jaya'],
            ['id' => 19, 'province_id' => 1, 'name' => 'Kota Banda Aceh'],
            ['id' => 20, 'province_id' => 1, 'name' => 'Kota Sabang'],
            ['id' => 21, 'province_id' => 1, 'name' => 'Kota Langsa'],
            ['id' => 22, 'province_id' => 1, 'name' => 'Kota Lhokseumawe'],
            ['id' => 23, 'province_id' => 1, 'name' => 'Kota Subulussalam'],
            // Sumatera Utara
            ['id' => 24, 'province_id' => 2, 'name' => 'Kab. Nias'],
            ['id' => 25, 'province_id' => 2, 'name' => 'Kab. Mandailing Natal'],
            ['id' => 26, 'province_id' => 2, 'name' => 'Kab. Tapanuli Selatan'],
            ['id' => 27, 'province_id' => 2, 'name' => 'Kab. Tapanuli Tengah'],
            ['id' => 28, 'province_id' => 2, 'name' => 'Kab. Tapanuli Utara'],
            ['id' => 29, 'province_id' => 2, 'name' => 'Kab. Toba Samosir'],
            ['id' => 30, 'province_id' => 2, 'name' => 'Kab. Labuhan Batu'],
            ['id' => 31, 'province_id' => 2, 'name' => 'Kab. Asahan'],
            ['id' => 32, 'province_id' => 2, 'name' => 'Kab. Simalungun'],
            ['id' => 33, 'province_id' => 2, 'name' => 'Kab. Dairi'],
            ['id' => 34, 'province_id' => 2, 'name' => 'Kab. Karo'],
            ['id' => 35, 'province_id' => 2, 'name' => 'Kab. Deli Serdang'],
            ['id' => 36, 'province_id' => 2, 'name' => 'Kab. Langkat'],
            ['id' => 37, 'province_id' => 2, 'name' => 'Kab. Nias Selatan'],
            ['id' => 38, 'province_id' => 2, 'name' => 'Kab. Humbang Hasundutan'],
            ['id' => 39, 'province_id' => 2, 'name' => 'Kab. Pakpak Bharat'],
            ['id' => 40, 'province_id' => 2, 'name' => 'Kab. Samosir'],
            ['id' => 41, 'province_id' => 2, 'name' => 'Kab. Serdang Bedagai'],
            ['id' => 42, 'province_id' => 2, 'name' => 'Kab. Batu Bara'],
            ['id' => 43, 'province_id' => 2, 'name' => 'Kab. Padang Lawas Utara'],
            ['id' => 44, 'province_id' => 2, 'name' => 'Kab. Padang Lawas'],
            ['id' => 45, 'province_id' => 2, 'name' => 'Kab. Labuhan Batu Selatan'],
            ['id' => 46, 'province_id' => 2, 'name' => 'Kab. Labuhan Batu Utara'],
            ['id' => 47, 'province_id' => 2, 'name' => 'Kab. Nias Utara'],
            ['id' => 48, 'province_id' => 2, 'name' => 'Kab. Nias Barat'],
            ['id' => 49, 'province_id' => 2, 'name' => 'Kota Sibolga'],
            ['id' => 50, 'province_id' => 2, 'name' => 'Kota Tanjung Balai'],
            ['id' => 51, 'province_id' => 2, 'name' => 'Kota Pematang Siantar'],
            ['id' => 52, 'province_id' => 2, 'name' => 'Kota Tebing Tinggi'],
            ['id' => 53, 'province_id' => 2, 'name' => 'Kota Medan'],
            ['id' => 54, 'province_id' => 2, 'name' => 'Kota Binjai'],
            ['id' => 55, 'province_id' => 2, 'name' => 'Kota Padangsidimpuan'],
            ['id' => 56, 'province_id' => 2, 'name' => 'Kota Gunungsitoli'],
            // Sumatera Barat
            ['id' => 57, 'province_id' => 3, 'name' => 'Kab. Kepulauan Mentawai'],
            ['id' => 58, 'province_id' => 3, 'name' => 'Kab. Pesisir Selatan'],
            ['id' => 59, 'province_id' => 3, 'name' => 'Kab. Solok'],
            ['id' => 60, 'province_id' => 3, 'name' => 'Kab. Sijunjung'],
            ['id' => 61, 'province_id' => 3, 'name' => 'Kab. Tanah Datar'],
            ['id' => 62, 'province_id' => 3, 'name' => 'Kab. Padang Pariaman'],
            ['id' => 63, 'province_id' => 3, 'name' => 'Kab. Agam'],
            ['id' => 64, 'province_id' => 3, 'name' => 'Kab. Lima Puluh Kota'],
            ['id' => 65, 'province_id' => 3, 'name' => 'Kab. Pasaman'],
            ['id' => 66, 'province_id' => 3, 'name' => 'Kab. Solok Selatan'],
            ['id' => 67, 'province_id' => 3, 'name' => 'Kab. Dharmasraya'],
            ['id' => 68, 'province_id' => 3, 'name' => 'Kab. Pasaman Barat'],
            ['id' => 69, 'province_id' => 3, 'name' => 'Kota Padang'],
            ['id' => 70, 'province_id' => 3, 'name' => 'Kota Solok'],
            ['id' => 71, 'province_id' => 3, 'name' => 'Kota Padangpanjang'],
            ['id' => 72, 'province_id' => 3, 'name' => 'Kota Bukittinggi'],
            ['id' => 73, 'province_id' => 3, 'name' => 'Kota Pariaman'],
            // Riau
            ['id' => 74, 'province_id' => 4, 'name' => 'Kab. Kampar'],
            ['id' => 75, 'province_id' => 4, 'name' => 'Kab. Rokan Hulu'],
            ['id' => 76, 'province_id' => 4, 'name' => 'Kab. Rokan Hilir'],
            ['id' => 77, 'province_id' => 4, 'name' => 'Kab. Bengkalis'],
            ['id' => 78, 'province_id' => 4, 'name' => 'Kab. Siak'],
            ['id' => 79, 'province_id' => 4, 'name' => 'Kab. Indragiri Hulu'],
            ['id' => 80, 'province_id' => 4, 'name' => 'Kab. Indragiri Hilir'],
            ['id' => 81, 'province_id' => 4, 'name' => 'Kab. Pelalawan'],
            ['id' => 82, 'province_id' => 4, 'name' => 'Kab. Kuantan Singingi'],
            ['id' => 83, 'province_id' => 4, 'name' => 'Kab. Meranti'],
            ['id' => 84, 'province_id' => 4, 'name' => 'Kota Pekanbaru'],
            ['id' => 85, 'province_id' => 4, 'name' => 'Kota Dumai'],
            // Kepulauan Riau
            ['id' => 86, 'province_id' => 5, 'name' => 'Kab. Bintan'],
            ['id' => 87, 'province_id' => 5, 'name' => 'Kab. Karimun'],
            ['id' => 88, 'province_id' => 5, 'name' => 'Kab. Lingga'],
            ['id' => 89, 'province_id' => 5, 'name' => 'Kab. Natuna'],
            ['id' => 90, 'province_id' => 5, 'name' => 'Kab. Anambas'],
            ['id' => 91, 'province_id' => 5, 'name' => 'Kota Batam'],
            ['id' => 92, 'province_id' => 5, 'name' => 'Kota Tanjung Pinang'],
            // Jambi
            ['id' => 93, 'province_id' => 6, 'name' => 'Kab. Tanjung Jabung Barat'],
            ['id' => 94, 'province_id' => 6, 'name' => 'Kab. Tanjung Jabung Timur'],
            ['id' => 95, 'province_id' => 6, 'name' => 'Kab. Muaro Jambi'],
            ['id' => 96, 'province_id' => 6, 'name' => 'Kab. Batanghari'],
            ['id' => 97, 'province_id' => 6, 'name' => 'Kab. Kerinci'],
            ['id' => 98, 'province_id' => 6, 'name' => 'Kab. Sarolangun'],
            ['id' => 99, 'province_id' => 6, 'name' => 'Kab. Merangin'],
            ['id' => 100, 'province_id' => 6, 'name' => 'Kab. Bangko'],
            ['id' => 101, 'province_id' => 6, 'name' => 'Kab. Bungo'],
            ['id' => 102, 'province_id' => 6, 'name' => 'Kota Jambi'],
            ['id' => 103, 'province_id' => 6, 'name' => 'Kota Sungai Penuh'],
            // Sumatera Selatan
            ['id' => 104, 'province_id' => 7, 'name' => 'Kab. Ogan Komering Ilir'],
            ['id' => 105, 'province_id' => 7, 'name' => 'Kab. Ogan Komering Ulu'],
            ['id' => 106, 'province_id' => 7, 'name' => 'Kab. Muara Enim'],
            ['id' => 107, 'province_id' => 7, 'name' => 'Kab. Lahat'],
            ['id' => 108, 'province_id' => 7, 'name' => 'Kab. Pagar Alam'],
            ['id' => 109, 'province_id' => 7, 'name' => 'Kab. Penukal Abab Lematang Ilir'],
            ['id' => 110, 'province_id' => 7, 'name' => 'Kab. Banyuasin'],
            ['id' => 111, 'province_id' => 7, 'name' => 'Kota Palembang'],
            ['id' => 112, 'province_id' => 7, 'name' => 'Kota Pagar Alam'],
            ['id' => 113, 'province_id' => 7, 'name' => 'Kota Prabumulih'],
            ['id' => 114, 'province_id' => 7, 'name' => 'Kota Lubuklinggau'],
            // Bengkulu
            ['id' => 115, 'province_id' => 8, 'name' => 'Kab. Bengkulu Selatan'],
            ['id' => 116, 'province_id' => 8, 'name' => 'Kab. Rejang Lebong'],
            ['id' => 117, 'province_id' => 8, 'name' => 'Kab. Lebong'],
            ['id' => 118, 'province_id' => 8, 'name' => 'Kab. Mukomuko'],
            ['id' => 119, 'province_id' => 8, 'name' => 'Kab. Kaur'],
            ['id' => 120, 'province_id' => 8, 'name' => 'Kab. Seluma'],
            ['id' => 121, 'province_id' => 8, 'name' => 'Kota Bengkulu'],
            // Lampung
            ['id' => 122, 'province_id' => 9, 'name' => 'Kab. Lampung Selatan'],
            ['id' => 123, 'province_id' => 9, 'name' => 'Kab. Lampung Tengah'],
            ['id' => 124, 'province_id' => 9, 'name' => 'Kab. Lampung Utara'],
            ['id' => 125, 'province_id' => 9, 'name' => 'Kab. Tanggamus'],
            ['id' => 126, 'province_id' => 9, 'name' => 'Kab. Pringsewu'],
            ['id' => 127, 'province_id' => 9, 'name' => 'Kab. Way Kanan'],
            ['id' => 128, 'province_id' => 9, 'name' => 'Kab. Mesuji'],
            ['id' => 129, 'province_id' => 9, 'name' => 'Kab. Tulang Bawang'],
            ['id' => 130, 'province_id' => 9, 'name' => 'Kab. Pesisir Barat'],
            ['id' => 131, 'province_id' => 9, 'name' => 'Kota Bandar Lampung'],
            ['id' => 132, 'province_id' => 9, 'name' => 'Kota Metro'],
            // DKI Jakarta
            ['id' => 133, 'province_id' => 10, 'name' => 'Kota Jakarta Pusat'],
            ['id' => 134, 'province_id' => 10, 'name' => 'Kota Jakarta Utara'],
            ['id' => 135, 'province_id' => 10, 'name' => 'Kota Jakarta Barat'],
            ['id' => 136, 'province_id' => 10, 'name' => 'Kota Jakarta Selatan'],
            ['id' => 137, 'province_id' => 10, 'name' => 'Kota Jakarta Timur'],
            // Jawa Barat
            ['id' => 138, 'province_id' => 11, 'name' => 'Kab. Bogor'],
            ['id' => 139, 'province_id' => 11, 'name' => 'Kab. Cianjur'],
            ['id' => 140, 'province_id' => 11, 'name' => 'Kab. Sukabumi'],
            ['id' => 141, 'province_id' => 11, 'name' => 'Kab. Purwakarta'],
            ['id' => 142, 'province_id' => 11, 'name' => 'Kab. Karawang'],
            ['id' => 143, 'province_id' => 11, 'name' => 'Kab. Bekasi'],
            ['id' => 144, 'province_id' => 11, 'name' => 'Kab. Subang'],
            ['id' => 145, 'province_id' => 11, 'name' => 'Kab. Sumedang'],
            ['id' => 146, 'province_id' => 11, 'name' => 'Kab. Indramayu'],
            ['id' => 147, 'province_id' => 11, 'name' => 'Kab. Cirebon'],
            ['id' => 148, 'province_id' => 11, 'name' => 'Kab. Kuningan'],
            ['id' => 149, 'province_id' => 11, 'name' => 'Kab. Majalengka'],
            ['id' => 150, 'province_id' => 11, 'name' => 'Kab. Sumedang'],
            ['id' => 151, 'province_id' => 11, 'name' => 'Kota Bogor'],
            ['id' => 152, 'province_id' => 11, 'name' => 'Kota Depok'],
            ['id' => 153, 'province_id' => 11, 'name' => 'Kota Bekasi'],
            ['id' => 154, 'province_id' => 11, 'name' => 'Kota Cimahi'],
            ['id' => 155, 'province_id' => 11, 'name' => 'Kota Bandung'],
            // Jawa Tengah
            ['id' => 156, 'province_id' => 12, 'name' => 'Kab. Semarang'],
            ['id' => 157, 'province_id' => 12, 'name' => 'Kab. Kendal'],
            ['id' => 158, 'province_id' => 12, 'name' => 'Kab. Batang'],
            ['id' => 159, 'province_id' => 12, 'name' => 'Kab. Pekalongan'],
            ['id' => 160, 'province_id' => 12, 'name' => 'Kab. Pemalang'],
            ['id' => 161, 'province_id' => 12, 'name' => 'Kab. Tegal'],
            ['id' => 162, 'province_id' => 12, 'name' => 'Kab. Brebes'],
            ['id' => 163, 'province_id' => 12, 'name' => 'Kota Semarang'],
            ['id' => 164, 'province_id' => 12, 'name' => 'Kota Salatiga'],
            ['id' => 165, 'province_id' => 12, 'name' => 'Kota Surakarta'],
            ['id' => 166, 'province_id' => 12, 'name' => 'Kota Tegal'],
            // DI Yogyakarta
            ['id' => 167, 'province_id' => 13, 'name' => 'Kab. Sleman'],
            ['id' => 168, 'province_id' => 13, 'name' => 'Kab. Bantul'],
            ['id' => 169, 'province_id' => 13, 'name' => 'Kab. Gunung Kidul'],
            ['id' => 170, 'province_id' => 13, 'name' => 'Kab. Kulon Progo'],
            ['id' => 171, 'province_id' => 13, 'name' => 'Kota Yogyakarta'],
            // Jawa Timur
            ['id' => 172, 'province_id' => 14, 'name' => 'Kab. Jember'],
            ['id' => 173, 'province_id' => 14, 'name' => 'Kab. Banyuwangi'],
            ['id' => 174, 'province_id' => 14, 'name' => 'Kab. Malang'],
            ['id' => 175, 'province_id' => 14, 'name' => 'Kab. Sidoarjo'],
            ['id' => 176, 'province_id' => 14, 'name' => 'Kab. Pasuruan'],
            ['id' => 177, 'province_id' => 14, 'name' => 'Kab. Probolinggo'],
            ['id' => 178, 'province_id' => 14, 'name' => 'Kab. Bondowoso'],
            ['id' => 179, 'province_id' => 14, 'name' => 'Kab. Situbondo'],
            ['id' => 180, 'province_id' => 14, 'name' => 'Kab. Mojokerto'],
            ['id' => 181, 'province_id' => 14, 'name' => 'Kab. Tuban'],
            ['id' => 182, 'province_id' => 14, 'name' => 'Kab. Lamongan'],
            ['id' => 183, 'province_id' => 14, 'name' => 'Kab. Gresik'],
            ['id' => 184, 'province_id' => 14, 'name' => 'Kota Surabaya'],
            ['id' => 185, 'province_id' => 14, 'name' => 'Kota Malang'],
            ['id' => 186, 'province_id' => 14, 'name' => 'Kota Pasuruan'],
            // Bali
            ['id' => 187, 'province_id' => 15, 'name' => 'Kab. Badung'],
            ['id' => 188, 'province_id' => 15, 'name' => 'Kab. Gianyar'],
            ['id' => 189, 'province_id' => 15, 'name' => 'Kab. Tabanan'],
            ['id' => 190, 'province_id' => 15, 'name' => 'Kab. Buleleng'],
            ['id' => 191, 'province_id' => 15, 'name' => 'Kota Denpasar'],
            // Nusa Tenggara Barat
            ['id' => 192, 'province_id' => 16, 'name' => 'Kab. Lombok Barat'],
            ['id' => 193, 'province_id' => 16, 'name' => 'Kab. Lombok Tengah'],
            ['id' => 194, 'province_id' => 16, 'name' => 'Kab. Lombok Timur'],
            ['id' => 195, 'province_id' => 16, 'name' => 'Kab. Sumbawa'],
            ['id' => 196, 'province_id' => 16, 'name' => 'Kota Mataram'],
            // Nusa Tenggara Timur
            ['id' => 197, 'province_id' => 17, 'name' => 'Kab. Kupang'],
            ['id' => 198, 'province_id' => 17, 'name' => 'Kab. Timor Tengah Selatan'],
            ['id' => 199, 'province_id' => 17, 'name' => 'Kab. Belu'],
            ['id' => 200, 'province_id' => 17, 'name' => 'Kab. Sikka'],
            ['id' => 201, 'province_id' => 17, 'name' => 'Kab. Ende'],
            ['id' => 202, 'province_id' => 17, 'name' => 'Kab. Ngada'],
            ['id' => 203, 'province_id' => 17, 'name' => 'Kab. Nagekeo'],
            ['id' => 204, 'province_id' => 17, 'name' => 'Kab. Flores Timur'],
            ['id' => 205, 'province_id' => 17, 'name' => 'Kota Kupang'],
            // Maluku
            ['id' => 206, 'province_id' => 18, 'name' => 'Kab. Maluku Tengah'],
            ['id' => 207, 'province_id' => 18, 'name' => 'Kab. Maluku Tenggara'],
            ['id' => 208, 'province_id' => 18, 'name' => 'Kab. Buru'],
            ['id' => 209, 'province_id' => 18, 'name' => 'Kab. Seram Bagian Timur'],
            ['id' => 210, 'province_id' => 18, 'name' => 'Kab. Seram Bagian Barat'],
            ['id' => 211, 'province_id' => 18, 'name' => 'Kota Ambon'],
            // Maluku Utara
            ['id' => 212, 'province_id' => 19, 'name' => 'Kab. Halmahera Selatan'],
            ['id' => 213, 'province_id' => 19, 'name' => 'Kab. Halmahera Utara'],
            ['id' => 214, 'province_id' => 19, 'name' => 'Kab. Pulau Morotai'],
            ['id' => 215, 'province_id' => 19, 'name' => 'Kab. Kepulauan Sula'],
            ['id' => 216, 'province_id' => 19, 'name' => 'Kab. Tidore Kepulauan'],
            ['id' => 217, 'province_id' => 19, 'name' => 'Kota Ternate'],
            ['id' => 218, 'province_id' => 19, 'name' => 'Kota Sofifi'],
            // Papua
            ['id' => 219, 'province_id' => 20, 'name' => 'Kab. Jayapura'],
            ['id' => 220, 'province_id' => 20, 'name' => 'Kab. Keerom'],
            ['id' => 221, 'province_id' => 20, 'name' => 'Kab. Sarmi'],
            ['id' => 222, 'province_id' => 20, 'name' => 'Kab. Mappi'],
            ['id' => 223, 'province_id' => 20, 'name' => 'Kab. Asmat'],
            ['id' => 224, 'province_id' => 20, 'name' => 'Kab. Boven Digoel'],
            ['id' => 225, 'province_id' => 20, 'name' => 'Kab. Merauke'],
            ['id' => 226, 'province_id' => 20, 'name' => 'Kota Jayapura'],
            // Papua Barat
            ['id' => 227, 'province_id' => 21, 'name' => 'Kab. Sorong'],
            ['id' => 228, 'province_id' => 21, 'name' => 'Kab. Manokwari'],
            ['id' => 229, 'province_id' => 21, 'name' => 'Kab. Raja Ampat'],
            ['id' => 230, 'province_id' => 21, 'name' => 'Kab. Teluk Bintuni'],
            ['id' => 231, 'province_id' => 21, 'name' => 'Kota Sorong'],
            ['id' => 232, 'province_id' => 21, 'name' => 'Kota Manokwari'],
        ];

        foreach ($regencies as $regency) {
            Regency::create($regency);
        }
    }
}
