<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // 外部キー
            $table->string('first_name'); // 名
            $table->string('last_name'); // 姓
            $table->tinyInteger('gender'); // 性別
            $table->string('email')->nullable(); // メールアドレス
            $table->string('tel')->nullable(); // 電話番号
            $table->string('address')->nullable(); // 住所
            $table->string('building')->nullable(); // 建物名
            $table->text('detail')->nullable(); // 詳細
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
        Schema::dropIfExists('contacts');
    }
}
