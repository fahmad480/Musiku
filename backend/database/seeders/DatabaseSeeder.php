<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('artists')->insert([
            'name' => 'JKT48',
            'slug' => 'jkt48',
            'image' => 'jkt48.jpg',
            'description' => 'JKT48 is an Indonesian idol group whose name is derived from its based city of Jakarta and the Japanese idol group AKB48.',
        ]);

        DB::table('artists')->insert([
            'name' => 'AKB48',
            'slug' => 'akb48',
            'image' => 'akb48.jpg',
            'description' => 'AKB48 is a Japanese idol group based in Akihabara, Tokyo, where they have their own theater in Don Quijote.',
        ]);

        DB::table('artists')->insert([
            'name' => 'AKB48 Team TP',
            'slug' => 'akb48-team-tp',
            'image' => 'akb48teamtp.jpg',
            'description' => 'AKB48 Team TP is a Taiwanese idol group and the fourth international sister group of AKB48, after Indonesia\'s JKT48, China\'s SNH48, and Thailand\'s BNK48.',
        ]);

        DB::table('albums')->insert([
            'artist_id' => 1,
            'title' => 'Heavy Rotation',
            'slug' => 'heavy-rotation',
            'image' => 'jkt48heavyrotation.jpg',
            'description' => 'Heavy Rotation is the first released studio album by the Indonesian idol group, JKT48, on 16 February 2013 under the label Hits Records, distributed by PT Sony Music Indonesia Tbk.',
            'year' => '2013',
        ]);

        DB::table('albums')->insert([
            'artist_id' => 1,
            'title' => 'Mahagita',
            'slug' => 'mahagita',
            'image' => 'jkt48mahagita.jpg',
            'description' => 'Mahagita is the second studio album by the Indonesian idol group JKT48. It was released on 27 November 2019.',
            'year' => '2019',
        ]);

        DB::table('albums')->insert([
            'artist_id' => 2,
            'title' => 'RIVER',
            'slug' => 'river',
            'image' => 'akb48.jpg',
            'description' => 'River is the 14th major single by the Japanese idol group AKB48, released on 21 October 2009.',
            'year' => '2009',
        ]);

        DB::table('albums')->insert([
            'artist_id' => 2,
            'title' => 'Sakura no Hanabiratachi',
            'slug' => 'sakura-no-hanabiratachi',
            'image' => 'akb48.jpg',
            'description' => 'Sakura no Hanabiratachi is Japanese idol group AKB48\'s debut single, released independently through AKS on February 1, 2006.',
            'year' => '2006',
        ]);

        DB::table('albums')->insert([
            'artist_id' => 3,
            'title' => 'Mae Shika Mukanee',
            'slug' => 'mae-shika-mukanee',
            'image' => 'akb48teamtp.jpg',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'year' => '2018',
        ]);

        DB::table('musics')->insert([
            'album_id' => 1,
            'title' => 'Heavy Rotation',
            'genre' => 'Pop',
            'year' => '2013',
            // 'image' => 'jkt48heavyrotation.jpg',
            'file' => 'jkt48heavyrotation.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 1,
            'title' => 'Baby! Baby! Baby!',
            'genre' => 'Pop',
            'year' => '2013',
            // 'image' => 'jkt48heavyrotation.jpg',
            'file' => 'jkt48babybabybaby.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 1,
            'title' => 'Shonichi',
            'genre' => 'Pop',
            'year' => '2013',
            // 'image' => 'jkt48heavyrotation.jpg',
            'file' => 'jkt48shonichi.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 2,
            'title' => '365 Nichi no Kamihikouki',
            'genre' => 'Pop',
            'year' => '2019',
            // 'image' => 'jkt48mahagita.jpg',
            'file' => 'jkt48365nichinokamihikouki.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 2,
            'title' => 'River',
            'genre' => 'Pop',
            'year' => '2019',
            // 'image' => 'jkt48mahagita.jpg',
            'file' => 'jkt48river.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 2,
            'title' => 'First Rabbit',
            'genre' => 'Pop',
            'year' => '2019',
            // 'image' => 'jkt48mahagita.jpg',
            'file' => 'jkt48firstrabbit.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 3,
            'title' => 'RIVER',
            'genre' => 'Pop',
            'year' => '2018',
            // 'image' => 'akb48.jpg',
            'file' => 'akb48river.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 4,
            'title' => 'Sakura no Hanabiratachi',
            'genre' => 'Pop',
            'year' => '2018',
            // 'image' => 'akb48.jpg',
            'file' => 'akb48sakuranohanabiratachi.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('musics')->insert([
            'album_id' => 5,
            'title' => 'Mae Shika Mukanee',
            'genre' => 'Pop',
            'year' => '2018',
            // 'image' => 'akb48teamtp.jpg',
            'file' => 'akb48teamtpmaeshikamukanee.mp3',
            'duration' => 240,
            'size' => 4710,
        ]);

        DB::table('saved_music')->insert([
            'user_id' => 1,
            'music_id' => 1,
        ]);

        DB::table('saved_music')->insert([
            'user_id' => 1,
            'music_id' => 2,
        ]);
    }
}
