<?php
namespace App\Policies;
use App\User;
use App\Photos;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Photos  $photos
     * @return bool
     */
    public function destroy(User $user, Photos $photos)
    {
        return $user->id == $photos->userId;
    }
    
     public function checkPhotosOwner(User $user, Photos $photos)
    {
        return $user->id === $photos->userId;
    } 
}
