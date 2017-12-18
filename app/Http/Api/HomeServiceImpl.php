<?php

namespace App\Http\Api;

use App\Http\Api\HomeInterface;
// use App\Post;

class HomeServiceImpl implements HomeInterface {
    	
    	/*protected $post;
        
        public function __construct(Post $post)
        {
            $this->post = $post;
        }*/
        
        public function find($id)
        {
            // return $this->post->find($id);
        }
        
        public function findBy($att, $column)
        {
            // return $this->post->where($att, $column)
        }
}