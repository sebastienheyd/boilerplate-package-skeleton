<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

use Illuminate\Database\Migrations\Migration;

class :uc:packagePermissionsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('permissions_categories')->insert([
            'name'         => ':sc:package',
            'display_name' => ':package::permissions.category',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions_categories')->where('name', ':sc:package')->delete();
    }
}
