<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation User Model
    |--------------------------------------------------------------------------
    |
    */

    'error_first_name_required'                         => 'Please enter first name.',
    'error_last_name_required'                          => 'Please enter last name.',
    'error_email_required'                              => 'Please enter email.',
    'error_username_required'                           => 'Please enter username.',
    'error_email_unique'                                => 'The email existed, try again!',
    'error_email_format'                                => 'Please enter email correct format.',
    'error_password_required'                           => 'Please enter password.',
    'error_password_min'                                => 'The password must be greater than 4 characters.',
    'error_conf_password'                               => 'The confirm password and password must be same.',

    /*
    |--------------------------------------------------------------------------
    | Validation User Model
    |--------------------------------------------------------------------------
    |
    */
    'error_old_pass_required'                          => 'Please enter old password.',
    'error_new_pass_required'                          => 'Please enter new password.',
    'error_conf_new_pass_same'                         => 'New password does not match the confirm new password.',
    'check_hashed_pass'                                => 'Current password is incorrect.',

    /*
    |--------------------------------------------------------------------------
    | Validation Category Model
    |--------------------------------------------------------------------------
    |
    */
    'error_category_name_required'                    => 'Please enter category name.',
    'error_category_order_required'                   => 'Please enter category order.',
    'error_category_order_numeric'                    => 'Category order must be numeric type.',

    /*
    |--------------------------------------------------------------------------
    | Validation Facility Model
    |--------------------------------------------------------------------------
    |
    */
    'error_facility_name_required'                    => 'Please enter facility name.',
    'error_facility_order_required'                   => 'Please enter facility order.',
    'error_facility_order_numeric'                    => 'Facility order must be numeric type.',
    'error_facility_image_required'                   => 'Please choose picture.',
    'error_facility_image_image'                      => 'Please choose file Image.',
    'error_facility_image_mimes'                      => 'The picture extend must be: jpeg, bmp, png, jpg.',
    'error_facility_image_max'                        => 'The picture size must be less than 5MB.'




];
