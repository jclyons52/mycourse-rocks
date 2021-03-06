<?php namespace App\Libraries\Repositories;

use App\User;

class UserRepository {


    public function findByEmailOrCreate($userData) {
        $user = User::where('email', '=', $userData->email)->first();
        if(!$user) {
            $user = User::create([
                'provider_id' => $userData->id,
                'name' => $userData->name,
                'email' => $userData->email,
                'avatar' => $userData->avatar,
            ]);
        }

        $this->checkIfUserNeedsUpdating($userData, $user);
        return $user;
    }

    public function checkIfUserNeedsUpdating($userData, $user) {

        $socialData = [
            'email' => $userData->email,
            'name' => $userData->name,
            'avatar' => $userData->avatar,
        ];
        $dbData = [
            'email' => $user->email,
            'name' => $user->name,
            'avatar' => $userData->avatar,
        ];

        if (!empty(array_diff($socialData, $dbData))) {
            $user->email = $userData->email;
            $user->name = $userData->name;
            $user->avatar = $userData->avatar;
            $user->save();
        }
    }
    /**
    * Persist a user
    *
    * @param User $user
    * @return mixed
    */
    public function save(User $user)
    {
        $user->save();
    }

    /**
    * Get a paginated list of all users.
    *
    * @param int $howMany
    * @return mixed
    */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('name', 'asc')->paginate($howMany);
    }

    /**
    * Fetch a user by their username.
    *
    * @param $username
    * @return mixed
    */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
    * Find a user by their id.
    *
    * @param $id
    * @return mixed
    */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
    * Follow a Larabook user.
    *
    * @param $userIdToFollow
    * @param User $user
    * @return mixed
    */
    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }

    /**
    * Unfollow a Larabook user.
    *
    * @param $userIdToUnfollow
    * @param User $user
    * @return mixed
    */
    public function unfollow($userIdToUnfollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }


}
