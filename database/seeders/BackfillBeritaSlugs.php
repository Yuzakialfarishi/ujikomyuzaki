<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BackfillBeritaSlugs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::all()->each(function ($berita) {
            if (!$berita->slug) {
                $berita->slug = Str::slug($berita->judul);
                $berita->save();
                $this->command->info("Updated slug for: {$berita->judul}");
            }
        });

        $this->command->info('Backfill berita slugs completed!');
    }
}
