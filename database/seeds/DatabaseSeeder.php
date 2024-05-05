<?php

use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\SMS\Fee;
use App\Models\SMS\Schedule;
use App\Models\SMS\Subject;
use App\Models\SMS\Teacher;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use Carbon\Carbon;
use Faker\Factory;
use Database\Seeders\SubjectSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        // DB::table('school_years')->insert([
        //     'school_year' => '2022-2023',
        // ]);
        // DB::table('school_years')->insert([
        //     'school_year' => '2023-2024',
        // ]);
        DB::table('school_years')->insert([
            'school_year' => '2024-2025',
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

        $school_years = SchoolYear::all();
        $faker = Factory::create();
        foreach ($school_years as $key => $school_year) {
            for ($i = 0; $i < 10; $i++) {

                // $number = random_int(1, 2);
                // $photoPath = Storage::get(public_path('sample-images/student-sample-' . $number . '.jpg'));
                // $folderPath = "students/";
                // $photoName = pathinfo($photoPath, PATHINFO_FILENAME);
                // $extension = pathinfo($photoPath, PATHINFO_EXTENSION);
                $student_number = random_int(000000, 100000);
                $student_lrn = 'LRN-' . random_int(000000, 100000);
                $birth_date = $faker->dateTimeBetween('-16 years', '-5 years');

                $student = new Student();
                $student->lrn = $student_lrn;
                $student->std_num = $student_number;
                $student->last_name = $faker->lastName();
                $student->first_name = $faker->firstName();
                $student->middle_name = $faker->lastName();
                $student->civil_status = $faker->randomElement(['Single', 'Married']);
                $student->age = Carbon::parse($birth_date)->age;
                $student->sex = $faker->randomElement(['Male', 'Female']);
                $student->nationality = 'Filipino';
                $student->b_date = $birth_date;
                $student->contact_num = '09' . random_int(100000000, 10000000000);
                $student->house_num = $faker->randomNumber(5);
                $student->purok = $faker->randomNumber(1);
                $student->brgy = $faker->streetName;
                $student->municipality = $faker->city();
                $student->province = $faker->state;
                $student->f_name = $faker->name();
                $student->f_occu = $faker->jobTitle;
                $student->m_name = $faker->name();
                $student->m_occu = $faker->jobTitle;
                $student->g_name = $faker->name();
                $student->relationship = 'Father';
                $student->g_contact_num = '09' . random_int(100000000, 10000000000);
                $student->g_add = $faker->address;
                $student->prev_school = $faker->text(60);
                $student->prev_school_type = $faker->randomElement(['Public', 'Private', 'ALS', 'Transferee']);
                $student->jhs_yrs = 4;
                $student->year_grad = '2016';
                $student->gen_ave = $faker->randomElement(['80', '83', '79', '87']);
                $student->prim_grade = $faker->text(60);
                $student->prim_grade_yr = '2007';
                $student->intermediate = $faker->text(60);
                $student->intermediate_yr = '2013';
                $student->junior_hs = $faker->text(60);
                $student->junior_hs_yr = '2024';
                $student->type = $faker->randomElement(['Regular', 'Iregular']);
                $student->status = 0;

                // $folderPath = "students/";
                // $fileName = $photoName . '.' . $extension;
                // $file = 'storage/' . $folderPath . $fileName;
                // File::copy($photoPath, public_path($file)); // Copy photo to storage
                // $student->image = $file;
                $student->save();

                $enrollment_id = Student_Specialization_GradeLevel_SchoolYear::create([
                    'student_id' => $student->id,
                    'specialization_id' => Specialization::find(random_int(1,   Specialization::count()))->id,
                    'gradelevel_id' => random_int(1, 2),
                    'school_year_id' => $school_year->id,
                    'sem_id' => 1,
                ]);

                Student::where('id', $student->id)->update([
                    'enrollment_id' => $enrollment_id->id,
                ]);
            }
        }
        $fees = [
            [
                'name' => 'VOUCHER BENEFICIARY',
                'description' => 'Tuition fee for voucher beneficiary students',
                'type' => 'tuition',
                'gender' => null,
                'amount' => 250.00,
            ],
            [
                'name' => 'ESC GRANTEE',
                'description' => 'Tuition fee for ESC grantee students',
                'type' => 'tuition',
                'gender' => null,
                'amount' => 600.00,
            ],
            [
                'name' => 'OVAP GRANTEE',
                'description' => 'Tuition fee for OVAP grantee students',
                'type' => 'tuition',
                'gender' => null,
                'amount' => 250.00,
            ],
            [
                'name' => 'REGULAR PAYEE',
                'description' => 'Tuition fee for regular payee students',
                'type' => 'tuition',
                'gender' => null,
                'amount' => 2000.00,
            ],

            [
                'name' => 'Polo & Slacks',
                'description' => 'MALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => 'male',
                'amount' => 1250.00,
            ],
            [
                'name' => 'Polo Only',
                'description' => 'MALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => 'male',
                'amount' => 750.00,
            ],
            [
                'name' => 'Slacks Only',
                'description' => 'MALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => 'male',
                'amount' => 750.00,
            ],
            [
                'name' => 'Blouse & Skirt',
                'description' => 'FEMALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => 'female',
                'amount' => 1250.00,
            ],
            [
                'name' => 'Blouse Only',
                'description' => 'FEMALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => 'female',
                'amount' => 750.00,
            ],
            [
                'name' => 'Skirt Only',
                'description' => 'FEMALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => 'female',
                'amount' => 750.00,
            ],
            [
                'name' => 'Skirt Only',
                'description' => 'FEMALE FORMAL UNIFORM',
                'type' => 'other',
                'gender' => null,
                'amount' => 750.00,
            ],
            [
                'name' => 'Department Shirt (M/F)',
                'description' => 'DEPARTMENT SHIRT MALE/FEMALE',
                'type' => 'other',
                'gender' => null,
                'amount' => 750.00,
            ],
            [
                'name' => 'T-shirt & Jogging Pants',
                'description' => 'P.E UNIFORM MALE/FEMALE',
                'type' => 'other',
                'gender' => null,
                'amount' => 750.00,
            ],
            [
                'name' => 'T-shirt Only',
                'description' => 'P.E UNIFORM MALE/FEMALE',
                'type' => 'other',
                'gender' => null,
                'amount' => 750.00,
            ],
            [
                'name' => 'Jogging Pants Only',
                'description' => 'P.E UNIFORM MALE/FEMALE',
                'type' => 'other',
                'gender' => null,
                'amount' => 750.00,
            ],
            [
                'name' => 'ID with Lace',
                'description' => 'SCHOOL ID',
                'type' => 'other',
                'gender' => null,
                'amount' => 750.00,
            ],
            [
                'name' => 'Registration Fee',
                'description' => 'REGISTRATION FEE',
                'type' => 'registration',
                'gender' => null,
                'amount' => 500.00,
            ],
        ];
        foreach ($fees as $key => $fee) {
            Fee::create($fee);
        }

        $sections = [
            ['section' => 'Section-A-1', 'specialization_id' => 1, 'gradelevel_id' => 1],
            ['section' => 'Section-B-1', 'specialization_id' => 2, 'gradelevel_id' => 1],
            ['section' => 'Section-C-1', 'specialization_id' => 3, 'gradelevel_id' => 1],
            ['section' => 'Section-D-1', 'specialization_id' => 4, 'gradelevel_id' => 1],
            ['section' => 'Section-E-1', 'specialization_id' => 5, 'gradelevel_id' => 1],
            ['section' => 'Section-F-1', 'specialization_id' => 6, 'gradelevel_id' => 1],
            ['section' => 'Section-G-1', 'specialization_id' => 7, 'gradelevel_id' => 1],
            ['section' => 'Section-H-1', 'specialization_id' => 8, 'gradelevel_id' => 1],
            ['section' => 'Section-A-2', 'specialization_id' => 1, 'gradelevel_id' => 2],
            ['section' => 'Section-B-2', 'specialization_id' => 2, 'gradelevel_id' => 2],
            ['section' => 'Section-C-2', 'specialization_id' => 3, 'gradelevel_id' => 2],
            ['section' => 'Section-D-2', 'specialization_id' => 4, 'gradelevel_id' => 2],
            ['section' => 'Section-E-2', 'specialization_id' => 5, 'gradelevel_id' => 2],
            ['section' => 'Section-F-2', 'specialization_id' => 6, 'gradelevel_id' => 2],
            ['section' => 'Section-G-2', 'specialization_id' => 7, 'gradelevel_id' => 2],
            ['section' => 'Section-H-2', 'specialization_id' => 8, 'gradelevel_id' => 2],
            // Add more sections as needed
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }

        $teachers = [
            [
                'name' => 'John Doe',
                'gender' => 'Male',
                'age' => '30',
                'contact' => '1234567890',
                'email' => 'john@example.com',
            ],
            [
                'name' => 'Jane Smith',
                'gender' => 'Female',
                'age' => '25',
                'contact' => '9876543210',
                'email' => 'jane@example.com',
            ],
            // Add more teachers as needed
        ];
        // seed subjects
        $this->call([
            SubjectSeeder::class,
        ]);
        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
        $teacher = Teacher::find(random_int(1, Teacher::count()));
        $school_year =  getCurrentSettings();
        $sections = Section::all();

        foreach ($sections as $key => $section) {
            $subjects = Subject::where('specialization_id', $section->specialization_id)->where('grade_level_id', $section->gradelevel_id)->get();
            foreach ($subjects as $key => $subject) {
                Schedule::create([
                    'teacher_id' => $teacher->id,
                    'subject_id' => $subject->id,
                    'section_id' => $section->id,
                    'school_year_id' => $school_year['school_year_id'],
                    'semester_id' => $school_year['semester_id'],
                    'days' => ['Monday', 'Wednesday', 'Friday'],
                    'start_time' => '08:00:00',
                    'end_time' => '10:00:00',
                ]);
            }
        }











    }
}
