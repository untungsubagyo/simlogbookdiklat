<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username', 25)->unique(); //* this is actualy "NIP"
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default(2); // Default to user role
            $table->string('profile_photo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    
        // Seed roles and a default admin user
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'test-nik-1000',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1, // Admin role
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guru',
                'username' => 'test-nik-2000',
                'email' => 'guru@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // Guru role
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
    

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
