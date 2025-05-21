<?php

use App\Models\Product\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        $array = ['легкий', 'хрупкий', 'тяжелый'];

        $result = [];
        foreach ($array as $value) {
               $category = new Category();
               $category->name = $value;
               $category->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
