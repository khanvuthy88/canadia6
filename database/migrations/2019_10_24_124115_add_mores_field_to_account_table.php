<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoresFieldToAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('place_of_bith')->nullable();
            $table->string('employement_detail')->nullable();
            $table->string('sub_employement_detail')->nullable();
            $table->string('other_sub_type')->nullable();
            $table->string('purpose_of_banking_service_other')->nullable();
            $table->string('is_us_person_code')->nullable();
            $table->string('is_us_person_yes_code')->nullable();    
            $table->string('province_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('commune_code')->nullable();
            $table->string('village_code')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('insitution_address')->nullable();
            $table->boolean('purpose_mobile_banking')->default(0);
            $table->boolean('purpose_internet_banking')->default(0);
            $table->boolean('purpose_debit_card')->default(0);
            $table->boolean('purpose_credit_card')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn(['place_of_bith','employement_detail','sub_employement_detail','other_sub_type','purpose_of_banking_service_other','is_us_person_code','is_us_person_yes_code','province_code','district_code','commune_code','village_code','institute_name','insitution_address','purpose_mobile_banking','purpose_internet_banking','purpose_debit_card','purpose_credit_card']);
        });
    }
}
