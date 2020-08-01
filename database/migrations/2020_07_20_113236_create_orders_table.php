<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            /*
                * Description of the Order States:
                    * pending           : initial state, means customer went to checkout state.
                    * wait_payment      : customer completed address informations, notes, .etc, customer should go to payment.
                    * wait_pay_confirm  : customer completed the payment, system is waiting the confirmation from PaymentService.
                    * wait_ship         : payment stage is completed, order is waiting confirmation from Admin to deliver it to TransportationService(Cargo).
                    * declined          : order is declined by Admin, the order will not be shipped.
                    * shipping          : order is on the road.
                    * completed         : order is delivered to customer.
                    * return_shipping   : customer starts to return the order.
                    * returned          : order is returned back.
            */
            $table->enum('status', ['pending', 'wait_payment', 'wait_pay_confirm', 'wait_ship', 'declined', 'shipping','completed', 'return_shipping', 'returned'])->default('pending');
            $table->decimal('grand_total', 20, 6);
            $table->unsignedInteger('item_count');

            $table->boolean('payment_status')->default(1);
            $table->string('payment_method')->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('post_code');
            $table->string('phone_number');
            $table->text('notes')->nullable();

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