<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    private const ARTIFACT_CHANGE = 8;
    private const ARTIFACT_WORDS = ['Assisi','Corsico','Formigine'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->generateArtifactedText(),
            'description' => $this->generateArtifactedText()
        ];
    }

    private function generateArtifactedText(): string{
        $artifact = self::ARTIFACT_WORDS[rand(0,2)];
        return rand(0,10) <= self::ARTIFACT_CHANGE ?
            $artifact.implode($artifact, str_split($this->faker->realText(50))).$artifact : $this->faker->realText(1000);
    }
}
