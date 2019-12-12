@component('mail::message')
Selamat!

Registrasi telah selesai<br>
Tolong klik tombol dibawah ini untuk memverifikasi email anda

@component('mail::button', ['url' => $url])
Verifikasi Alamat Email
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}<br>

<small>Jika anda mendapat masalah saat men-klik tombol verifikasi, salin alamat dibawah ke browser anda:<br>{{ $url }}</small>
@endcomponent
