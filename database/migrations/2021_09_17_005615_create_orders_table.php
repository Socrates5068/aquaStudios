<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->json('service');

            $table->enum('status', [Order::PENDIENTE, Order::CONFIRMADO, Order::EDICION, Order::TERMINADO, Order::ENVIADO, Order::ENTREGADO, Order::ANULADO])->default(Order::PENDIENTE);
            $table->enum('delivery_type', [1, 2]);
            $table->float('shipping_cost');
            $table->float('total');
            $table->string('invitation', 100)->nullable();
            $table->string('name_contact', 60);
            $table->string('phone_contact', 60);
            //delivery address
            $table->string('d_address', 60)->nullable();
            $table->text('comment', 2000)->nullable();
            $table->json('dates');

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
        Schema::dropIfExists('orders');
    }
}
