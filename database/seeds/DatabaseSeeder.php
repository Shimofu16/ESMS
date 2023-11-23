<?php

use Database\Seeders\SubjectSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('grade_levels')->insert([
            'grade_level' => 'Grade 11'
        ]);
        DB::table('grade_levels')->insert([
            'grade_level' => 'Grade 12'
        ]);
        DB::table('sems')->insert([
            'sem' => '1',
        ]);
        DB::table('sems')->insert([
            'sem' => '2',
        ]);
        DB::table('school_years')->insert([
            'school_year' => '2022-2023',
        ]);
        DB::table('active__school_year_and_sems')->insert([
            'active_SY_id' => '1',
            'active_sem_id' => '1',
        ]);

        //tracks
        $TechVoc = DB::table('tracks')->insert([
            'track' => 'Tech-Voc'
        ]);

        //strands
        $IA = DB::table('strands')->insert(
            [
                'strand' => '(IA) Industrial Arts',
                'track_id' => '1'
            ],
        );
        $HE = DB::table('strands')->insert(
            [
                'strand' => '(HE) Home Economics',
                'track_id' => '1'
            ],
        );
        $ICT = DB::table('strands')->insert(
            [
                'strand' => '(ICT) Information and Communication Technology',
                'track_id' => '1'
            ]
        );

        //specializations - IA Strand
        $IA_Automotive = DB::table('specializations')->insert(
            [
                'specialization' => 'Automotive Servicing NC I',
                'strand_id' => '1'
            ],
        );
        $IA_Electronic = DB::table('specializations')->insert(
            [
                'specialization' => 'Electronic Products Assembly and Servicing NC II',
                'strand_id' => '1'
            ],
        );
        $IA_Electrical = DB::table('specializations')->insert(
            [
                'specialization' => 'Electrical Installation and Maintenance NC II',
                'strand_id' => '1'
            ],
        );

        //specializations - HE Strand
        $HE_Housekeeping = DB::table('specializations')->insert(
            [
                'specialization' => 'Housekeeping NC II',
                'strand_id' => '2'
            ],
        );
        $HE_Front = DB::table('specializations')->insert(
            [
                'specialization' => 'Front Office Service NC II',
                'strand_id' => '2'
            ],
        );
        $HE_Food = DB::table('specializations')->insert(
            [
                'specialization' => 'Food and Beverage Service NC II',
                'strand_id' => '2'
            ],
        );
        $HE_Bread = DB::table('specializations')->insert(
            [
                'specialization' => 'Bread and Pastry Production NC II',
                'strand_id' => '2'
            ],
        );

        //specializations - ICT Strand
        $ICT_Computer = DB::table('specializations')->insert(
            [
                'specialization' => 'Computer System Servicing NC II',
                'strand_id' => '3'
            ],
        );




        //seeder roles adn permission
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Dashboard Permission']);
        Permission::create(['name' => 'Enrollment Permission']);
        Permission::create(['name' => 'Student Records Permission']);
        Permission::create(['name' => 'Accounting Permission']);
        Permission::create(['name' => 'Reports Permission']);
        Permission::create(['name' => 'Section Permission']);
        Permission::create(['name' => 'Add Graduates Permission']);
        Permission::create(['name' => 'System Maintenance Permission']);
        Permission::create(['name' => 'Register User Permission']);
        Permission::create(['name' => 'Subject Management Permission']);
        Permission::create(['name' => 'Schedule Management Permission']);
        Permission::create(['name' => 'View Teacher Schedule Permission']);
        Permission::create(['name' => 'Teacher Management Permission']);
        Permission::create(['name' => 'User Management Permission']);


        // create roles and assign existing permissions
        $roleRegistrar = Role::create(['name' => 'Registrar']);
        $roleRegistrar->givePermissionTo('Dashboard Permission');
        $roleRegistrar->givePermissionTo('Enrollment Permission');
        $roleRegistrar->givePermissionTo('Student Records Permission');
        $roleRegistrar->givePermissionTo('Section Permission');
        $roleRegistrar->givePermissionTo('Add Graduates Permission');
        $roleRegistrar->givePermissionTo('Reports Permission');
        $roleRegistrar->givePermissionTo('System Maintenance Permission');

        $roleRegistrar->givePermissionTo('Subject Management Permission');
        $roleRegistrar->givePermissionTo('Schedule Management Permission');


        $roleAccounting = Role::create(['name' => 'Accounting']);
        $roleAccounting->givePermissionTo('Dashboard Permission');
        $roleAccounting->givePermissionTo('Accounting Permission');


        $roleTeacher = Role::create(['name' => 'Teacher']);
        $roleTeacher->givePermissionTo('Dashboard Permission');
        $roleTeacher->givePermissionTo('Student Records Permission');

        $roleTeacher->givePermissionTo('View Teacher Schedule Permission');


        $roleDirector = Role::create(['name' => 'Director']);
        $roleDirector->givePermissionTo('Dashboard Permission');
        $roleDirector->givePermissionTo('Enrollment Permission');
        $roleDirector->givePermissionTo('Student Records Permission');
        $roleDirector->givePermissionTo('Section Permission');
        $roleDirector->givePermissionTo('Add Graduates Permission');
        $roleDirector->givePermissionTo('Accounting Permission');
        $roleDirector->givePermissionTo('Reports Permission');
        $roleDirector->givePermissionTo('System Maintenance Permission');
        $roleDirector->givePermissionTo('Register User Permission');

        $roleDirector->givePermissionTo('Subject Management Permission');
        $roleDirector->givePermissionTo('Schedule Management Permission');
        $roleDirector->givePermissionTo('Teacher Management Permission');
        $roleDirector->givePermissionTo('User Management Permission');

        Role::create(['name' => 'Super Admin']);

        $Admin = \App\Models\User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('password'),
        ]);

        $Admin->assignRole($roleDirector);


        $Director = \App\Models\User::create([
            'name' => 'CIT Director',
            'username' => 'Director',
            'email' => 'capellan.spc@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $Director->assignRole($roleDirector);

        $Registrar = \App\Models\User::create([
            'name' => 'Registrar',
            'username' => 'Registrar',
            'email' => 'registrar@registrar.com',
            'password' => Hash::make('password'),
        ]);

        $Registrar->assignRole($roleRegistrar);

        $Accounting = \App\Models\User::create([
            'name' => 'Accounting',
            'username' => 'Accounting',
            'email' => 'accounting@accounting.com',
            'password' => Hash::make('password'),
        ]);

        $Accounting->assignRole($roleAccounting);

        // seed subjects
        $this->call([
            SubjectSeeder::class,
        ]);
    }
}
