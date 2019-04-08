<?php

use Illuminate\Database\Seeder;

class WarrantyTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('warranties')->insert([
			'title' => 'RV Service and Warranty',
			'body' => '<div><div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu condimentum nisi. Phasellus rutrum nisl placerat ante aliquet, non sodales urna finibus. Nunc nec metus magna. Nullam velit justo, imperdiet imperdiet viverra sit amet, porta id diam. <strong>Phasellus scelerisque</strong> mollis tellus nec fermentum. Quisque pellentesque tortor sed nisl bibendum, ornare <em>sollicitudin nulla</em> feugiat. Fusce tincidunt justo nunc, ut porttitor nulla finibus eu. Praesent mauris est, blandit vitae vestibulum vitae, euismod sed purus. Donec id felis rutrum sem rhoncus hendrerit suscipit sed nibh.&nbsp;<br><br></div><h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu condimentum nisi. Phasellus rutrum nisl placerat ante aliquet, non sodales urna finibus. Nunc nec metus magna. Nullam velit justo, imperdiet imperdiet viverra sit amet, porta id diam. Phasellus scelerisque mollis tellus nec fermentum. Quisque pellentesque tortor sed nisl bibendum, ornare sollicitudin nulla feugiat. Fusce tincidunt justo nunc, ut porttitor nulla finibus eu. Praesent mauris est, blandit vitae vestibulum vitae, euismod sed purus. Donec id felis rutrum sem rhoncus hendrerit suscipit sed nibh.&nbsp;</h1><div><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu condimentum nisi. Phasellus rutrum nisl placerat ante aliquet, non sodales urna finibus. Nunc nec metus magna. Nullam velit justo, <del>imperdiet imperdiet</del> viverra sit amet, porta id diam. Phasellus scelerisque mollis tellus nec fermentum. Quisque pellentesque tortor sed nisl bibendum, ornare sollicitudin nulla feugiat. Fusce tincidunt justo nunc, ut porttitor <strong>nulla finibus eu</strong>. Praesent mauris est, blandit vitae vestibulum vitae, euismod sed purus. Donec id felis rutrum sem rhoncus hendrerit suscipit sed nibh.&nbsp;<br><br></div><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu condimentum nisi.&nbsp;</li><li>Phasellus rutrum nisl placerat ante aliquet, non sodales urna finibus. Nunc nec metus magna.&nbsp;</li><li>Nullam velit justo, imperdiet imperdiet viverra sit amet, porta id diam.&nbsp;</li><li>Phasellus scelerisque mollis tellus nec fermentum.&nbsp;</li><li>Quisque pellentesque tortor sed nisl bibendum, ornare sollicitudin nulla feugiat.&nbsp;</li><li>Fusce tincidunt justo nunc, ut porttitor nulla finibus eu.&nbsp;</li><li>Praesent mauris est, blandit vitae vestibulum vitae, euismod sed purus.&nbsp;</li><li>Donec id felis rutrum sem rhoncus hendrerit suscipit sed nibh.</li></ul></div>',
			'contact_name' => 'Breanne',
			'contact_phone' => '(574) 773-9536 Ext. 61',
			'contact_email' => 'service@intechrv.com',
			'created_at' => now(),
			'updated_at' => now()
		]);
	}
}
