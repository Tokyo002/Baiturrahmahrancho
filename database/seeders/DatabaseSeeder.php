<?php

namespace Database\Seeders;

use App\Models\Holiday;
use App\Models\PostKajianAcara;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'is_admin' => true,
        ], [
            'name' => 'Admin Masjid',
            'email' => 'baiturrahmahrancho@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('baiturrahmah321'),
            'is_admin' => true,
        ]);

        $holidays = [
            ['title' => 'Isra Mikraj Nabi Muhammad SAW', 'holiday_date' => '2026-01-16', 'type' => 'islamic', 'hijri_date' => '27 Rajab 1447 H', 'description' => 'Peringatan Isra Mikraj Nabi Muhammad SAW.'],
            ['title' => 'Hari Raya Idul Fitri 1447 H', 'holiday_date' => '2026-03-20', 'type' => 'islamic', 'hijri_date' => '1 Syawal 1447 H', 'description' => 'Hari kemenangan umat Islam setelah Ramadan.'],
            ['title' => 'Cuti Bersama Idul Fitri', 'holiday_date' => '2026-03-21', 'type' => 'islamic', 'hijri_date' => null, 'description' => null],
            ['title' => 'Cuti Bersama Idul Fitri', 'holiday_date' => '2026-03-22', 'type' => 'islamic', 'hijri_date' => null, 'description' => null],
            ['title' => 'Cuti Bersama Idul Fitri', 'holiday_date' => '2026-03-23', 'type' => 'islamic', 'hijri_date' => null, 'description' => null],
            ['title' => 'Cuti Bersama Idul Fitri', 'holiday_date' => '2026-03-24', 'type' => 'islamic', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Raya Idul Adha 1447 H', 'holiday_date' => '2026-05-27', 'type' => 'islamic', 'hijri_date' => '10 Dzulhijjah 1447 H', 'description' => 'Hari raya kurban umat Islam.'],
            ['title' => 'Hari Raya Idul Adha 1447 H', 'holiday_date' => '2026-05-28', 'type' => 'islamic', 'hijri_date' => null, 'description' => null],
            ['title' => 'Tahun Baru Islam 1448 H', 'holiday_date' => '2026-06-16', 'type' => 'islamic', 'hijri_date' => '1 Muharram 1448 H', 'description' => 'Awal tahun baru hijriyah.'],
            ['title' => 'Maulid Nabi Muhammad SAW', 'holiday_date' => '2026-08-25', 'type' => 'islamic', 'hijri_date' => '12 Rabiul Awal 1448 H', 'description' => 'Peringatan kelahiran Nabi Muhammad SAW.'],
            ['title' => 'Tahun Baru Masehi', 'holiday_date' => '2026-01-01', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Tahun Baru Imlek 2577', 'holiday_date' => '2026-02-16', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Tahun Baru Imlek 2577', 'holiday_date' => '2026-02-17', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Suci Nyepi', 'holiday_date' => '2026-03-18', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Suci Nyepi', 'holiday_date' => '2026-03-19', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Wafat Yesus Kristus', 'holiday_date' => '2026-04-03', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Paskah', 'holiday_date' => '2026-04-05', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Buruh Internasional', 'holiday_date' => '2026-05-01', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Kenaikan Yesus Kristus', 'holiday_date' => '2026-05-14', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Kenaikan Yesus Kristus', 'holiday_date' => '2026-05-15', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Raya Waisak 2570 BE', 'holiday_date' => '2026-05-31', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Lahir Pancasila', 'holiday_date' => '2026-06-01', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Proklamasi Kemerdekaan RI', 'holiday_date' => '2026-08-17', 'type' => 'national', 'hijri_date' => null, 'description' => null],
            ['title' => 'Hari Natal', 'holiday_date' => '2026-12-25', 'type' => 'national', 'hijri_date' => null, 'description' => null],
        ];

        foreach ($holidays as $holiday) {
            Holiday::updateOrCreate([
                'title' => $holiday['title'],
                'holiday_date' => $holiday['holiday_date'],
                'type' => $holiday['type'],
            ], [
                'hijri_date' => $holiday['hijri_date'],
                'description' => $holiday['description'],
            ]);
        }

        $events = [
            [
                'event_name' => 'Kajian Quran Pekanan',
                'event_date' => '2026-03-27',
                'start_time' => '19:30',
                'speaker' => 'Ust. Ahmad Fauzi',
                'description' => 'Kajian rutin tafsir Al-Quran untuk jamaah umum.',
                'location' => 'Masjid Baiturrahmah',
                'is_routine' => true,
            ],
            [
                'event_name' => 'Kajian Hadits Ahad Pagi',
                'event_date' => '2026-03-29',
                'start_time' => '08:00',
                'speaker' => 'Ust. Rahmat Hidayat',
                'description' => 'Pembahasan hadits pilihan dan adab harian muslim.',
                'location' => 'Masjid Baiturrahmah',
                'is_routine' => true,
            ],
            [
                'event_name' => 'Program Santunan Anak Yatim',
                'event_date' => '2026-04-05',
                'start_time' => '16:00',
                'speaker' => null,
                'description' => 'Penyaluran santunan dan doa bersama untuk anak yatim.',
                'location' => 'Aula Masjid Baiturrahmah',
                'is_routine' => false,
            ],
        ];

        foreach ($events as $event) {
            PostKajianAcara::updateOrCreate([
                'event_name' => $event['event_name'],
                'event_date' => $event['event_date'],
                'start_time' => $event['start_time'],
            ], [
                'speaker' => $event['speaker'],
                'description' => $event['description'],
                'location' => $event['location'],
                'is_routine' => $event['is_routine'],
            ]);
        }
    }
}
