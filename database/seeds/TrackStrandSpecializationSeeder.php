<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class TrackStrandSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //tracks
        $TechVoc = DB::table('tracks')->insert([
            'track' => 'Tech-Voc'
            ]);

        //strands
        $IA = DB::table('strands')->insert(
            ['strand' => '(IA) Industrial Arts',
            'track_id' => $TechVoc->id],
        );
        $HE = DB::table('strands')->insert(
            ['strand' => '(HE) Home Economics',
            'track_id' => $TechVoc->id],
        );
        $ICT = DB::table('strands')->insert(
            ['strand' => '(ICT) Information and Communication Technology',
            'track_id' => $TechVoc->id]
        );

        //specializations - IA Strand
        $IA_Automotive = DB::table('specializations')->insert(
            ['strand' => 'Automotive Servicing NC I',
            'strand_id' => $IA->id],
        );
        $IA_Electronic = DB::table('specializations')->insert(
            ['strand' => 'Electronic Products Assembly and Servicing NC II',
            'strand_id' => $IA->id],
        );
        $IA_Electrical = DB::table('specializations')->insert(
            ['strand' => 'Electrical Installation and Maintenance NC II',
            'strand_id' => $IA->id],
        );

        //specializations - HE Strand
        $HE_Housekeeping = DB::table('specializations')->insert(
            ['strand' => 'Housekeeping NC II',
            'strand_id' => $HE->id],
        );
        $HE_Front_2 = DB::table('specializations')->insert(
            ['strand' => 'Front Office Service NC II',
            'strand_id' => $HE->id],
        );
        $HE_Food = DB::table('specializations')->insert(
            ['strand' => 'Food and Beverage Service NC II',
            'strand_id' => $HE->id],
        );
        $HE_Bread = DB::table('specializations')->insert(
            ['strand' => 'Bread and Pastry Production NC II',
            'strand_id' => $HE->id],
        );

        //specializations - ICT Strand
        $ICT_Computer = DB::table('specializations')->insert(
            ['strand' => 'Computer System Servicing NC II',
            'strand_id' => $ICT->id],
        );


    }
}
