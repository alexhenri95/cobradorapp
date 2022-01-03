<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Loan;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description');
            $table->enum('payment_type', [Loan::CORRIENTE, Loan::DIFERIDO]);
            $table->decimal('quantity', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->integer('payments_number');
            $table->decimal('interest', 10, 2);
            $table->enum('time',[Loan::DIARIO, Loan::SEMANAL, Loan::MENSUAL, Loan::ANUAL]);
            $table->decimal('final_payment',10,2);
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('loans');
    }
}
