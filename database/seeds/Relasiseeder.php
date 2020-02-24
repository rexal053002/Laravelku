<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class Relasiseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Menghapus semua Sample Data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        //Membuat data Dosen
        $dosen = Dosen::create([
            'nama'=>'Abdi',
            'nipd'=>'1234567890'
        ]);

        //Mmebuat Data Mahasiswa
        $Dadang = Mahasiswa::create([
            'nama'=>'Dadang',
            'nim'=>'54545454',
            'id_dosen'=>$dosen->id
        ]);
        $this->command->info('Data Dosen Berhasil dibuat');

        $Iki = Mahasiswa::create([
            'nama'=>'Iki',
            'nim'=>'32323232',
            'id_dosen'=>$dosen->id
        ]);

        $Sina = Mahasiswa::create([
            'nama'=>'Sina',
            'nim'=>'010101012',
            'id_dosen'=>$dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil dibuat');

        //Membuat Data Wali
        $ahmad = Wali::create([
            'nama'=>'Ahmad',
            'id_mahasiswa'=>$Dadang->id
        ]);

        $ahmad = Wali::create([
            'nama'=>'Aka',
            'id_mahasiswa'=>$Iki->id
        ]);

        $ahmad = Wali::create([
            'nama'=>'Fana',
            'id_mahasiswa'=>$Sina->id
        ]);
        $this->command->info('Data Wali Berhasil dibuat');

        //Membuat Data Hobi
        $mancing = Hobi::create([
            'hobi'=>'Mancing Keributan'
        ]);

        $mengaji = Hobi::create([
            'hobi'=>'Mancing Pahala'
        ]);

        $gaming = Hobi::create([
            'hobi'=>'Dakwah Gaming'
        ]);

        //Keterampilan Hobi ke Mahasiswa
        $Dadang->hobi()->attach($mancing->id);
        $Iki->hobi()->attach($mengaji->id);
        $Sina->hobi()->attach($gaming->id);
        $Sina->hobi()->attach($mengaji->id);
        $Iki->hobi()->attach($mancing->id);
        $this->command->info('Data Hobi Mahasiswa Berhasil dibuat');
    }
}
