<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Hobi;
use App\Mahasiswa;
use App\wali;
class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('dosens')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();
    
        //Membuat Data Dosen
        $dosen = Dosen::create(array('nipd' => '1234567890', 'nama' => 'Abdul Musthafa'));
        $this->command->info('Data Dosen Telah Di Isi');

        // Membuat Data Mahasiswa
        $irsyal = Mahasiswa::create(array(
            'nama' => 'Syahrul',
            'nim' => '1010101',
            'id_dosen' => $dosen->id
        ));

        $Ntut = Mahasiswa::create(array(
            'nama' => 'Entut Marsinah',
            'nim' => '1010102',
            'id_dosen' => $dosen->id
        ));

        $Icih = Mahasiswa::create(array(
            'nama' => 'Icih Bercin',
            'nim' => '1010103',
            'id_dosen' => $dosen->id
        ));

        $this->command->info('Data Mahasiswa berhasil diisi!');

        // Membuat Wali
        $dadang = Wali::create(array(
            'nama' => 'Dadang peloy',
            'id_mahasiswa' => $irsyal->id
        ));

        $ucup = Wali::create(array(
            'nama' => 'Ucup Mambo',
            'id_mahasiswa' => $Ntut->id
        ));

        $agus = Wali::create(array(
            'nama' => 'Agus pepsoden',
            'id_mahasiswa' => $Icih->id
        ));
        $this->command->info('Data Wali berhasil diisi!');
    
        //Membuat Data Hobi
        $melukis_langit = Hobi::create(array('hobi' => 'Melukis Langit'));
        $mandi_hujan = Hobi::create(array('hobi' => 'Mandi Hujan'));
        $ambyar = Hobi::create(array('hobi' => 'Stalking Mantan'));

        $irsyal->hobi()->attach($melukis_langit->id);
        // attach -> melampirkan data baru ke table pivot
        // sync -> menguptade data di table pivot(bantuan)
        $irsyal->hobi()->attach($ambyar->id);
        $Ntut->hobi()->attach($mandi_hujan->id);
        $Icih->hobi()->attach($ambyar->id);

        $this->command->info('mahasiswa beserta Hobi Telah disi');
        
    }
}
