<?php

namespace App\Http\Services;

use App\Enum\ArtifactEnum;
use App\Models\Offer;

class OffersCleanerService
{
    private const BATCH_SIZE = 50;

    public function processArtifacts(): void{
        Offer::each(function(Offer $offer){
            $shouldUpdate = $this->cleanArtifacts(
                $offer,
                'title',
                $this->extractTextArtifacted($offer->title)
            ) ||
            $this->cleanArtifacts(
                $offer,
                'description',
                $this->extractTextArtifacted($offer->description)
            );

            if($shouldUpdate) {
                $offer->save();
            }

        },self::BATCH_SIZE);
    }

    private function extractTextArtifacted(string $text): ?ArtifactEnum{
        foreach (ArtifactEnum::cases() as $case){
            $occurrences = substr_count($text,$case->value);
            if(
                strlen($text) >= (strlen($case->value)+1)*$occurrences-1 &&
                strlen($text) <= (strlen($case->value)+1)*$occurrences
            ){
                return $case;
            }
        }
        return null;
    }

    private function cleanArtifacts(Offer $offer, string $field, ?ArtifactEnum $artifact): bool{
        if(is_null($artifact)){
            return false;
        }

        $offer->$field = str_replace($artifact->value,'',$offer->$field);

        return true;
    }
}
