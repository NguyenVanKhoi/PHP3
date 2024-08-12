<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const ORDER_STATUS = [
        'pending' => 'Chờ xác nhận',
        'confirmed' => 'Đã xác nhận',
        'preparing' => 'Đang chuẩn bị hàng',
        'shipping' => 'Đang vận chuyển',
        'delivered' => 'Đã giao',
        'cancel' => 'Hủy',
    ];
    const STATUS_PENDING = 'pending';
    const PAYMENT_STATUS = [
        'paid' => 'Đã thanh toán',
        'unpaid' => 'Chưa thanh toán',
    ];
    const UNPAID = 'unpaid';
    protected $fillable = [
        // $table->id();
        // $table->foreignIdFor(User::class)->constrained();
        // // thông tin người đặt hàng
        // $table->string('user_email');
        // $table->string('user_name');
        // $table->string('user_address');
        // $table->string('user_phone');
        // // thông tin người nhận
        // $table->string('receiver_email');
        // $table->string('receiver_name');
        // $table->string('receiver_address');
        // $table->string('receiver_phone');

        // $table->string('order_status');
        // $table->string('payment_status');
        // $table->double('total_price', 15, 2);
        // $table->timestamps();
        'user_id',
        'user_email',
        'user_name',
        'user_address',
        'user_phone',
        'receiver_email',
        'receiver_name',
        'receiver_address',
        'receiver_phone',
        'order_status',
        'payment_status',
        'total_price',
    ];
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}