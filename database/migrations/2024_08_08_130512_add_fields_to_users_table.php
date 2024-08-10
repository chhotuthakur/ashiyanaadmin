<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->enum('role', ['User', 'Admin', 'Agent'])->default('User');
            $table->enum('subscription', ['Yes', 'No'])->default('No');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'contact_number', 'address', 'role', 'subscription']);
        });
    }
}
