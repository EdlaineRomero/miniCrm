<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmployeesTable.
 */
class CreateEmployeesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
            $table->increments('id');

            //chave estrangeira 
            $table->unsignedInteger('company_id');

 			//dados pessoais
            $table->string('firstName',50);
            $table->string('lastName',50);            
            $table->string('email',80)->nullable();
            $table->Integer('phone')->nullable();           

            //dados sistema
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('company_id')->references('id')->on('companies');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}
}
