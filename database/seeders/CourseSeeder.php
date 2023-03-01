<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            'name' => 'Laravel Basic',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'image' => 'laravel_course_in_delhi.gif',
            'category_id' => 3 , 
            'price' => '80000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 20 , 
            'start_date' => '2023-01-29',
            'duration' => '3',
            'created_at' => Carbon::now()


        ]);

        Course::insert([
            'name' => 'Laravel Advance',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
            'image' => 'laravel_advance.png',
            'category_id' => 3 , 
            'price' => '150000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 20 , 
            'start_date' => '2023-02-29',
            'duration' => '3',
            'created_at' => Carbon::now()


        ]);

        Course::insert([
            'name' => 'Vue Js',
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            'image' => 'vuejs.png',
            'category_id' => 6 , 
            'price' => '40000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 40 , 
            'start_date' => '2023-02-1',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Vue Js Advance',
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            'image' => 'vuejsAdvance.jpg',
            'category_id' => 6 , 
            'recommend' => true , 
            'price' => '70000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 40 , 
            'start_date' => '2023-02-1',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Javascript Basic',
            'description' => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.",
            'image' => 'javascript.png',
            'category_id' => 1 , 
            'recommend' => true ,
            'price' => '50000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 60 , 
            'start_date' => '2023-03-5',
            'duration' => '1',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Javascript Advance',
            'description' => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.",
            'image' => 'javascriptAdvance.png',
            'category_id' => 1 , 
            'price' => '60000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 60 , 
            'start_date' => '2023-03-10',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'PHP Basic',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'php.png',
            'category_id' => 2 , 
            'price' => '45000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 80 , 
            'start_date' => '2023-04-5',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'PHP Advance',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'phpAdvance.jpg',
            'category_id' => 2 , 
            'recommend' => true , 
            'price' => '80000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 80 , 
            'start_date' => '2023-04-10',
            'duration' => '3',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'NodeJs Full Course',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'nodejs.png',
            'category_id' => 4 , 
            'price' => '80000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 80 , 
            'start_date' => '2023-04-10',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'React Js Basic',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'reactjs.jpg',
            'category_id' => 5 , 
            'price' => '30000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 100 , 
            'start_date' => '2023-05-10',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'React Js Advance',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'reactjsAdvance.jpg',
            'category_id' => 5 , 
            'price' => '50000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 100 , 
            'start_date' => '2023-05-10',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Bootstrap',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'bootstrap.jpg',
            'category_id' => 7 , 
            'price' => '10000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 200 , 
            'start_date' => '2023-06-10',
            'duration' => '1',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Tailwind Full Course',
            'description' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore",
            'image' => 'tailwind.jpg',
            'category_id' => 8 , 
            'recommend' => true ,
            'price' => '30000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 200 , 
            'start_date' => '2023-07-10',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Python Basic',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            'image' => 'python.png',
            'category_id' => 9 , 
            'price' => '30000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 200 , 
            'start_date' => '2023-07-20',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Python Advance',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            'image' => 'pythonAdvance.jpg',
            'category_id' => 9 , 
            'price' => '45000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 90 , 
            'start_date' => '2023-07-20',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'C# Full Course',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            'image' => 'C.jpg',
            'category_id' => 10 , 
            'price' => '90000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 90 , 
            'start_date' => '2023-07-20',
            'duration' => '3',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Java Basic Course',
            'description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur",
            'image' => 'java.jpg',
            'category_id' => 11 , 
            'price' => '45000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 50 , 
            'start_date' => '2023-08-28',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);

        Course::insert([
            'name' => 'Java Advance Course',
            'description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur",
            'image' => 'javaAdvance.jpg',
            'category_id' => 11 , 
            'recommend' => true ,
            'price' => '75000',
            'like' => 0 ,
            'comment' => 0 , 
            'student' => 0 , 
            'qty' => 50 , 
            'start_date' => '2023-08-28',
            'duration' => '2',
            'created_at' => Carbon::now()
        ]);
    }
}
