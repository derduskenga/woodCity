<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//=======ROLES================================
            // Administrator
            $admin = new \App\Role();
            $admin->name = "admin";
            $admin->display_name = "Administrator";
            $admin->description = "The adminostraor of the system";
            $admin->save();

            // Super Administrator
            $superadmin = new \App\Role();
            $superadmin->name = "super-admin";
            $superadmin->display_name = "Super Administrator";
            $superadmin->description = "The superman of the system";
            $superadmin->save();

            // Carpenter
            $carpenter = new \App\Role();
            $carpenter->name = "carpenter";
            $carpenter->display_name = "Carpenter";
            $carpenter->description = "The carpenter user of the site";
            $carpenter->save();

            // Client
            $client = new \App\Role();
            $client->name = "client";
            $client->display_name = "Client";
            $client->description = "The Client on the system";
            $client->save();

        //=======PERMISSIONS================================

//        PRODUCT
        $add_product = new \App\Permission();
        $edit_product = new \App\Permission();
        $delete_product = new \App\Permission();
        $view_product = new \App\Permission();

        $add_product->name = "add-product";
        $add_product->display_name = "Add Product";
        $add_product->description = "The use is able to add a product";
        $add_product->save();

        $edit_product->name = "edi-product";
        $edit_product->display_name = "Edit Product";
        $edit_product->description = "The use is able to edit a product";
        $edit_product->save();

        $delete_product->name = "delete-product";
        $delete_product->display_name = "Delete Product";
        $delete_product->description = "The use is able to delete a product";
        $delete_product->save();

        $view_product->name = "view-product";
        $view_product->display_name = "View Product";
        $view_product->description = "The use is able to view a product";
        $view_product->save();


        //        User
        $add_user = new \App\Permission();
        $edit_user = new \App\Permission();
        $delete_user = new \App\Permission();
        $view_user = new \App\Permission();
        $all = new \App\Permission();


        $add_user->name = "add-user";
        $add_user->display_name = "Add User";
        $add_user->description = "The user is able to add a user";
        $add_user->save();

        $edit_user->name = "edi-user";
        $edit_user->display_name = "Edit User";
        $edit_user->description = "The use is able to edit a user";
        $edit_user->save();

        $delete_user->name = "delete-user";
        $delete_user->display_name = "Delete User";
        $delete_user->description = "The use is able to delete a user";
        $delete_user->save();

        $view_user->name = "view-user";
        $view_user->display_name = "View User";
        $view_user->description = "The use is able to view a user";
        $view_user->save();

        $all->name = "all";
        $all->display_name = "All the privileges";
        $all->description = "The user with this permission is king!";
        $all->save();

//        The super-admin can do everything including the permissions and roles

        $client->attachPermissions(array($view_product));

        $carpenter->attachPermissions(array($add_product, $delete_product, $edit_product, $view_product));

        $admin->attachPermissions(array($view_product, $add_product, $delete_product, $edit_product, $add_user, $delete_user, $view_user, $edit_user));


        $superadmin->attachPermissions(array($all));

    }
}
