STEP 1)
ftiaxnoume migration:
php artisan make:migration create_user3_table

UPDATE 
php artisan make:model User3 -m
ftiaxnei kai model kai to migration tou

STEP 2)
mpainoume trapezaki.me.database.migrations, sto teleuteo migration pou en touto pu ekamame tr
jame sazume ta fields peripou etsi:
Schema::create('user3', function (Blueprint $table) {
            $table->id(); //user3id, apla iparxei idi method id()
            $table->string('username');
            $table->string('password');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->date('member_since')->nullable();
            $table->boolean('guest');
            $table->boolean('status');
            $table->string('test')->nullable();

            $table->timestamps();
        });

STEP 3)
ftiaxnoume model:
php artisan make:model User3 //panta me kefalaio to prwto

STEP 4)
kanoume ksana migrate:
php artisan migrate

STEP 5)
mporoume na ftiaksoume instance tou model(object) kai na valoume times apo tinker:
php artisan tinker
$user3=new App\Models\User3;
$user3->username='Skydrite';
...
$user3->status=1;
//kai sto telos
$user3->save();
//tr kaname commit record ston pinaka User3

*simeiwsi: sto $user3->password=bcrypt('1234'); //vazei kriptografimena ton pass sti vasi

STEP 6)
sto tinker mporoume na treksoume mikra queries p.x
User3::all(); //tipwnei olous tous user3

TO BE CONTINUED...

exoume na dume:
-queries, relationships, constraints
-foreign keys, primary keys
-polla alla

erwtiseis:
-table gia user1?

CONSTRAINTS-PRIMARY&FOREIGN KEYS:
$table->foreign('table_id')->references('id')->on('tables');
or
$table->foreignId('reservation_id')->constrained()->onDelete('cascade')->onUpdate('cascade');