<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('NIP#####'),
            'nama' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'alamat' => $this->faker->address,
            'tgl_lahir' => $this->faker->date,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'golongan' => $this->faker->word,
            'eselon' => $this->faker->word,
            'jabatan' => $this->faker->word,
            'tempat_tugas' => $this->faker->word,
            'agama' => $this->faker->word,
            'unit_kerja' => $this->faker->word,
            'no_hp' => $this->faker->phoneNumber,
            'npwp' => $this->faker->unique()->numerify('NPWP###########'),
            'foto' => $this->faker->optional()->imageUrl,
        ];
    }
}
