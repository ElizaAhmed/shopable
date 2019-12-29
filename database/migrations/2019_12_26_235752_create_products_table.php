<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id');
            $table->integer('vendor_id')->nullable();

            $table->string('title');
            $table->text('description');
            $table->text('tags')->nullable();

            $table->decimal('cost_price', 8, 2)->default(0.00);
            $table->decimal('price', 8, 2)->default(0.00);
            $table->decimal('sale_price', 8, 2)->default(0.00);
            $table->boolean('charge_tax')->default(0);
            
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('quantity');
            $table->boolean('track_inventory')->default(1);

            $table->boolean('shipping_required')->default(1);
            $table->decimal('weight', 8, 2)->default(0.00);

            $table->string('page_title')->nullable();;
            $table->text('meta_description')->nullable();

            $table->boolean('available')->default(0);
            $table->date('available_after')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
