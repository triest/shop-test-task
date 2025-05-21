<?php

use App\Models\OrderStatus;
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
        Schema::table('orders', function (Blueprint $table) {
             $table->unsignedBigInteger('status_id');
             $table->foreign('status_id')->references('id')->on('order_statuses');
             $table->string('comment')->nullable()->default(null);
        });


        foreach (OrderStatus::statuses_list as $status) {
            $orderStatus = new OrderStatus();
            $orderStatus->name = $status;
            $orderStatus->slug = $status;
            $orderStatus->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
          //  $table->dropForeigId('status_id')->constrained();
        });
    }
};
