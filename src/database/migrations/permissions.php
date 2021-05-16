<?php

use Illuminate\Database\Migrations\Migration;

class ~uc:resourcePermissions extends Migration
{
    private $permissions = [
        [
            'name'         => '~resource_access',
            'display_name' => '~package::permissions.~resource.access.name',
            'description'  => '~package::permissions.~resource.access.description',
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categoryId = DB::table('permissions_categories')->where('name', '~resource')->first()->id;

        // Insert permissions
        foreach ($this->permissions as $permission) {
            $permission['created_at'] = date('Y-m-d H:i:s');
            $permission['updated_at'] = date('Y-m-d H:i:s');
            $permission['category_id'] = $categoryId;
            DB::table('permissions')->insert($permission);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->permissions as $permission) {
            DB::table('permissions')->where('name', $permission['name'])->delete();
        }
    }
}
