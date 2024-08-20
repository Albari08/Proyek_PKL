<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\models\Pengajuan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengajuan>
 */
class PengajuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create();
        // Generate random konfirmasi_id
        $konfirmasiId = Arr::random([1, 2]);

        // Define jawaban and conditional fields based on konfirmasi_id
        $jawaban = $konfirmasiId == 1 ? 'Jawaban for ID 1' : 'Jawaban for ID 2';
        $hargaTotal = $konfirmasiId == 1 ? $faker->randomNumber(5, true) : null;
        $hargaEstimasi = $konfirmasiId == 1 ? $faker->randomNumber(5, true) : null;
        $judulSurat = $konfirmasiId == 1 ? $faker->bothify('####/KONF/PEMB/VIII/2024') : $faker->bothify('####/KONF/SPEC/VIII/2024');

        return [
            'noSurat' => $judulSurat,
            'noPR' => mt_rand(2300000001, 2300000010),
            'konfirmasi_id' => $konfirmasiId,
            'tanggal' => $faker->date('Y-m-d'),
            'status_id' => Arr::random([1, 2, 3, 4]),
            'user_id' => mt_rand(2, 25),
            'spph' => $faker->bothify('###/???/SPPH/VIII/2024'),
            'namaBarang' => $faker->bothify('###/???/SPPH/VIII/2024'),
            'hargaTotal' => $hargaTotal,
            'hargaEstimasi' => $hargaEstimasi,
            'deliveryDate' => $faker->date('Y-m-d'),
            'catatan' => 'Demikian kami sampaikan, mohon jawaban konfirmasinya untuk proses lebih lanjut. Atas perhatian dan kerja samanya diucapkan terima kasih.',
            'jawaban' => $jawaban,
        ];
    }
}
