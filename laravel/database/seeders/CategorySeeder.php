<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Plastik',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-cup-fill',
                'description' => 'Sampah plastik adalah limbah yang terbuat dari bahan polimer sintetis. Plastik membutuhkan waktu ratusan tahun untuk terurai dan menjadi salah satu penyebab utama pencemaran lingkungan, terutama di lautan.',
                'recommendation' => 'Pisahkan plastik berdasarkan jenisnya (PET, HDPE, PP, dll). Cuci plastik sebelum didaur ulang. Setorkan ke bank sampah atauTPS terdekat. Kurangi penggunaan plastik sekali pakai. Gunakan kembali botol dan wadah plastik yang masih layak.',
            ],
            [
                'name' => 'Kertas',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-file-earmark-fill',
                'description' => 'Sampah kertas berasal dari kertas bekas seperti koran, majalah, kardus, dan kertas HVS. Kertas dapat didaur ulang hingga 5-7 kali sebelum seratnya habis.',
                'recommendation' => 'Kumpulkan kertas dalam keadaan kering dan bersih. Lipat rapi kardus agar mudah ditumpuk. Pisahkan dari sampah basah dan makanan. Manfaatkan sisi kosong kertas untuk catatan. Setorkan ke pengepul atau bank sampah.',
            ],
            [
                'name' => 'Kaca',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-cup-straw',
                'description' => 'Sampah kaca meliputi botol, gelas, dan pecahan kaca lainnya. Kaca 100% dapat didaur ulang tanpa kehilangan kualitas dan tidak menyerap air.',
                'recommendation' => 'Bungkus pecahan kaca dengan kertas atau kain sebelum dibuang. Pisahkan berdasarkan warna (bening, hijua, coklat). Masukkan ke wadah khusus kaca. Gunakan kembali botol kaca untuk wadah penyimpanan. Jangan mencampur kaca pecah dengan sampah lain.',
            ],
            [
                'name' => 'Kain',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-handbag-fill',
                'description' => 'Sampah kain meliputi pakaian bekas, kain perca, dan limbah tekstil dari industri garmen. Tekstil membutuhkan waktu puluhan tahun untuk terurai di TPA.',
                'recommendation' => 'Donasikan pakaian yang masih layak pakai. Gunakan kain bekas sebagai lap pembersih. Pisahkan berdasarkan jenis serat (katun, polyester). Setorkan ke pengepul kain bekas. Manfaatkan sebagai bahan kerajinan atau tas belanja.',
            ],
            [
                'name' => 'Logam',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-hdd-fill',
                'description' => 'Sampah logam meliputi kaleng aluminium, kaleng besi, dan limbah logam lainnya. Logam adalah salah satu material yang paling mudah didaur ulang dan nilai jualnya cukup tinggi.',
                'recommendation' => 'Kaleng bekas dapat dijual ke pengepul. Bersihkan logam dari sisa makanan sebelum disimpan. Pisahkan aluminium dari besi karena proses daur ulangnya berbeda. Jangan bakar sampah logam. Manfaatkan kembali logam yang masih layak pakai.',
            ],
            [
                'name' => 'Elektronik',
                'type' => 'B3',
                'bin_color' => 'Merah',
                'recyclable' => 'Tidak',
                'icon' => 'bi-cpu-fill',
                'description' => 'Limbah elektronik (e-waste) meliputi gadget, komputer, televisi, dan perangkat elektronik bekas. Mengandung bahan berbahaya seperti merkuri, timbal, dan kadmium yang dapat mencemari tanah dan air.',
                'recommendation' => 'Bawa ke tempat penjualan e-waste resmi atau Dinas LH. Jangan dibakar karena mengandung bahan beracun. Pisahkan baterai dari perangkat. Serahkan ke pusat daur ulang elektronik (TPS3R). Jangan buang ke tempat sampah biasa.',
            ],
            [
                'name' => 'Organik',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-flower1',
                'description' => 'Sampah organik adalah limbah yang berasal dari makhluk hidup dan mudah terurai secara alami. Contohnya termasuk sisa makanan, dedaunan, dan potongan rumput.',
                'recommendation' => 'Olah menjadi kompos menggunakan komposter. Pisahkan dari sampah anorganik. Gunakan sebagai pupuk tanaman di pekarangan. Masukkan ke lubang biopori. Jangan campur dengan plastik atau logam.',
            ],
            [
                'name' => 'B3',
                'type' => 'B3',
                'bin_color' => 'Merah',
                'recyclable' => 'Tidak',
                'icon' => 'bi-exclamation-triangle-fill',
                'description' => 'Limbah Bahan Berbahaya dan Beracun (B3) meliputi baterai bekas, lampu neon, obat kedaluwarsa, pestisida, dan cat. Limbah B3 dapat mencemari lingkungan dan membahayakan kesehatan.',
                'recommendation' => 'Gunakan tempat sampah khusus berwarna merah. Jangan dibakar atau ditumpuk sembarangan. Serahkan ke TPS B3 terdekat. Gunakan APD saat menangani limbah B3. Jauhkan dari jangkauan anak-anak dan hewan peliharaan.',
            ],
            [
                'name' => 'Cangkang Telur',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-egg-fill',
                'description' => 'Cangkang telur merupakan limbah organik yang kaya akan kalsium. Dapat dimanfaatkan sebagai pupuk alami atau bahan tambahan kompos untuk menyuburkan tanah.',
                'recommendation' => 'Cuci dan keringkan cangkang telur sebelum dikomposkan. Hancurkan menjadi serpihan kecil agar cepat terurai. Campurkan ke dalam kompos sebagai sumber kalsium. Gunakan sebagai pupuk untuk tanaman berbunga. Jangan buang ke saluran air karena dapat menyumbat.',
            ],
            [
                'name' => 'Kardus',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-box-fill',
                'description' => 'Kardus bekas merupakan jenis sampah kertas tebal yang banyak digunakan untuk kemasan. Kardus sangat mudah didaur ulang dan memiliki nilai ekonomis yang baik.',
                'recommendation' => 'Lipat rapi kardus bekas agar hemat tempat. Pastikan kardus dalam keadaan kering dan bersih dari sisa makanan. Lepas selotip dan stiker sebelum didaur ulang. Kumpulkan dalam jumlah banyak untuk dijual ke pengepul. Manfaatkan kembali untuk penyimpanan barang.',
            ],
            [
                'name' => 'Karet',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-circle-fill',
                'description' => 'Sampah karet meliputi ban bekas, sarung tangan karet, dan limbah karet industri. Karet sulit terurai dan jika dibakar akan menghasilkan polusi udara berbahaya.',
                'recommendation' => 'Jangan bakar sampah karet karena menghasilkan asap beracun. Ban bekas dapat dimanfaatkan sebagai pot tanaman atau ayunan. Serahkan ke daur ulang karet. Gunakan kembali jika masih layak. Pisahkan dari sampah organik.',
            ],
            [
                'name' => 'Kayu',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Ya',
                'icon' => 'bi-tree-fill',
                'description' => 'Sampah kayu meliputi potongan kayu bekas, ranting, serbuk gergaji, dan limbah kayu dari konstruksi atau perabotan. Kayu organik namun bisa didaur ulang menjadi produk baru.',
                'recommendation' => 'Manfaatkan kayu bekas untuk kerajinan atau furnitur. Gunakan potongan kecil sebagai mulsa tanaman. Serahkan ke pengolahan kayu bekas. Jangan bakar karena menghasilkan polusi udara. Gunakan serbuk gergaji untuk kompos.',
            ],
            [
                'name' => 'Kertas',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Ya',
                'icon' => 'bi-file-earmark-fill',
                'description' => 'Sampah kertas berasal dari kertas bekas seperti koran, majalah, kardus, dan kertas HVS. Kertas dapat didaur ulang hingga 5-7 kali sebelum seratnya habis.',
                'recommendation' => 'Kumpulkan kertas dalam keadaan kering dan bersih. Lipat rapi kardus agar mudah ditumpuk. Pisahkan dari sampah basah dan makanan. Manfaatkan sisi kosong kertas untuk catatan. Setorkan ke pengepul atau bank sampah.',
            ],
            [
                'name' => 'Kotoran Hewan',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-bug-fill',
                'description' => 'Kotoran hewan peliharaan seperti anjing dan kucing merupakan limbah organik yang perlu dikelola dengan benar agar tidak mencemari lingkungan dan sumber air bersih.',
                'recommendation' => 'Bungkus kotoran hewan sebelum dibuang ke tempat sampah. Jangan buang ke saluran air atau sungai. Komposkan kotoran hewan peliharaan khusus. Gunakan sarung tangan saat membersihkan. Cuci tangan setelah kontak dengan kotoran hewan.',
            ],
            [
                'name' => 'Sepatu',
                'type' => 'Anorganik',
                'bin_color' => 'Kuning',
                'recyclable' => 'Tidak',
                'icon' => 'bi-boot-fill',
                'description' => 'Sepatu bekas terbuat dari campuran bahan kulit, karet, dan sintetis yang sulit dipisahkan untuk daur ulang. Membutuhkan waktu sangat lama untuk terurai di TPA.',
                'recommendation' => 'Donasikan sepatu yang masih layak pakai. Manfaatkan sepatu bekas sebagai pot tanaman. Kumpulkan ke program daur ulang sepatu. Jangan buang sembarangan karena sulit terurai. Manfaatkan sol sepatu bekas untuk keperluan lain.',
            ],
            [
                'name' => 'Sisa Buah',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-apple',
                'description' => 'Sisa buah seperti kulit buah, biji, dan potongan buah yang tidak terpakai merupakan sampah organik yang mudah terurai. Dapat dijadikan pupuk kompos yang sangat baik.',
                'recommendation' => 'Masukkan ke komposter untuk dijadikan pupuk. Buat eco enzyme dari sisa buah. Pisahkan dari sampah anorganik. Manfaatkan sebagai pakan cacing untuk vermikompos. Jangan buang ke sungai karena dapat mencemari air.',
            ],
            [
                'name' => 'Sisa Teh Kopi',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-cup-fill',
                'description' => 'Sisa teh dan kopi (ampas) merupakan limbah organik rumah tangga yang dihasilkan setelah penyeduhan. Ampas kopi kaya akan nitrogen dan baik untuk tanaman.',
                'recommendation' => 'Gunakan ampas kopi sebagai pupuk tanaman hias. Manfaatkan sebagai pengusir alami serangga. Campurkan ke kompos untuk memperkaya nutrisi. Gunakan ampas teh sebagai pembersih alami wajan. Keringkan ampas sebelum dijadikan pupuk.',
            ],
            [
                'name' => 'Sisa Makanan',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-fork-knife',
                'description' => 'Sisa makanan termasuk nasi, lauk pauk, dan sisa dapur yang tidak termakan. Merupakan salah satu komponen terbesar sampah rumah tangga yang dapat menghasilkan gas metana jika terurai di TPA.',
                'recommendation' => 'Olah sisa makanan menjadi kompos atau eco enzyme. Masukkan ke komposter rumah tangga. Pisahkan dari kemasan plastik. Kurangi sisa makanan dengan memasak secukupnya. Manfaatkan sebagai pakan ternak jika memungkinkan.',
            ],
            [
                'name' => 'Styrofoam',
                'type' => 'Anorganik',
                'bin_color' => 'Merah',
                'recyclable' => 'Tidak',
                'icon' => 'bi-box-fill',
                'description' => 'Styrofoam (gabus) adalah kemasan dari polistirena yang sangat sulit terurai. Dibutuhkan lebih dari 500 tahun untuk terurai dan menghasilkan mikroplastik yang berbahaya bagi laut.',
                'recommendation' => 'Hindari penggunaan styrofoam. Ganti dengan wadah kertas atau reusable. Kumpulkan styrofoam bekas untuk didaur ulang. Jangan bakar karena menghasilkan racun. Serahkan ke TPS3R yang menerima styrofoam.',
            ],
            [
                'name' => 'Tumbuhan',
                'type' => 'Organik',
                'bin_color' => 'Hijau',
                'recyclable' => 'Tidak',
                'icon' => 'bi-flower2',
                'description' => 'Sampah tumbuhan meliputi daun kering, ranting, rumput potong, dan sisa tanaman dari kebun atau pekarangan. Merupakan sampah organik yang mudah terurai secara alami.',
                'recommendation' => 'Komposkan daun dan ranting kering. Manfaatkan sebagai mulsa penutup tanah. Buat eco enzyme dari sisa tanaman. Gunakan sebagai bahan vermikompos. Manfaatkan untuk menutup lahan kosong guna mencegah erosi.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}