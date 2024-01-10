<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = ['invoice', 'user_id', 'vendor_id', 'bukti_pembayaran_1','bukti_pembayaran_2', 'status', 'email_penerima', 'nama_penerima', 'nohp', 'tanggal_acara', 'alamat', 'keterangan', 'kecamatan_id', 'latitude', 'longitude'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            // Generate invoice number (contoh: INV-2023-001)
            $latestInvoice = static::latest()->first();
            if (!$latestInvoice) {
                $transaksi->invoice = 'INV-' . now()->year . '-001';
            } else {
                $invoiceNumber = $latestInvoice->invoice;
                $parts = explode('-', $invoiceNumber);
                $year = now()->year;
                $currentYear = $parts[1];

                if ($year == $currentYear) {
                    $currentInvoiceNumber = intval($parts[2]);
                    $newInvoiceNumber = 'INV-' . $currentYear . '-' . str_pad($currentInvoiceNumber + 1, 3, '0', STR_PAD_LEFT);
                    $transaksi->invoice = $newInvoiceNumber;
                } else {
                    $transaksi->invoice = 'INV-' . $year . '-001';
                }
            }
        });
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama_penerima', 'like', "%$keyword%")
                     ->orWhere('invoice', 'like', "%$keyword%");
    }
}
