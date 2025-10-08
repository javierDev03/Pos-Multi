<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentVoucher extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'payment_vouchers';

    protected $fillable = [
        'reference',
        'amount',
        'comments',
        'payment_voucher_status_id',
        'user_id',

        'requires_invoice',
        'rfc',
        'direccion_fiscal',
        'regimen_fiscal',
        'uso_cfdi',
    ];

    public function article()
    {
        return $this->hasOne(Article::class);
    }

    public function paymentVoucherStatus()
    {
        return $this->belongsTo(PaymentVoucherStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable')->where('category', 'voucher');
    }

    public function constancia()
    {
        return $this->morphOne(File::class, 'fileable')->where('category', 'constancia');
    }

}
