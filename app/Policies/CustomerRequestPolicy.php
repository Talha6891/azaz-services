<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\CustomerRequest;
use App\Models\User;

class CustomerRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any customer requests.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->can('customer-request index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the customer request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CustomerRequest $customerRequest)
    {
        if ($user->can('customer-request show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create customer requests.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('customer-request create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the customer request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CustomerRequest $customerRequest)
    {
        if ($user->can('customer-request update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the customer request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CustomerRequest $customerRequest)
    {
        if ($user->can('customer-request delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the customer request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CustomerRequest $customerRequest)
    {
        // Implement this method if your application requires it
    }

    /**
     * Determine whether the user can permanently delete the customer request.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomerRequest  $customerRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CustomerRequest $customerRequest)
    {
        // Implement this method if your application requires it
    }
}
