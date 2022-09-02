<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->char('name',64);
            $table->boolean('done');
            $table->timestamps();
        });
        DB::table('tasks')->insert([
            ['name' => 'Первое задание', 'done' => true,'created_at'=>date('y-m-d:h-i-s'),'updated_at'=>date('y-m-d:h-i-s')],
            ['name' => 'Второе задание', 'done' => false,'created_at'=>date('y-m-d:h-i-s'),'updated_at'=>date('y-m-d:h-i-s')]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
