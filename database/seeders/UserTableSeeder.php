<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Libraries\Enumerations\UserTypes;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        if (empty($admin)) {
            $admin = new User();
            $admin->name = 'Admin';
            $admin->email = 'admin@gmail.com';
            $admin->password = bcrypt('12345678');
            $admin->user_type = UserTypes::$ADMIN;
            $admin->save();

            $adminMeta = new \App\Models\Admin();
            $adminMeta->user_id = $admin->id;
            $adminMeta->country_code = 'bd';
            $adminMeta->iso = '880';
            $adminMeta->phone = '01763777585';
            $adminMeta->save();
        }
        $teacher = User::where('email', 'teacher1@gmail.com')->first();
        if (empty($teacher)) {
            $teacher = new User();
            $teacher->name = 'Teacher 1';
            $teacher->email = 'teacher1@gmail.com';
            $teacher->password = bcrypt('12345678');
            $teacher->user_type = UserTypes::$TEACHER;
            $teacher->save();

            $meta = new \App\Models\Teacher();
            $meta->user_id = $teacher->id;
            $meta->country_code = 'bd';
            $meta->iso = '880';
            $meta->phone = '01763777585';
            $meta->save();

            $teacher = new User();
            $teacher->name = 'Teacher 2';
            $teacher->email = 'teacher2@gmail.com';
            $teacher->password = bcrypt('12345678');
            $teacher->user_type = UserTypes::$TEACHER;
            $teacher->save();

            $meta = new \App\Models\Teacher();
            $meta->user_id = $teacher->id;
            $meta->country_code = 'bd';
            $meta->iso = '880';
            $meta->phone = '01763777585';
            $meta->save();
        }
        $student = User::where('email', 'student1@gmail.com')->first();
        if (empty($student)) {
            $student = new User();
            $student->name = 'Student 1';
            $student->email = 'student1@gmail.com';
            $student->password = bcrypt('12345678');
            $student->user_type = UserTypes::$STUDENT;
            $student->save();

            $meta = new \App\Models\Student();
            $meta->user_id = $student->id;
            $meta->country_code = 'bd';
            $meta->department_id = rand(1, 4);
            $meta->academic_year = rand(1, 4);
            $meta->iso = '880';
            $meta->phone = '01763777585';
            $meta->save();

            $student = new User();
            $student->name = 'Student 2';
            $student->email = 'student2@gmail.com';
            $student->password = bcrypt('12345678');
            $student->user_type = UserTypes::$STUDENT;
            $student->save();

            $meta = new \App\Models\Student();
            $meta->user_id = $student->id;
            $meta->department_id = rand(1, 4);
            $meta->academic_year = rand(1, 4);
            $meta->country_code = 'bd';
            $meta->iso = '880';
            $meta->phone = '01763777585';
            $meta->save();
        }
    }
}
