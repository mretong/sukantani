<?php

use Illuminate\Database\Seeder;
use App\Agensi;
use App\User;
use App\Kontinjen;
use App\Pengesahan;

class AgensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  1 => MADA
        Agensi::create([
            'nama'  => strtoupper('lembaga kemajuan pertanian muda'),
            'kod'   => strtoupper('mada'),
            'kod2'  => strtoupper('M')
        ]);

        $agensi = Agensi::where('kod', 'mada')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);

        // 2 => KADA

        Agensi::create([
            'nama'  => strtoupper('lembaga kemajuan pertanian kemubu'),
            'kod'   => strtoupper('kada'),
            'kod2'  => strtoupper('K')
        ]);

        $agensi = Agensi::where('kod', 'kada')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);

        // 3 => MARDI

        Agensi::create([
            'nama'  => strtoupper('MARDI'),
            'kod'   => strtoupper('mardi'),
            'kod2'  => strtoupper('D')
        ]);

        $agensi = Agensi::where('kod', 'mardi')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 4 => JABATAN PERTANIAN

        Agensi::create([
            'nama'  => strtoupper('jabatan pertanian'),
            'kod'   => strtoupper('doa'),
            'kod2'  => strtoupper('a')
        ]);

        $agensi = Agensi::where('kod', 'doa')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 5 => JABATAN PERIKANAN

        Agensi::create([
            'nama'  => strtoupper('jabatan PERIKANAN'),
            'kod'   => strtoupper('dof'),
            'kod2'  => strtoupper('r')
        ]);

        $agensi = Agensi::where('kod', 'dof')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);
        

        // 6 => FAMA

        Agensi::create([
            'nama'  => strtoupper('fama'),
            'kod'   => strtoupper('fama'),
            'kod2'  => strtoupper('f')
        ]);

        $agensi = Agensi::where('kod', 'fama')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 7 => LKIM

        Agensi::create([
            'nama'  => strtoupper('lkim'),
            'kod'   => strtoupper('lkim'),
            'kod2'  => strtoupper('l')
        ]);

        $agensi = Agensi::where('kod', 'lkim')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 8 => lembaga pertubuhan peladang

        Agensi::create([
            'nama'  => strtoupper('lembaga pertubuhan peladang'),
            'kod'   => strtoupper('lpp'),
            'kod2'  => strtoupper('p')
        ]);

        $agensi = Agensi::where('kod', 'lpp')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 9 => tekun

        Agensi::create([
            'nama'  => strtoupper('tekun'),
            'kod'   => strtoupper('tekun'),
            'kod2'  => strtoupper('t')
        ]);

        $agensi = Agensi::where('kod', 'tekun')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 10 => jabatan veterinar

        Agensi::create([
            'nama'  => strtoupper('jabatan veterinar'),
            'kod'   => strtoupper('dov'),
            'kod2'  => strtoupper('v')
        ]);

        $agensi = Agensi::where('kod', 'dov')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 11 => agrobank

        Agensi::create([
            'nama'  => strtoupper('Agro bank'),
            'kod'   => strtoupper('agrobank'),
            'kod2'  => strtoupper('b')
        ]);

        $agensi = Agensi::where('kod', 'agrobank')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 12 => kementerian pertanian malaysia

        Agensi::create([
            'nama'  => strtoupper('kementerian pertanian malaysia'),
            'kod'   => strtoupper('moa'),
            'kod2'  => strtoupper('c')
        ]);

        $agensi = Agensi::where('kod', 'moa')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 13 => lembaga perindustrian nanas

        Agensi::create([
            'nama'  => strtoupper('lembaga perindustrian nanas'),
            'kod'   => strtoupper('mpib'),
            'kod2'  => strtoupper('n')
        ]);

        $agensi = Agensi::where('kod', 'mpib')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama' => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);


        // 14 => maqis

        Agensi::create([
            'nama'  => strtoupper('maqis'),
            'kod'   => strtoupper('maqis'),
            'kod2'  => strtoupper('n')
        ]);

        $agensi = Agensi::where('kod', 'maqis')->first();
        $secret = $agensi->kod2 . $agensi->kod;

        User::create([
            'name'          => strtoupper($agensi->nama),
            'email'         => 'admin@' . strtolower($agensi->kod) . '.gov.my',
            'password'      => bcrypt($secret),
            'agensi_id'     => $agensi->id
        ]);

        Kontinjen::create([
            'nama'  => $agensi->nama,
            'agensi_id' => $agensi->id
        ]);

        Pengesahan::create([
            'agensi_id' => $agensi->id,
            'status'    => "TIDAK"
        ]);
        

    }
}
