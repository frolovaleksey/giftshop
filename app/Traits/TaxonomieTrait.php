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
                $this->categories()->sync($request->$taxName);
            }
        }
    }
}
