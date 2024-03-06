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

        $permissions = [
            [
                'name' => toSlug('View Dashboard'),
            ],
            [
                'name' => toSlug('Manage Enrollments'),
            ],
            [
                'name' => toSlug('Manage Students'),
            ],
            [
                'name' => toSlug('Edit Student'),
            ],
            [
                'name' => toSlug('Accept Student'),
            ],
            [
                'name' => toSlug('Drop Student'),
            ],
            [
                'name' => toSlug('Manage Alumni'),
            ],
            [
                'name' => toSlug('Add Alumni'),
            ],
            [
                'name' => toSlug('Manage Dropouts'),
            ],
            [
                'name' => toSlug('Manage Accounting'),
            ],
            [
                'name' => toSlug('Manage Fees'),
            ],
            [
                'name' => toSlug('Add Fee'),
            ],
            [
                'name' => toSlug('Edit Fee'),
            ],
            [
                'name' => toSlug('Delete Fee'),
            ],
            [
                'name' => toSlug('Manage Sections'),
            ],
            [
                'name' => toSlug('Add Section'),
            ],
            [
                'name' => toSlug('Edit Section'),
            ],
            [
                'name' => toSlug('Delete Section'),
            ],
            [
                'name' => toSlug('Manage Subjects'),
            ],
            [
                'name' => toSlug('Add Subject'),
            ],
            [
                'name' => toSlug('Edit Subject'),
            ],
            [
                'name' => toSlug('Delete Subject'),
            ],
            [
                'name' => toSlug('Manage Schedules'),
            ],
            [
                'name' => toSlug('Add Schedule'),
            ],
            [
                'name' => toSlug('Edit Schedule'),
            ],
            [
                'name' => toSlug('Delete Schedule'),
            ],
            [
                'name' => toSlug('Manage Teachers'),
            ],
            [
                'name' => toSlug('Add Teacher'),
            ],
            [
                'name' => toSlug('Edit Teacher'),
            ],
            [
                'name' => toSlug('Delete Teacher'),
            ],
            [
                'name' => toSlug('Manage Users'),
            ],
            [
                'name' => toSlug('Add User'),
            ],
            [
                'name' => toSlug('Edit User'),
            ],
            [
                'name' => toSlug('Delete User'),
            ],
            [
                'name' => toSlug('Manage Transactions'),
            ],
            [
                'name' => toSlug('Add Transaction'),
            ],
            [
                'name' => toSlug('Manage Reports'),
            ],
            [
                'name' => toSlug('Manage Graduates'),
            ],
            [
                'name' => toSlug('Manage System Maintenance'),
            ],
        ];


        foreach ($permissions as $permission) {
            Permission::create($permission);
        }




        // create roles and assign existing permissions
        $roleRegistrar = Role::create(['name' => 'Registrar']);
        $roleRegistrar->givePermissionTo(toSlug('View Dashboard'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Enrollments'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Alumni'));
        $roleRegistrar->givePermissionTo(toSlug('Add Alumni'));
        $roleRegistrar->givePermissionTo(toSlug('Manage dropouts'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Students'));
        $roleRegistrar->givePermissionTo(toSlug('Edit Student'));
        $roleRegistrar->givePermissionTo(toSlug('Accept Student'));
        $roleRegistrar->givePermissionTo(toSlug('Drop Student'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Sections'));
        $roleRegistrar->givePermissionTo(toSlug('Add Section'));
        $roleRegistrar->givePermissionTo(toSlug('Edit Section'));
        $roleRegistrar->givePermissionTo(toSlug('Delete Section'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Subjects'));
        $roleRegistrar->givePermissionTo(toSlug('Add Subject'));
        $roleRegistrar->givePermissionTo(toSlug('Edit Subject'));
        $roleRegistrar->givePermissionTo(toSlug('Delete Subject'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Schedules'));
        $roleRegistrar->givePermissionTo(toSlug('Add Schedule'));
        $roleRegistrar->givePermissionTo(toSlug('Edit Schedule'));
        $roleRegistrar->givePermissionTo(toSlug('Delete Schedule'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Graduates'));
        $roleRegistrar->givePermissionTo(toSlug('Manage Reports'));
        $roleRegistrar->givePermissionTo(toSlug('Manage System Maintenance'));



        $roleAccounting = Role::create(['name' => 'Accounting']);
        $roleAccounting->givePermissionTo(toSlug('View Dashboard'));
        $roleAccounting->givePermissionTo(toSlug('Manage Accounting'));
        $roleAccounting->givePermissionTo(toSlug('Manage Fees'));
        $roleAccounting->givePermissionTo(toSlug('Manage Transactions'));
        $roleAccounting->givePermissionTo(toSlug('Add Transaction'));


        $roleTeacher = Role::create(['name' => 'Teacher']);
        $roleTeacher->givePermissionTo(toSlug('View Dashboard'));
        $roleTeacher->givePermissionTo(toSlug('Manage Students'));
        $roleTeacher->givePermissionTo(toSlug('Manage Schedules'));




        $roleDirector = Role::create(['name' => 'Director']);
        $roleDirector->givePermissionTo(toSlug('View Dashboard'));
        $roleDirector->givePermissionTo(toSlug('Manage Enrollments'));
        $roleDirector->givePermissionTo(toSlug('Manage Students'));
        $roleDirector->givePermissionTo(toSlug('Manage Alumni'));
        $roleDirector->givePermissionTo(toSlug('Add Alumni'));
        $roleDirector->givePermissionTo(toSlug('Manage dropouts'));
        $roleDirector->givePermissionTo(toSlug('Edit Student'));
        $roleDirector->givePermissionTo(toSlug('Accept Student'));
        $roleDirector->givePermissionTo(toSlug('Drop Student'));
        $roleDirector->givePermissionTo(toSlug('Manage Sections'));
        $roleDirector->givePermissionTo(toSlug('Add Section'));
        $roleDirector->givePermissionTo(toSlug('Edit Section'));
        $roleDirector->givePermissionTo(toSlug('Delete Section'));
        $roleDirector->givePermissionTo(toSlug('Manage Accounting'));
        $roleDirector->givePermissionTo(toSlug('Manage Transactions'));
        $roleDirector->givePermissionTo(toSlug('Add Transaction'));
        $roleDirector->givePermissionTo(toSlug('Manage Reports'));
        $roleDirector->givePermissionTo(toSlug('Manage System Maintenance'));
        $roleDirector->givePermissionTo(toSlug('Manage Subjects'));
        $roleDirector->givePermissionTo(toSlug('Add Subject'));
        $roleDirector->givePermissionTo(toSlug('Edit Subject'));
        $roleDirector->givePermissionTo(toSlug('Delete Subject'));
        $roleDirector->givePermissionTo(toSlug('Manage Fees'));
        $roleDirector->givePermissionTo(toSlug('Add Fee'));
        $roleDirector->givePermissionTo(toSlug('Edit Fee'));
        $roleDirector->givePermissionTo(toSlug('Delete Fee'));
        $roleDirector->givePermissionTo(toSlug('Manage Schedules'));
        $roleDirector->givePermissionTo(toSlug('Add Schedule'));
        $roleDirector->givePermissionTo(toSlug('Edit Schedule'));
        $roleDirector->givePermissionTo(toSlug('Delete Schedule'));
        $roleDirector->givePermissionTo(toSlug('Manage Teachers'));
        $roleDirector->givePermissionTo(toSlug('Add Teacher'));
        $roleDirector->givePermissionTo(toSlug('Edit Teacher'));
        $roleDirector->givePermissionTo(toSlug('Delete Teacher'));
        $roleDirector->givePermissionTo(toSlug('Manage Users'));
        $roleDirector->givePermissionTo(toSlug('Add User'));
        $roleDirector->givePermissionTo(toSlug('Edit User'));
        $roleDirector->givePermissionTo(toSlug('Delete User'));

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
