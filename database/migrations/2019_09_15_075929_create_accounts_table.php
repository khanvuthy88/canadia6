<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('gender',['m','f'])->default('m');
            $table->string('married_status')->nullable();
            $table->string('first_name')->nullable();
            $table->string('family_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country_of_birth')->nullable();
            $table->string('type_legal')->nullable();
            $table->string('issuring_country')->nullable();
            $table->string('id_number')->nullable();
            $table->date('issued_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('group')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('professional_situation')->nullable();
            $table->string('position')->nullable();
            $table->string('company_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('source_of_income')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('why_open_account')->nullable();
            $table->string('orther')->nullable();
            $table->string('is_us_person')->nullable();
            $table->string('cif')->nullable();
            $table->string('reference_code')->nullable();
            $table->string('acc_facility')->nullable();
            $table->string('acc_currency')->nullable();
            $table->string('acc_pin_number')->nullable();
            $table->string('acc_your3_d_security')->nullable();
            $table->string('acc_type')->nullable();
            $table->string('acc_term_deposit')->nullable();    
            $table->string('primary_bank_service_request')->nullable();

            $table->unsignedBigInteger('branch_location_id')->nullable();
            $table->foreign('branch_location_id')->references('id')->on('branch_locations');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('accounts');
    }
}
