<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DealerPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine whether the user can update the post.
	 *
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		return false;
	}

	/**
	 * Determine whether the user can update the post.
	 *
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function update(User $user)
	{
		return false;
	}
}
