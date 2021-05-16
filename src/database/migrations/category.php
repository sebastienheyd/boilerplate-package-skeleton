<?php

use Illuminate\Database\Migrations\Migration;

class ~uc:packageCategoryPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('permissions_categories')->insert([
            'name'         => '~sc:package',
            'display_name' => '~package::permissions.~resource.category',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions_categories')->where('name', '~sc:package')->delete();
    }
}
