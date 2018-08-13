    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name', 15)->nullable();
            $table->string('last_name', 25)->nullable();
            $table->string('tel', 10)->nullable()->unique();
            $table->date('dtn')->nullable();
            $table->string('sold')->nullable();
            $table->string('range')->nullable();
            $table->date('limit')->nullable();

            $table->integer('status_id')->index()->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->integer('category_id')->index()->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('city_id')->index()->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('company_id')->index()->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
