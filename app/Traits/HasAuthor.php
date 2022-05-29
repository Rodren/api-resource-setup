<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
    public function author(): User
    {
        return $this->authorRelation;
    }
    
    /**
     * authorRelation - create a relationship between authors and users table
     *
     * @return BelongsTo
     */
    public function authorRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    
    /**
     * isAuthoredBy - checks if the user is the authored person
     *
     * @param  mixed $user
     * @return bool
     */
    public function isAuthoredBy(User $user): bool
    {
        return $this->author()->matches($user);
    }
    
    /**
     * authoredBy - associate or assigned the article the user
     *
     * @param  mixed $author
     * @return void
     */
    public function authoredBy(User $author)
    {
        return $this->authorRelation()->associate($author);
    }
}
