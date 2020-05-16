<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class tb_surahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert([
            [
                'namaRule'=> 'Admin'
            ],
            [
                'namaRule'=> 'Ortu'
            ],
        ]);

        \App\User::insert([
            [
                'name'=>'Rizqi Nurhidayah',
                'email'=> 'riski.hidayahku@gmail.com',
                'level'=> '1',
                'password'=> Hash::make('1234qwer')
            ],[
                'name'=>'Adam Setiaji',
                'email'=> 'adamsetiaji90@gmail.com',
                'level'=> '2',
                'password'=> Hash::make('1234qwer')
            ]
        ]);

        
        
        \App\Surah::insert([
            [
                'nama_surah'=>'Al-Faatihah',
                'jmlh_ayat'=>'7'
            ],
            [
                'nama_surah'=>'Al-Baqarah',
                'jmlh_ayat'=>'286'
            ],
            [
                'nama_surah'=>'Al-Imron',
                'jmlh_ayat'=>'200'
            ],
            [
                'nama_surah'=>'An-Nisaa`',
                'jmlh_ayat'=>'176'
            ],
            [
                'nama_surah'=>'Al-maa`idah',
                'jmlh_ayat'=>'120'
            ],
            [
                'nama_surah'=>'Al-An`am',
                'jmlh_ayat'=>'165'
            ],
            [
                'nama_surah'=>'Al-A`raaf',
                'jmlh_ayat'=>'206'
            ],
            [
                'nama_surah'=>'Al-Anfaal',
                'jmlh_ayat'=>'75'
            ],
            [
                'nama_surah'=>'At-Taubah',
                'jmlh_ayat'=>'129'
            ],
            [
                'nama_surah'=>'Yunus',
                'jmlh_ayat'=>'109'
            ],
            [
                'nama_surah'=>'Huud',
                'jmlh_ayat'=>'123'
            ],
            [
                'nama_surah'=>'Yusuf',
                'jmlh_ayat'=>'111'
            ],
            [
                'nama_surah'=>'Ar-Ra`ad',
                'jmlh_ayat'=>'43'
            ],
            [
                'nama_surah'=>'Ibrahim',
                'jmlh_ayat'=>'52'
            ],
            [
                'nama_surah'=>'Al-Hijr',
                'jmlh_ayat'=>'99'
            ],
            [
                'nama_surah'=>'An-Nahl',
                'jmlh_ayat'=>'128',
            ],
            [
                'nama_surah'=>'Al-Israa`',
                'jmlh_ayat'=>'111'
            ],
            [
                'nama_surah'=>'Al-Kahfi',
                'jmlh_ayat'=>'110'
            ],
            [
                'nama_surah'=>'Maryam',
                'jmlh_ayat'=>'98'
            ],
            [
                'nama_surah'=>'Thaahaa',
                'jmlh_ayat'=>'135'
            ],
            [
                'nama_surah'=>'Al-Anbiyaa`',
                'jmlh_ayat'=>'112'
            ],
            [
                'nama_surah'=>'Al-Hajj',
                'jmlh_ayat'=>'78'
            ],
            [
                'nama_surah'=>'Al-Mu`minuun',
                'jmlh_ayat'=>'118'
            ],
            [
                'nama_surah'=>'An-Nuur',
                'jmlh_ayat'=>'64'
            ],
            [
                'nama_surah'=>'Al-Furqaan',
                'jmlh_ayat'=>'77'
            ],
            [
                'nama_surah'=>'Asy-Syu`araa',
                'jmlh_ayat'=>'227'
            ],
            [
                'nama_surah'=>'An-Naml',
                'jmlh_ayat'=>'93'
            ],
            [
                'nama_surah'=>'Al-Qashash',
                'jmlh_ayat'=>'88'
            ],
            [
                'nama_surah'=>'Al-Ankabuut',
                'jmlh_ayat'=>'69'
            ],
            [
                'nama_surah'=>'Ar-Ruum',
                'jmlh_ayat'=>'60'
            ],
            [
                'nama_surah'=>'Luqman',
                'jmlh_ayat'=>'34'
            ],
            [
                'nama_surah'=>'As-Sajadah',
                'jmlh_ayat'=>'30'
            ],
            [
                'nama_surah'=>'Al-Ahzab',
                'jmlh_ayat'=>'73'
            ],
            [
                'nama_surah'=>'Saba`',
                'jmlh_ayat'=>'54'
            ],
            [
                'nama_surah'=>'Faathir',
                'jmlh_ayat'=>'45'
            ],
            [
                'nama_surah'=>'Yaasiin',
                'jmlh_ayat'=>'83'
            ],
            [
                'nama_surah'=>'Ash-Shaffat',
                'jmlh_ayat'=>'182'
            ],
            [
                'nama_surah'=>'Shaad',
                'jmlh_ayat'=>'88'
            ],
            [
                'nama_surah'=>'Az-Zumar',
                'jmlh_ayat'=>'75'
            ],
            [
                'nama_surah'=>'Al-Mu`min',
                'jmlh_ayat'=>'85'
            ],
            [
                'nama_surah'=>'Fushshilat',
                'jmlh_ayat'=>'54'
            ],
            [
                'nama_surah'=>'Asy-Syuuara',
                'jmlh_ayat'=>'53'
            ],
            [
                'nama_surah'=>'Az-Zukhruf',
                'jmlh_ayat'=>'89'
            ],
            [
                'nama_surah'=>'Ad-Dukhaan',
                'jmlh_ayat'=>'59'
            ],
            [
                'nama_surah'=>'Al-Jaatsiyah',
                'jmlh_ayat'=>'37'
            ],
            [
                'nama_surah'=>'Al-Ahqaaf',
                'jmlh_ayat'=>'35'
            ],
            [
                'nama_surah'=>'Muhammad',
                'jmlh_ayat'=>'38'
            ],
            [
                'nama_surah'=>'Al-Fath',
                'jmlh_ayat'=>'29'
            ],
            [
                'nama_surah'=>'Al-Hujaraat',
                'jmlh_ayat'=>'18'
            ],
            [
                'nama_surah'=>'Qaaf',
                'jmlh_ayat'=>'45'
            ],
            [
                'nama_surah'=>'Adz-Dzariyaat',
                'jmlh_ayat'=>'60'
            ],
            [
                'nama_surah'=>'At-Thuur',
                'jmlh_ayat'=>'49'
            ],
            [
                'nama_surah'=>'An-Najm',
                'jmlh_ayat'=>'62'
            ],
            [
                'nama_surah'=>'Al-Qamar',
                'jmlh_ayat'=>'55'
            ],
            [
                'nama_surah'=>'Ar-Rahmaan',
                'jmlh_ayat'=>'78'
            ],
            [
                'nama_surah'=>'Al-Waaqi`ah',
                'jmlh_ayat'=>'96'
            ],
            [
                'nama_surah'=>'Al-Hadiid',
                'jmlh_ayat'=>'29'
            ],
            [
                'nama_surah'=>'Al-Mujadillah',
                'jmlh_ayat'=>'22'
            ],
            [
                'nama_surah'=>'Al-Hasyr',
                'jmlh_ayat'=>'24'
            ],
            [
                'nama_surah'=>'Al-Mumtahanah',
                'jmlh_ayat'=>'13'
            ],
            [
                'nama_surah'=>'Ash-Shaff',
                'jmlh_ayat'=>'14'
            ],
            [
                'nama_surah'=>'Al-Jumu`ah',
                'jmlh_ayat'=>'11'
            ],
            [
                'nama_surah'=>'Al-Munaafiquun',
                'jmlh_ayat'=>'11'
            ],
            [
                'nama_surah'=>'At-Taghaabun',
                'jmlh_ayat'=>'18'
            ],
            [
                'nama_surah'=>'Ath-Thalaaq',
                'jmlh_ayat'=>'12'
            ],
            [
                'nama_surah'=>'At-Tahriim',
                'jmlh_ayat'=>'12'
            ],
            [
                'nama_surah'=>'Al-Mulk',
                'jmlh_ayat'=>'30'
            ],
            [
                'nama_surah'=>'Al-Qalam',
                'jmlh_ayat'=>'52'
            ],
            [
                'nama_surah'=>'Al-Haaqqah',
                'jmlh_ayat'=>'52'
            ],
            [
                'nama_surah'=>'Al-Ma`aarij',
                'jmlh_ayat'=>'44'
            ],
            [
                'nama_surah'=>'Nuh',
                'jmlh_ayat'=>'28'
            ],
            [
                'nama_surah'=>'Al-Jin',
                'jmlh_ayat'=>'28'
            ],
            [
                'nama_surah'=>'Al-Muzzammil',
                'jmlh_ayat'=>'20'
            ],
            [
                'nama_surah'=>'Al-Muddatstsir',
                'jmlh_ayat'=>'56'
            ],
            [
                'nama_surah'=>'Al-Qiyaamah',
                'jmlh_ayat'=>'40'
            ],
            [
                'nama_surah'=>'Al-Insaan',
                'jmlh_ayat'=>'31'
            ],
            [
                'nama_surah'=>'Al-Mursalaat',
                'jmlh_ayat'=>'50'
            ],
            [
                'nama_surah'=>'Al-Naba`',
                'jmlh_ayat'=>'40'
            ],
            [
                'nama_surah'=>'Al-Nazi`at',
                'jmlh_ayat'=>'46'
            ],
            [
                'nama_surah'=>'Abasa',
                'jmlh_ayat'=>'42'
            ],
            [
                'nama_surah'=>'At-Takwiir',
                'jmlh_ayat'=>'29'
            ],
            [
                'nama_surah'=>'Al-Infhitaar',
                'jmlh_ayat'=>'19'
            ],
            [
                'nama_surah'=>'Al-Muthaffifiin',
                'jmlh_ayat'=>'36'
            ],
            [
                'nama_surah'=>'Al-Insyiqaaq',
                'jmlh_ayat'=>'25'
            ],
            [
                'nama_surah'=>'Al-Buruuj',
                'jmlh_ayat'=>'22'
            ],
            [
                'nama_surah'=>'Ath-Thaariq',
                'jmlh_ayat'=>'17'
            ],
            [
                'nama_surah'=>'Al-A`laa',
                'jmlh_ayat'=>'19'
            ],
            [
                'nama_surah'=>'Al-Ghaasyiyah',
                'jmlh_ayat'=>'26'
            ],
            [
                'nama_surah'=>'Al-Fajr',
                'jmlh_ayat'=>'30'
            ],
            [
                'nama_surah'=>'Al-Balad',
                'jmlh_ayat'=>'20'
            ],
            [
                'nama_surah'=>'Asy-Syams',
                'jmlh_ayat'=>'15'
            ],
            [
                'nama_surah'=>'Al-Lail',
                'jmlh_ayat'=>'21'
            ],
            [
                'nama_surah'=>'Adh-Dhuhaa',
                'jmlh_ayat'=>'11'
            ],
            [
                'nama_surah'=>'Al-Insyirah',
                'jmlh_ayat'=>'8'
            ],
            [
                'nama_surah'=>'Al-Tiin',
                'jmlh_ayat'=>'8'
            ],
            [
                'nama_surah'=>'Al-Alaq',
                'jmlh_ayat'=>'19'
            ],
            [
                'nama_surah'=>'Al-Qadr',
                'jmlh_ayat'=>'5'
            ],
            [
                'nama_surah'=>'Al-Bayyinah',
                'jmlh_ayat'=>'8'
            ],
            [
                'nama_surah'=>'Al-Zalzalah',
                'jmlh_ayat'=>'8'
            ],
            [
                'nama_surah'=>'Al-Aadiyaat',
                'jmlh_ayat'=>'11'
            ],
            [
                'nama_surah'=>'Al-Qaari`ah',
                'jmlh_ayat'=>'11'
            ],
            [
                'nama_surah'=>'Al-Takaastur',
                'jmlh_ayat'=>'8'
            ],
            [
                'nama_surah'=>'Al-`Ashr',
                'jmlh_ayat'=>'3'
            ],
            [
                'nama_surah'=>'Al-Humazah',
                'jmlh_ayat'=>'9'
            ],
            [
                'nama_surah'=>'Al-Fiil',
                'jmlh_ayat'=>'5'
            ],
            [
                'nama_surah'=>'Quraisy',
                'jmlh_ayat'=>'4'
            ],
            [
                'nama_surah'=>'Al-Maa`uun',
                'jmlh_ayat'=>'7'
            ],
            [
                'nama_surah'=>'Al-Kautsar',
                'jmlh_ayat'=>'3'
            ],
            [
                'nama_surah'=>'Al-Kaafiruun',
                'jmlh_ayat'=>'6'
            ],
            [
                'nama_surah'=>'Al-Nashr',
                'jmlh_ayat'=>'3'
            ],
            [
                'nama_surah'=>'Al-Lahab',
                'jmlh_ayat'=>'5'
            ],
            [
                'nama_surah'=>'Al-Ikhlash',
                'jmlh_ayat'=>'4'
            ],
            [
                'nama_surah'=>'Al-Falaq',
                'jmlh_ayat'=>'5'
            ],
            [
                'nama_surah'=>'An-Naas',
                'jmlh_ayat'=>'6'
            ],
        ]);
    }
    
}
