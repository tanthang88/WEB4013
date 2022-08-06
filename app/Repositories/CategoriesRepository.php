<?php
    namespace App\Repositories;
    use App\Models\Categories;
    class CategoriesRepository {
        public function getAllCategories(){
            return Categories::with('subCategories')->get();
        }
    }

?>
