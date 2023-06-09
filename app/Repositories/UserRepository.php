<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\User;
use App\Http\Resources\UsersCollection;

class UserRepository
{
    /**
     * @var User
     */

    protected  $user; 
    
    /**
     * UserRepository constructor
     * 
     * @param User $user 
     */
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return UsersCollection::collection($this->user->get());
    }

   
}