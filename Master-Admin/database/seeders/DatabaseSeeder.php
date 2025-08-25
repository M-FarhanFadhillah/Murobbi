<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\activity;
use App\Models\admins;
use App\Models\data_ziswaf;
use App\Models\jenis_ziswaf;
use App\Models\User;
use App\Models\banner;
use App\Models\masjid;
use App\Models\education;
use App\Models\jenis_education;
use App\Models\waktu_sholat;
use App\Models\absensi_sholat;
use App\Models\lap_keu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Muhammad Faiz',
        //     'email' => 'faizgo@gmail.com',
        //     'no_hp' => '081278781234',
        //     'profil_pict' => 'test123',
        //     'password' => 'qwerty123'
        // ]);

        admins::create([
            'name' => 'Master Admin',
            'email' => 'madmin@gmail.com',
            'no_hp' => '081371610786',
            'profil_pict' => 'test123',
            'password' => 'qwerty123'
        ]);
        User::create([
            'name' => 'Muhammad Faiz',
            'email' => 'faizgo@gmail.com',
            'no_hp' => '081278781234',
            'profil_pict' => 'test123',
            'password' => 'qwerty123'
        ]);
        User::create([
            'name' => 'Fadhil Fadhillah',
            'email' => 'ffadhil@gmail.com',
            'no_hp' => '080056781234',
            'profil_pict' => 'test123',
            'password' => 'qwerty123'
        ]);
        User::create([
            'name' => 'Syahril Fajri Pratama',
            'email' => 'syahril799@gmail.com',
            'no_hp' => '081994854907',
            'profil_pict' => 'test123',
            'password' => 'qwerty123'
        ]);
        User::create([
            'name' => 'Ahmad Alfarizi',
            'email' => 'ahmadkun@gmail.com',
            'no_hp' => '083499812234',
            'profil_pict' => 'test123',
            'password' => 'qwerty123'
        ]);
            
        waktu_sholat::create([
            'nama_sholat' => 'Subuh',
            'waktu_sholat' => '04:22:00'
        ]);
        waktu_sholat::create([
            'nama_sholat' => 'Dzuhur',
            'waktu_sholat' => '11:56:00'
        ]);
        waktu_sholat::create([
            'nama_sholat' => 'Ashar',
            'waktu_sholat' => '14:50:00'
        ]);
        waktu_sholat::create([
            'nama_sholat' => 'Mahgrib',
            'waktu_sholat' => '17:53:00'
        ]);
        waktu_sholat::create([
            'nama_sholat' => 'Isya',
            'waktu_sholat' => '19:01:00'
        ]);
            
        absensi_sholat::create([
            'waktu_sholat_id' => 1,
            'users_id' => 2,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 2,
            'users_id' => 2,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 3,
            'users_id' => 2,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 4,
            'users_id' => 2,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 5,
            'users_id' => 2,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
            
        absensi_sholat::create([
            'waktu_sholat_id' => 1,
            'users_id' => 1,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 2,
            'users_id' => 1,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 3,
            'users_id' => 1,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 4,
            'users_id' => 1,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
        absensi_sholat::create([
            'waktu_sholat_id' => 5,
            'users_id' => 1,
            'status_sholat' => 'Berjamaah',
            'lokasi_sholat' => 'Masjid'
        ]);
            
        masjid::create([
            'masjid_name'=>'An-Nisa',
            'masjid_pict'=>'test123',
            'alamat'=>'Pesawaran, Lampung',
            'ketua_masjid'=>'Muhammad Fakhri',
            'kapasitas'=>500,
            'saldo_awal'=>35000000.00,
            'kas'=>35000000.00
        ]);
        masjid::create([
            'masjid_name'=>'An-Nahl',
            'masjid_pict'=>'test123',
            'alamat'=>'Bandar Lampung, Lampung',
            'ketua_masjid'=>'Ahmad Faridz',
            'kapasitas'=>1500,
            'saldo_awal'=>8000000.00,
            'kas'=>8000000.00
        ]);
        masjid::create([
            'masjid_name'=>'Al-Wasii',
            'masjid_pict'=>'test123',
            'alamat'=>'Bandar Lampung, Lampung',
            'ketua_masjid'=>'Ahmad Al-Farizi',
            'kapasitas'=>700,
            'saldo_awal'=>13000000.00,
            'kas'=>13000000.00
        ]);
        masjid::create([
            'masjid_name'=>'Al-Muttaqin',
            'masjid_pict'=>'test123',
            'alamat'=>'Palembang, Sumatera Selatan',
            'ketua_masjid'=>'Zikrullah',
            'kapasitas'=>1200,
            'saldo_awal'=>10000000.00,
            'kas'=>10000000.00
        ]);

        data_ziswaf::create([
            'masjid_id'=>1,
            'users_id'=>1,
            'jenis_ziswaf_id'=>1,
            'asal_bank'=>'Bank Mandiri',
            'no_rek'=>1234,
            'nominal'=>10000000.00,
        ]);
        data_ziswaf::create([
            'masjid_id'=>1,
            'users_id'=>1,
            'jenis_ziswaf_id'=>2,
            'asal_bank'=>'Bank Mandiri',
            'no_rek'=>1234,
            'nominal'=>10000000.00,
        ]);
        data_ziswaf::create([
            'masjid_id'=>1,
            'users_id'=>1,
            'jenis_ziswaf_id'=>3,
            'asal_bank'=>'Bank Mandiri',
            'no_rek'=>1234,
            'nominal'=>10000000.00,
        ]);
        data_ziswaf::create([
            'masjid_id'=>1,
            'users_id'=>1,
            'jenis_ziswaf_id'=>4,
            'asal_bank'=>'Bank Mandiri',
            'no_rek'=>1234,
            'nominal'=>10000000.00,
        ]);

        activity::create([
            'masjid_id'=> 1,
            'activity_name'=>'Pengajian Bersama',
            'decription'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?',
            'pict'=>'test123',
            'categories'=> 0
        ]);
        activity::create([
            'masjid_id'=> 1,
            'activity_name'=>'Kajian Bersama',
            'decription'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?',
            'pict'=>'test123',
            'categories'=> 1
        ]);
        activity::create([
            'masjid_id'=> 2,
            'activity_name'=>'Tabligh Akbar',
            'decription'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?',
            'pict'=>'test123',
            'categories'=> 2
        ]);
        activity::create([
            'masjid_id'=> 3,
            'activity_name'=>'Bazaar UMKM',
            'decription'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?',
            'pict'=>'test123',
            'categories'=> 2
        ]);

        lap_keu::create([
            'masjid_id'=> 1,
            'cashflow'=>1,
            'note'=>'Beli Semen 2 Sak',
            'date'=> '2023-10-15',
            'nominal'=>1000000.00
        ]);
        lap_keu::create([
            'masjid_id'=> 1,
            'cashflow'=>0,
            'note'=>'Uang Kaleng',
            'date'=> '2023-10-16',
            'nominal'=>500000.00
        ]);
        lap_keu::create([
            'masjid_id'=> 1,
            'cashflow'=>0,
            'note'=>'Uang Kaleng',
            'date'=> '2023-10-17',
            'nominal'=>700000.00
        ]);
            
        banner::create([
            'judul'=>'Promo Al-Quran Tajdwid Lengkap Dics. up to 50%',
            'deskripsi'=>'Lorem ipsum dolor, sit amet. vero illum placeat itaque ratione porro unde debitis alias explicabo officiis ipsam sequi quae, consectetur quis! In tenetur amet quas facere, delectus facilis iusto temporibus vitae animi! Corrupti a quasi exercitationem ab voluptatum voluptate!',
            'cover'=>'test123',
            'kategori'=>1
        ]);
        banner::create([
            'judul'=>'Tips n Trick Menghafal Alquran',
            'deskripsi'=>'Lorem ipsum dolor, sit amet. vero illum placeat itaque ratione porro unde debitis alias explicabo officiis ipsam sequi quae, consectetur quis! In tenetur amet quas facere, delectus facilis iusto temporibus vitae animi! Corrupti a quasi exercitationem ab voluptatum voluptate!',
            'cover'=>'test123',
            'kategori'=>0
        ]);
        banner::create([
            'judul'=>'Tabligh Akbar Bersama Ustadz UAS',
            'deskripsi'=>'Lorem ipsum dolor, sit amet. vero illum placeat itaque ratione porro unde debitis alias explicabo officiis ipsam sequi quae, consectetur quis! In tenetur amet quas facere, delectus facilis iusto temporibus vitae animi! Corrupti a quasi exercitationem ab voluptatum voluptate!',
            'cover'=>'test123',
            'kategori'=>2
        ]);
            
        education::create([
            'jenis_education_id'=>2,
            'judul'=>'Cara Menjadi Ayah yang Baik',
            'deskripsi'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores blanditiis nostrum possimus a ab.Dolore omnis vero illum placeat itaque ratione porro unde debitis alias explicabo officiis ipsam.',
            'content'=>'test123',
            'kategori'=> 2
        ]);
        education::create([
            'jenis_education_id'=>2,
            'judul'=>'Kisah Rasulallah Remaja',
            'deskripsi'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores blanditiis nostrum possimus a ab.Dolore omnis vero illum placeat itaque ratione porro unde debitis alias explicabo officiis ipsam.',
            'content'=>'test123',
            'kategori'=> 1
        ]);
        education::create([
            'jenis_education_id'=>1,
            'judul'=>'Cara Mengaji dengan Baik',
            'deskripsi'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores blanditiis nostrum possimus a ab.',
            'content'=>'test123',
            'kategori'=> 0
        ]);
            
        jenis_education::create([
            'jenis_edukasi'=>'Buku',
            'slug'=>'buku'
        ]);
        jenis_education::create([
            'jenis_edukasi'=>'Video',
            'slug'=>'video'
        ]);

        jenis_ziswaf::create([
            'jenis_ziswaf'=>'Zakat',
            'slug'=>'zakat'
        ]);
        jenis_ziswaf::create([
            'jenis_ziswaf'=>'Infaq',
            'slug'=>'infaq'
        ]);
        jenis_ziswaf::create([
            'jenis_ziswaf'=>'Shodaqoh',
            'slug'=>'shodaqoh'
        ]);
        jenis_ziswaf::create([
            'jenis_ziswaf'=>'Wakaf',
            'slug'=>'wakaf'
        ]);
        
    }
}
