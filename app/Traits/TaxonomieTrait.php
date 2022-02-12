<?php


namespace App\Traits;


trait TaxonomieTrait
{
    public function saveTaxonomies($request)
    {
        foreach ($this->taxonomies as $taxonomy) {
            $tax = new $taxonomy();
            $taxName = $tax->getTaxonomyType();
            if($request->has($taxName)){
                $taxRelationName = $taxonomy::taxRelationName();
                $requestTerms = $request->$taxName;
                $newTerms = [];
                foreach ($requestTerms as $reqKey => $reqValue){
                    $newTerms[$reqValue] = ['tax_type' => $tax->getItemType()];
                }

                $this->$taxRelationName()->sync($request->$taxName);
            }
        }
    }
}
