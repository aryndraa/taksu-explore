<?php

namespace App\Http\Controllers\Web\Contact;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $address = 'Jl. Bypass Ngurah Rai No. 100, Sanur, Denpasar, Bali';
        $email = 'info@traveler.com';
        $phone = '+62 812-3456-7890';

        return view('contact', [
            'address' => $address,
            'email' => $email,
            'phone' => $phone 
        ]);
    }

    private function formatPhone(string $number): string
    {
        // Ambil hanya angka
        $digits = preg_replace('/\D/', '', $number);

        // Jika nomor diawali 0 → ubah ke +62
        if (str_starts_with($digits, '0')) {
            $digits = '62' . substr($digits, 1);
        }

        // Tambahkan tanda + di depan
        $formatted = '+' . $digits;

        // Format biar lebih enak dibaca (opsional)
        $formatted = preg_replace('/(\+62)(\d{3})(\d{4})(\d+)/', '$1 $2-$3-$4', $formatted);

        return $formatted;
    }
}
