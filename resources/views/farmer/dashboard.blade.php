@extends('layed.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-green-700 mb-6">
        Welcome Farmer, {{ $farmer->name }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <div class="bg-green-600 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Total Products</h3>
            <p class="text-3xl font-bold mt-2">{{ count($products) }}</p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Total Orders</h3>
            <p class="text-3xl font-bold mt-2">{{ count($orders) }}</p>
        </div>

        <div class="bg-blue-600 text-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-lg font-semibold">Total Sales</h3>
            <p class="text-3xl font-bold mt-2">₦{{ number_format($totalSales) }}</p>
        </div>
    </div>
</div>
@endsection


public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
